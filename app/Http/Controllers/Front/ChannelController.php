<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    public function userChannel()
    {
        $user = Auth::user();

        $channel = $user->channel;

        $channelPodacasts = $channel
            ? $channel->podcasts()
                ->where('approved', 1)
                ->with([
                    'category',
                ])
                ->withAvg('ratings', 'rating')
                ->withCount('ratings')
                ->latest()
                ->get()
            : collect();

        return view(
            'front.pages.channels.index',
            compact('channel', 'channelPodacasts')
        );
    }
    public function create() {
        // Prevent user from creating more than one channel 
        if (Auth::user()->channel) 
            return redirect() ->route('channel.index'); 
        return view('front.pages.channels.create'); 
    }
           /** * Store the channel. */
    public function store(Request $request) {
         $request->validate([
            'name' => [ 'required', 'string', 'max:255', ],
            'image' => [ 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048', ], 
            'description' => [ 'required', 'string', 'max:1000', ],
        ]); 
        $user = Auth::user(); 
        // Prevent duplicate channels 
        if ($user->channel) { 
            return redirect() ->route('channel.index'); 
        } // Upload image 
        $imagePath = $request ->file('image') ->store('channels', 'public'); 
        // Create channel 
        $channel = Channel::create([ 
            'user_id' => $user->id, 
            'name' => $request->name, 
            'image' => $imagePath, 
            'description' => $request->description, 
        ]); 
        return redirect() ->route('channel.index') ->with( 'success', 'Your channel has been created successfully!' ); 
    }
    // public function toggleFollowChannel($channel_id)
    // {
    //     $user = auth()->user();

    //     if ($user->channels()->where('channel_id',$channel_id)->exists()){
    //         $user->channels()->detach($channel_id);
    //         $message='Channel Removed From Follow Successfully';
    //     }else{
    //         $user->channels()->attach($channel_id);
    //         $message='Channel Added To Follow Successfully';
    //     }
    //     // return ApiResponse::sendResponse(200,$message,[]);
    // }
    // public function show($id) { $channel = Channel::with([ 'podcasts' => function ($query) { $query->where('approved', 1) ->latest(); } ])->findOrFail($id); $isFollowing = false; if (Auth::check()) { $isFollowing = $channel->followers() ->where('user_id', Auth::id()) ->exists(); } return view( 'front.pages.channels.show', compact( 'channel', 'isFollowing' ) ); } public function follow($id) { $channel = Channel::findOrFail($id); $channel->followers()->syncWithoutDetaching([ Auth::id() ]); return back()->with( 'success', 'You are now following this channel.' ); } public function unfollow($id) { $channel = Channel::findOrFail($id); $channel->followers()->detach( Auth::id() ); return back()->with( 'success', 'You unfollowed this channel.' ); }



    public function show($id)
    {
        $channel = Channel::with([
            'podcasts' => function ($query) {
                $query->where('approved', 1)
                    ->latest();
            }
        ])->findOrFail($id);

        $isFollowing = false;

        if (Auth::check()) {
            $isFollowing = $channel->followers()
                ->where('user_id', Auth::id())
                ->exists();
        }

        return view(
            'front.pages.channels.show',
            compact(
                'channel',
                'isFollowing'
            )
        );
    }


    public function toggleFollow($id)
    {
        $channel = Channel::findOrFail($id);

        // Don't allow following your own channel
        if ($channel->user_id == auth()->id()) {
            return back()->with('error', 'You cannot follow your own channel.');
        }

        $isFollowing = $channel->followers()
            ->where('user_id', auth()->id())
            ->exists();

        if ($isFollowing) {

            // Unfollow
            $channel->followers()->detach(auth()->id());

            $message = 'You unfollowed this channel.';

        } else {

            // Follow
            $channel->followers()->syncWithoutDetaching([
                auth()->id()
            ]);

            $message = 'You are now following this channel.';
        }

        return back()->with('success', $message);
    }


    }
