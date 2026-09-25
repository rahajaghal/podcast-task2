<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Podcast;
use App\Models\User;
use App\Notifications\CreatePodcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class PodcastsController extends Controller
{
    public function unapproved()
    {
        $podcasts = Podcast::with(['channel', 'category'])
            ->where('approved', 0)
            ->latest()
            ->get();

        return view('dashboard.pages.podcasts.unapproved', compact('podcasts'));
    }
    // public function approve($podcast_id)
    // {
    //     $podcast = Podcast::findOrFail($podcast_id);
    //     $channel_id=DB::table('podcasts')->where('id',$podcast_id)->pluck('channel_id');
    //     $channel_id=$channel_id[0];
    //     $podcast->update([
    //         'approved' => 1,
    //     ]);

    //     $podcast=Podcast::where('id',$podcast_id)->first();
        
    //     $followers=DB::table('followers')->where('channel_id',$channel_id)
    //         ->pluck('user_id');
    //     $users=User::whereIn('id',$followers)->get();
    //     $channel_name= Channel::where('id',$channel_id)->pluck('name');
    //     $channel_name=$channel_name[0];
    //     $channel_image= Channel::where('id',$channel_id)->pluck('image');
    //     $channel_image=$channel_image[0];
    //     Notification::send($users,new CreatePodcast($podcast->id,$podcast->title,$channel_name,$channel_image));

    //     return redirect()
    //         ->route('show.not-approved.podcasts')
    //         ->with('success', 'Podcast approved successfully.');
    // }  


    public function approve($podcast_id)
    {
        $podcast = Podcast::findOrFail($podcast_id);

        // Approve podcast
        $podcast->update([
            'approved' => 1,
        ]);

        // Get channel
        $channel = Channel::findOrFail($podcast->channel_id);

        // Get followers of this channel
        $followers = DB::table('followers')
            ->where('channel_id', $channel->id)
            ->pluck('user_id');

        // Get users
        $users = User::whereIn('id', $followers)->get();

        // Send notification
        if ($users->count()) {

            Notification::send(
                $users,
                new CreatePodcast(
                    $podcast->id,
                    $podcast->title,
                    $channel->name,
                    $channel->image
                )
            );
        }

        return redirect()
            ->route('show.not-approved.podcasts')
            ->with(
                'success',
                'Podcast approved successfully.'
            );
    }


    public function adminDelete($podcast_id)
    {
        $podcast = Podcast::findOrFail($podcast_id);

        /*
        |--------------------------------------------------------------------------
        | Delete podcast audio file
        |--------------------------------------------------------------------------
        */

        if ($podcast->podcast) {
            Storage::disk('public')->delete($podcast->podcast);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete podcast from database
        |--------------------------------------------------------------------------
        */

        $podcast->delete();

        return redirect()
            ->route('show.not-approved.podcasts')
            ->with('success', 'Podcast deleted successfully.');
    }
}
