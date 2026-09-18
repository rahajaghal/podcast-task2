<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;
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

        return redirect()
            ->route('show.not-approved.podcasts')
            ->with('success', 'Podcast approved successfully.');
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
