@extends('layouts.website')

@section('title', 'Notifications')

@push('styles')
<style>

    .notifications-page {
        max-width: 850px;
        margin: 30px auto;
    }


    .notifications-box {
        background: #fff;

        border-radius: 18px;

        padding: 25px;

        box-shadow:
            0 5px 20px rgba(0, 0, 0, .07);
    }


    .notifications-title {
        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 20px;
    }


    .notifications-title h1 {
        margin: 0;

        font-size: 23px;

        color: #343a40;
    }


    .notifications-title i {
        color: #5b2c83;

        margin-right: 7px;
    }


    .notification-row {
        display: flex;

        align-items: center;

        gap: 14px;

        padding: 15px;

        border-radius: 12px;

        text-decoration: none;

        color: inherit;

        border-bottom: 1px solid #eee;

        transition: background .15s ease;
    }


    .notification-row:hover {
        background: #f8f5fa;

        text-decoration: none;
    }


    .notification-row.unread {
        background: #faf7fc;
    }


    .notification-row-image {
        width: 50px;
        height: 50px;

        border-radius: 50%;

        object-fit: cover;

        flex-shrink: 0;
    }


    .notification-row-placeholder {
        width: 50px;
        height: 50px;

        border-radius: 50%;

        background: #eee6f6;

        color: #5b2c83;

        display: flex;

        align-items: center;
        justify-content: center;

        flex-shrink: 0;
    }


    .notification-row-content {
        flex: 1;

        min-width: 0;
    }


    .notification-row-title {
        font-size: 13px;

        font-weight: 700;

        color: #5b2c83;

        margin-bottom: 3px;
    }


    .notification-row-text {
        font-size: 13px;

        color: #555;

        line-height: 1.5;
    }


    .notification-row-time {
        font-size: 11px;

        color: #999;

        margin-top: 4px;
    }


    .unread-indicator {
        width: 8px;
        height: 8px;

        border-radius: 50%;

        background: #5b2c83;

        flex-shrink: 0;
    }


    .empty-notifications {
        text-align: center;

        padding: 60px 20px;

        color: #999;
    }


    .empty-notifications i {
        font-size: 45px;

        color: #d8c9e4;

        margin-bottom: 15px;
    }


    .empty-notifications p {
        margin: 0;
    }

</style>
@endpush


@section('content')

<div class="notifications-page">

    <div class="notifications-box">


        <div class="notifications-title">

            <h1>

                <i class="fas fa-bell"></i>

                Notifications

            </h1>


            @if(auth()->user()->unreadNotifications->count())

                <form
                    action="{{ route(
                        'notifications.markAllAsRead'
                    ) }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="btn btn-sm btn-outline-primary"
                    >
                        Mark all as read
                    </button>

                </form>

            @endif

        </div>


        @forelse($notifications as $notification)

            @php
                $data = $notification->data;
            @endphp


            <a
                href="{{ route(
                    'notifications.show',
                    $notification->id
                ) }}"
                class="notification-row
                {{ !$notification->read_at ? 'unread' : '' }}"
            >


                @if(!empty($data['channel_image']))

                    <img
                        src="{{ asset(
                            'storage/' .
                            $data['channel_image']
                        ) }}"
                        alt="{{ $data['channel_name'] ?? 'Channel' }}"
                        class="notification-row-image"
                    >

                @else

                    <div class="notification-row-placeholder">

                        <i class="fas fa-microphone"></i>

                    </div>

                @endif


                <div class="notification-row-content">

                    <div class="notification-row-title">

                        New podcast

                    </div>


                    <div class="notification-row-text">

                        <strong>
                            {{ $data['channel_name'] ?? 'A channel' }}
                        </strong>

                        published

                        <strong>
                            {{ $data['podcast_title'] ?? 'a new podcast' }}
                        </strong>

                    </div>


                    <div class="notification-row-time">

                        {{ $notification->created_at->diffForHumans() }}

                    </div>

                </div>


                @if(!$notification->read_at)

                    <span class="unread-indicator"></span>

                @endif

            </a>


        @empty

            <div class="empty-notifications">

                <i class="far fa-bell"></i>

                <p>
                    You don't have any notifications yet.
                </p>

            </div>

        @endforelse


        <div class="mt-3">

            {{ $notifications->links() }}

        </div>


    </div>

</div>

@endsection

