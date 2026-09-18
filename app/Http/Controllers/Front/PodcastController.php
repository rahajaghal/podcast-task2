<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PodcastRequest;
use App\Models\Category;
use App\Models\Channel;
use App\Models\Podcast;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
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
    public function store(PodcastRequest $request){
        // Get the authenticated user's channel
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


        // Store podcast using Laravel's default public disk
        $fileName = $file->getClientOriginalName();

        $path = $file->storeAs(
            'podcasts',
            $fileName,
            'public'
        );


        // Get validated form data
        $data = $request->validated();


        // Add uploaded file path
        $data['podcast'] = $path;


        // Automatically assign the authenticated user's channel
        $data['channel_id'] = $channel->id;
        $data['size']=$request->file('podcast')->getSize()/1024/1024;

        // Create podcast
        $podcast = Podcast::create($data);


        // Attach selected tags
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
}
