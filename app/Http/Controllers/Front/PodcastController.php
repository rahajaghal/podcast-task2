<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PodcastRequest;
use App\Models\Category;
use App\Models\CategoryUser;
use App\Models\Channel;
use App\Models\Favourite;
use App\Models\Podcast;
use App\Models\PodcastTag;
use App\Models\Rating;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
    public function rate(Request $request, $id)
    {
        $request->validate([
            'rating' => [
                'required',
                'numeric',
                'min:1',
                'max:5',
            ],
        ]);

        $podcast = Podcast::where('id', $id)
            ->where('approved', 1)
            ->firstOrFail();

        Rating::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'podcast_id' => $podcast->id,
            ],
            [
                'rating' => $request->rating,
            ]
        );

        return back()->with(
            'success',
            'Your rating has been saved.'
        );
    }
    public function create(){
        // return view('front.pages.podcasts.create');
        $user = auth()->user();

        

        $categories = Category::orderBy('name')->get();

        $tags = Tag::orderBy('name')->get();

        return view(
            'front.pages.podcasts.create',
            compact( 'categories', 'tags')
        );
    }
    public function store(PodcastRequest $request)
    {
        // Get authenticated user's channel
        $channel = Channel::where(
            'user_id',
            auth()->id()
        )->first();

        // User must have a channel
        if (!$channel) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'You must create a channel before creating a podcast.'
                );
        }


        // Get uploaded podcast file
        $file = $request->file('podcast');


        // Store podcast on public disk
        $path = $file->store(
            'podcasts',
            'public'
        );


        // Get validated data
        $data = $request->validated();


        // Podcast file path
        $data['podcast'] = $path;


        // Automatically assign channel
        $data['channel_id'] = $channel->id;


        // File size in MB
        $data['size'] =
            $file->getSize() / 1024 / 1024;


        // Create podcast
        $podcast = Podcast::create($data);


        // Attach tags
        if ($request->filled('tags')) {

            $podcast->tags()->attach(
                $request->input('tags')
            );
        }


        return redirect()
            ->route('channel.index')
            ->with(
                'success',
                'Your podcast was created successfully.'
            );
    }
    public function delete($podcast_id)
    {
        $podcast = Podcast::findOrFail($podcast_id);

        // Get the logged-in user's channel
        $channel = Channel::where('user_id', auth()->id())->first();

        // User does not have a channel
        if (!$channel) {
            return redirect()
                ->route('channel.index')
                ->with('error', 'You do not have a channel.');
        }

        // Make sure this podcast belongs to the user's channel
        if ($podcast->channel_id != $channel->id) {
            return redirect()
                ->route('channel.index')
                ->with('error', 'You are not allowed to delete this podcast.');
        }

        // Delete the audio file
        if ($podcast->podcast) {
            Storage::disk('public')->delete($podcast->podcast);
        }

        // Delete podcast from database
        $podcast->delete();

        return redirect()
            ->route('channel.index')
            ->with('success', 'Podcast deleted successfully.');
    }
    public function index(Request $request)
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | Get categories selected by the logged-in user
        |--------------------------------------------------------------------------
        */

        $categories = $user->categories;

        $categoryIds = $categories
            ->pluck('id')
            ->toArray();


        /*
        |--------------------------------------------------------------------------
        | Podcasts query
        |--------------------------------------------------------------------------
        */

        $podcastsQuery = Podcast::query()
            ->where('approved', 1)
            ->with([
                'channel',
                'category',
            ])
            ->withAvg('ratings', 'rating')
            ->withCount('ratings');


        /*
        |--------------------------------------------------------------------------
        | Search by podcast title
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->input('search');

            $podcastsQuery->where(
                'title',
                'like',
                '%' . $search . '%'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Filter by category
        |--------------------------------------------------------------------------
        */

        if ($request->filled('categoryId')) {

            $categoryId = $request->input('categoryId');

            /*
            |--------------------------------------------------------------------------
            | Make sure the category belongs to user's selected categories
            |--------------------------------------------------------------------------
            */

            if (in_array($categoryId, $categoryIds)) {

                $podcastsQuery->where(
                    'category_id',
                    $categoryId
                );

            } else {

                /*
                |--------------------------------------------------------------------------
                | Category does not belong to user's selected categories
                |--------------------------------------------------------------------------
                */

                $podcastsQuery->whereRaw('1 = 0');
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Get podcasts
        |--------------------------------------------------------------------------
        */

        $podcasts = $podcastsQuery
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Return website page
        |--------------------------------------------------------------------------
        */

        return view(
            'front.pages.podcasts.index',
            compact(
                'categories',
                'podcasts'
            )
        );
    }
    public function showPodcast($id)
    {
        $podcast = Podcast::with([
            'channel',
            'category',
            'tags',
        ])
        ->withAvg('ratings', 'rating')
        ->withCount('ratings')
        ->where('id', $id)
        ->where('approved', 1)
        ->firstOrFail();

        // Current user's rating
        $userRating = Rating::where('user_id', auth()->id())
            ->where('podcast_id', $podcast->id)
            ->first();

        // Check if current user already added this podcast to favourites
        $isFavourite = Favourite::where('user_id', auth()->id())
            ->where('podcast_id', $podcast->id)
            ->exists();

        return view(
            'front.pages.podcasts.show',
            compact(
                'podcast',
                'userRating',
                'isFavourite'
            )
        );
    }
    public function favorite($id)
    {
        $podcast = Podcast::where('id', $id)
            ->where('approved', 1)
            ->firstOrFail();

        $favourite = Favourite::where('user_id', auth()->id())
            ->where('podcast_id', $podcast->id)
            ->first();

        if ($favourite) {

            $favourite->delete();

            return back()->with(
                'success',
                'Podcast removed from favorites.'
            );
        }

        Favourite::create([
            'user_id' => auth()->id(),
            'podcast_id' => $podcast->id,
        ]);

        return back()->with(
            'success',
            'Podcast added to favorites.'
        );
    }
    public function tagPodcasts($tag_id)
    {
        $tag = Tag::findOrFail($tag_id);

        $podcastIds = PodcastTag::where('tag_id', $tag_id)
            ->pluck('podcast_id');

        $podcasts = Podcast::with([
            'channel',
            'category',
        ])
        ->withAvg('ratings', 'rating')
        ->withCount('ratings')
        ->whereIn('id', $podcastIds)
        ->where('approved', 1)
        ->latest()
        ->get();

        return view(
            'front.pages.podcasts.tag',
            compact('podcasts', 'tag')
        );
    }
    public function favouritePodcasts()
    {
        $user = auth()->user();

        $podcasts = Podcast::whereHas('favourites', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('approved', 1)
        ->with([
            'channel',
            'category',
        ])
        ->withAvg('ratings', 'rating')
        ->withCount('ratings')
        ->latest()
        ->get();

        return view(
            'front.pages.podcasts.favourites',
            compact('podcasts')
        );
    }
public function guestIndex(Request $request)
    {
        if(Auth::user()){
            return redirect()->route('dashboard');
        }
        /*
        |--------------------------------------------------------------------------
        | Get all categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::all();


        /*
        |--------------------------------------------------------------------------
        | Podcasts query
        |--------------------------------------------------------------------------
        */

        $podcastsQuery = Podcast::query()
            ->where('approved', 1)
            ->with([
                'channel',
                'category',
            ])
            ->withAvg('ratings', 'rating')
            ->withCount('ratings');


        /*
        |--------------------------------------------------------------------------
        | Search by podcast title
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->input('search');

            $podcastsQuery->where(
                'title',
                'like',
                '%' . $search . '%'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Filter by category
        |--------------------------------------------------------------------------
        */

        if ($request->filled('categoryId')) {

            $categoryId = $request->input('categoryId');

            $podcastsQuery->where(
                'category_id',
                $categoryId
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Get podcasts
        |--------------------------------------------------------------------------
        */

        $podcasts = $podcastsQuery
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Return guest website page
        |--------------------------------------------------------------------------
        */

        return view(
            'front.pages.podcasts.guest-index',
            compact(
                'categories',
                'podcasts'
            )
        );
    }
    // public function tagPodcasts($tag_id)
    // {
    //     $podcastsIds=PodcastTag::where('tag_id',$tag_id)->pluck('podcast_id');
    //     $podcasts=Podcast::whereIn('id',$podcastsIds)->where('approved',1)->get();
    //     if ($podcasts){
    //         return ApiResponse::sendResponse(200,'Podcast Retrieved Successfully',
    //             PodcastResource::collection($podcasts));
    //     }
    //     return ApiResponse::sendResponse(200,'Podcast Not Retrieved Successfully', []);
    // }

    
}
