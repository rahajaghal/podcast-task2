<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChannelController extends Controller
{

    public function notApproved()
    {
        $channels = Channel::where('approved', 0)
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('dashboard.pages.channels.unapproved', compact('channels'));
    }


    /**
     * Approve a channel.
     */
    public function approve($channel_id)
    {
        $channel = Channel::findOrFail($channel_id);

        DB::transaction(function () use ($channel) {

            $channel->update([
                'approved' => 1,
            ]);

            $channel->user()->update([
                'status' => 1,
            ]);

        });

        return redirect()
            ->route('show.not-approved.channels')
            ->with('success', 'Channel approved successfully.');
    }


    /**
     * Delete a channel.
     */
    public function delete($channel_id)
    {
        $channel = Channel::findOrFail($channel_id);



        if ($channel->image) {

            // If image is stored using Laravel storage
            Storage::disk('public')->delete($channel->image);
        }


        $channel->delete();

        return redirect()
            ->back()
            ->with('success', 'Channel deleted successfully.');
    }


}
