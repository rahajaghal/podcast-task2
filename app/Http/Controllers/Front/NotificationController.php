<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController
{
    /**
     * Show all notifications.
     */
    public function index()
    {
        $notifications = Auth::user()
            ->notifications()
            ->latest()
            ->paginate(10);

        return view(
            'front.pages.notifications.index',
            compact('notifications')
        );
    }


    /**
     * Open a notification.
     */
    public function show($id)
    {
        $notification = Auth::user()
            ->notifications()
            ->where('id', $id)
            ->firstOrFail();

        // Mark this notification as read
        if (!$notification->read_at) {
            $notification->markAsRead();
        }

        $data = $notification->data;

        // Podcast notification
        if (
            isset($data['podcast_id'])
        ) {
            return redirect()->route(
                'podcast.show',
                $data['podcast_id']
            );
        }

        return redirect()->route('dashboard');
    }


    /**
     * Mark all notifications as read.
     */
    public function markAllAsRead()
    {
        Auth::user()
            ->unreadNotifications
            ->markAsRead();

        return back();
    }
}
