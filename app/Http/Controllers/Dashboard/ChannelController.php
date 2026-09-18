<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChannelController extends Controller
{
    // public function notApproved()
    // {
    //     $channels=Channel::where('approved',0)->get();
    //     if ($channels){
    //         return ApiResponse::sendResponse(200,'channels not approved Yet Retrieved Successfully',
    //             ChannelResource::collection($channels));
    //     }
    //     return ApiResponse::sendResponse(200,'channels not approved Yet Not Retrieved Successfully',[]);
    // }
    // public function approve($channel_id)
    // {
    //   DB::table('channels')->where('id',$channel_id)->update([
    //       'approved'=>1,
    //   ]);
    //   $channelUser=Channel::where('id',$channel_id)->pluck('user_id');
    //   $channelUser=$channelUser[0];

    //   DB::table('users')->where('id',$channelUser)->update([
    //         'status'=>1,
    //   ]);

    //   return ApiResponse::sendResponse(200,'Channel Approved Successfully',[]);
    // }
    // public function delete($channel_id)
    // {
    //     $oldPath=DB::table('channels')->where('id',$channel_id)->pluck('image');
    //     $oldPath=$oldPath[0];
    //     $oldPath= public_path(asset($oldPath));
    //     #----------
    //     // $oldPath = str_replace('public/', 'public_html/', $oldPath);

    //     if (file_exists($oldPath)){
    //         unlink($oldPath);
    //     }
    //     #------------

    //     DB::table('channels')->where('id',$channel_id)->delete();

    //     return ApiResponse::sendResponse(200,'Channel Deleted Successfully',[]);
    // }
    // public function unActiveChannels()
    // {
    //     $channels=Channel::where('active',0)->get();
    //     if ($channels){
    //         return ApiResponse::sendResponse(200,'UnActive Channels Retrieved Successfully',ChannelResource::collection($channels));
    //     }
    //     return ApiResponse::sendResponse(200,'UnActive Channels Not Retrieved Successfully',[]);
    // }
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

        /*
        |--------------------------------------------------------------------------
        | Delete channel image
        |--------------------------------------------------------------------------
        */

        if ($channel->image) {

            // If image is stored using Laravel storage
            Storage::disk('public')->delete($channel->image);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete channel
        |--------------------------------------------------------------------------
        */

        $channel->delete();

        return redirect()
            ->back()
            ->with('success', 'Channel deleted successfully.');
    }


    /**
     * Display inactive channels.
     */
    // public function unActiveChannels()
    // {
    //     $channels = Channel::where('active', 0)
    //         ->with('user')
    //         ->latest()
    //         ->paginate(10);

    //     return view(
    //         'dashboard.pages.channels.unactive',
    //         compact('channels')
    //     );
    // }
}
