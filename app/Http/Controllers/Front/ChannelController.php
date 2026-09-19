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
        return redirect() ->route('channel.index') ->with( 'success', 'Your channel has been created successfully!' ); }
}
