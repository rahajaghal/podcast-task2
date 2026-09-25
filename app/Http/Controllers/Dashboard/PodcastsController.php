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



    public function approve($podcast_id)
    {
        $podcast = Podcast::findOrFail($podcast_id);

        $podcast->update([
            'approved' => 1,
        ]);

        $channel = Channel::findOrFail($podcast->channel_id);

        $followers = DB::table('followers')
            ->where('channel_id', $channel->id)
            ->pluck('user_id');

        $users = User::whereIn('id', $followers)->get();

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


        if ($podcast->podcast) {
            Storage::disk('public')->delete($podcast->podcast);
        }

        $podcast->delete();

        return redirect()
            ->route('show.not-approved.podcasts')
            ->with('success', 'Podcast deleted successfully.');
    }
}
