<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ config('app.name', 'Podcast') }} | @yield('title')
    </title>


    <!-- Google Font -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    >


    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}"
    >


    <!-- AdminLTE -->
    <link
        rel="stylesheet"
        href="{{ asset('dashboard/dist/css/adminlte.min.css') }}"
    >


    @stack('styles')


    <style>

        /*
        |--------------------------------------------------------------------------
        | GLOBAL
        |--------------------------------------------------------------------------
        */

        :root {
            --primary: #6f42c1;
            --primary-dark: #59339d;
            --primary-light: #f3edff;

            --text-dark: #202124;
            --text-muted: #6b7280;

            --background: #f8f7fc;

            --border: #ebe7f3;

            --white: #ffffff;
        }


        * {
            box-sizing: border-box;
        }


        html,
        body {
            margin: 0;
            padding: 0;

            width: 100%;
            min-height: 100%;

            font-family: 'Inter', sans-serif;

            background: var(--background);

            color: var(--text-dark);
        }


        body {
            overflow-x: hidden;
        }


        .wrapper {
            min-height: 100vh;

            display: flex;
            flex-direction: column;

            background: var(--background);
        }


        /*
        |--------------------------------------------------------------------------
        | HEADER
        |--------------------------------------------------------------------------
        */

        .main-header {
            width: 100%;

            margin-left: 0 !important;

            border: 0 !important;

            background: rgba(255, 255, 255, 0.96) !important;

            box-shadow: 0 1px 0 rgba(31, 41, 55, 0.06);

            position: relative;

            z-index: 1000;
        }


        .main-header .container {
            width: 100%;

            max-width: 1180px;

            margin-left: auto;
            margin-right: auto;
        }


        /*
        |--------------------------------------------------------------------------
        | BRAND
        |--------------------------------------------------------------------------
        */

        .website-brand {
            display: flex;

            align-items: center;

            text-decoration: none !important;

            padding: 8px 0;
        }


        .website-brand:hover {
            text-decoration: none;
        }


        .brand-logo {
            width: 42px;
            height: 42px;

            border-radius: 13px;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #7c4dff,
                    #6f42c1
                );

            color: #fff;

            box-shadow:
                0 7px 18px rgba(111, 66, 193, 0.25);

            margin-right: 11px;

            font-size: 19px;
        }


        .brand-content {
            display: flex;

            flex-direction: column;

            line-height: 1.1;
        }


        .brand-name {
            font-size: 18px;

            font-weight: 800;

            color: #202124;

            letter-spacing: -0.4px;
        }


        .brand-tagline {
            font-size: 10px;

            color: #8b8794;

            font-weight: 500;

            margin-top: 3px;

            letter-spacing: 0.3px;
        }


        /*
        |--------------------------------------------------------------------------
        | NAVIGATION
        |--------------------------------------------------------------------------
        */

        .website-nav .nav-link {
            position: relative;

            color: #686572 !important;

            font-size: 14px;

            font-weight: 600;

            padding: 9px 14px !important;

            margin: 0 2px;

            border-radius: 9px;

            transition:
                color 0.2s ease,
                background 0.2s ease;
        }


        .website-nav .nav-link:hover {
            color: var(--primary) !important;

            background: var(--primary-light);
        }


        .website-nav .nav-link i {
            font-size: 13px;

            opacity: 0.85;
        }


        /*
        |--------------------------------------------------------------------------
        | USER
        |--------------------------------------------------------------------------
        */

        .user-dropdown {
            position: relative;
        }


        .user-dropdown summary {
            list-style: none;
        }


        .user-dropdown summary::-webkit-details-marker {
            display: none;
        }


        .user-dropdown-button {
            display: flex;

            align-items: center;

            cursor: pointer;

            padding: 6px 10px 6px 7px !important;

            border-radius: 30px;

            background: #f7f5fb;

            color: #45414e !important;

            font-weight: 600;

            transition: all 0.2s ease;
        }


        .user-dropdown-button:hover {
            background: #eee8fb;

            color: var(--primary) !important;
        }


        .user-icon {
            width: 31px;
            height: 31px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #7c4dff,
                    #6f42c1
                );

            color: white;

            margin-right: 8px;

            font-size: 12px;

            box-shadow:
                0 3px 8px rgba(111, 66, 193, 0.2);
        }


        .user-dropdown-menu {
            position: absolute;

            top: calc(100% + 9px);

            right: 0;

            z-index: 1050;

            min-width: 190px;

            padding: 7px;

            background: white;

            border: 1px solid var(--border);

            border-radius: 12px;

            box-shadow:
                0 15px 35px rgba(35, 24, 60, 0.12);
        }


        /*
        |--------------------------------------------------------------------------
        | USER DROPDOWN ITEMS
        |--------------------------------------------------------------------------
        */

        .user-menu-item {
            display: flex;

            align-items: center;

            width: 100%;

            padding: 10px 12px;

            border: 0;

            border-radius: 8px;

            background: transparent;

            color: #45414e;

            font-size: 13px;

            font-weight: 600;

            text-align: left;

            text-decoration: none !important;

            cursor: pointer;

            transition: background 0.2s ease;
        }


        .user-menu-item:hover {
            background: var(--primary-light);

            color: var(--primary);

            text-decoration: none !important;
        }


        .user-menu-item i {
            width: 20px;

            margin-right: 8px;

            text-align: center;
        }


        /*
        |--------------------------------------------------------------------------
        | LOGOUT
        |--------------------------------------------------------------------------
        */

        .logout-button {
            display: flex;

            align-items: center;

            width: 100%;

            padding: 10px 12px;

            border: 0;

            border-radius: 8px;

            background: transparent;

            color: #dc3545;

            font-size: 13px;

            font-weight: 600;

            text-align: left;

            cursor: pointer;

            transition: background 0.2s ease;
        }


        .logout-button:hover {
            background: #fff1f2;

            color: #c82333;
        }


        /*
        |--------------------------------------------------------------------------
        | NOTIFICATIONS
        |--------------------------------------------------------------------------
        */

        .notification-wrapper {
            position: relative;
        }


        .notification-button {
            width: 40px;
            height: 40px;

            display: flex;

            align-items: center;
            justify-content: center;

            position: relative;

            border: 0;

            border-radius: 10px;

            background: #f7f5fb;

            color: #55515f;

            cursor: pointer;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }


        .notification-button:hover,
        .notification-button.active {
            background: #eee8fb;

            color: var(--primary);
        }


        /*
        |--------------------------------------------------------------------------
        | CSS BELL ICON
        |--------------------------------------------------------------------------
        */

        .notification-bell-css {
            position: relative;

            display: block;

            width: 14px;
            height: 15px;

            border: 2px solid #55515f;

            border-radius: 8px 8px 5px 5px;

            border-bottom: 0;

            transition: border-color 0.2s ease;
        }


        .notification-bell-css::before {
            content: "";

            position: absolute;

            left: -3px;

            bottom: -3px;

            width: 16px;
            height: 2px;

            border-radius: 2px;

            background: #55515f;

            transition: background 0.2s ease;
        }


        .notification-bell-css::after {
            content: "";

            position: absolute;

            left: 4px;

            bottom: -6px;

            width: 4px;
            height: 3px;

            border-radius: 0 0 4px 4px;

            background: #55515f;

            transition: background 0.2s ease;
        }


        .notification-button:hover .notification-bell-css,
        .notification-button.active .notification-bell-css {
            border-color: var(--primary);
        }


        .notification-button:hover .notification-bell-css::before,
        .notification-button:hover .notification-bell-css::after,
        .notification-button.active .notification-bell-css::before,
        .notification-button.active .notification-bell-css::after {
            background: var(--primary);
        }


        /*
        |--------------------------------------------------------------------------
        | NOTIFICATION BADGE
        |--------------------------------------------------------------------------
        */

        .notification-badge {
            position: absolute;

            top: -3px;
            right: -3px;

            min-width: 18px;
            height: 18px;

            padding: 0 4px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background: #dc3545;

            color: #fff;

            border: 2px solid #fff;

            font-size: 9px;

            font-weight: 700;

            line-height: 1;
        }


        /*
        |--------------------------------------------------------------------------
        | NOTIFICATION DROPDOWN
        |--------------------------------------------------------------------------
        */

        .notification-dropdown {
            display: none;

            position: absolute;

            top: calc(100% + 10px);

            right: 0;

            width: 370px;

            background: #fff;

            border: 1px solid var(--border);

            border-radius: 14px;

            overflow: hidden;

            z-index: 1100;

            box-shadow:
                0 15px 40px rgba(35, 24, 60, 0.14);
        }


        .notification-dropdown.show {
            display: block;
        }


        .notification-header {
            padding: 16px 17px;

            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 10px;

            border-bottom: 1px solid var(--border);
        }


        .notification-header h6 {
            margin: 0;

            color: #292532;

            font-size: 14px;

            font-weight: 700;
        }


        .notification-header span {
            display: block;

            margin-top: 3px;

            color: var(--text-muted);

            font-size: 11px;
        }


        .mark-all-form {
            margin: 0;
        }


        .mark-all-button {
            border: 0;

            background: transparent;

            color: var(--primary);

            font-size: 11px;

            font-weight: 600;

            padding: 0;

            cursor: pointer;
        }


        .mark-all-button:hover {
            text-decoration: underline;
        }


        .notification-list {
            max-height: 390px;

            overflow-y: auto;
        }


        .notification-item {
            display: flex;

            align-items: flex-start;

            gap: 11px;

            padding: 13px 16px;

            border-bottom: 1px solid #f0edf4;

            color: #45414e;

            text-decoration: none !important;

            transition: background 0.2s ease;
        }


        .notification-item:hover {
            background: #faf8fd;

            color: #45414e;

            text-decoration: none !important;
        }


        .notification-item.unread {
            background: #f8f4fc;
        }


        .notification-item.unread:hover {
            background: #f2ebf8;
        }


        .notification-image {
            width: 42px;
            height: 42px;

            min-width: 42px;

            object-fit: cover;

            border-radius: 50%;

            border: 2px solid #eee5f4;
        }


        .notification-image-placeholder {
            width: 42px;
            height: 42px;

            min-width: 42px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: var(--primary-light);

            color: var(--primary);
        }


        .notification-content {
            min-width: 0;

            flex: 1;
        }


        .notification-text {
            margin: 0;

            color: #48434d;

            font-size: 12px;

            line-height: 1.5;
        }


        .notification-text strong {
            color: #292532;

            font-weight: 700;
        }


        .notification-time {
            display: block;

            margin-top: 5px;

            color: #8b8794;

            font-size: 10px;
        }


        .notification-dot {
            width: 7px;
            height: 7px;

            min-width: 7px;

            margin-top: 6px;

            border-radius: 50%;

            background: var(--primary);
        }


        .notification-empty {
            padding: 35px 20px;

            text-align: center;

            color: #8b8794;
        }


        .notification-empty i {
            display: block;

            margin-bottom: 10px;

            font-size: 28px;

            color: #d8cbe2;
        }


        .notification-empty p {
            margin: 0;

            font-size: 12px;
        }


        .notification-footer {
            padding: 12px;

            border-top: 1px solid var(--border);

            text-align: center;
        }


        .notification-footer a {
            color: var(--primary);

            font-size: 12px;

            font-weight: 700;

            text-decoration: none;
        }


        .notification-footer a:hover {
            text-decoration: underline;
        }


        /*
        |--------------------------------------------------------------------------
        | GUEST BUTTONS
        |--------------------------------------------------------------------------
        */

        .guest-login-button {
            color: #655d70 !important;

            font-size: 14px;

            font-weight: 600;

            padding: 8px 15px !important;

            border-radius: 9px;
        }


        .guest-login-button:hover {
            color: var(--primary) !important;

            background: var(--primary-light);
        }


        .guest-register-button {
            background:
                linear-gradient(
                    135deg,
                    #7c4dff,
                    #6f42c1
                );

            color: #fff !important;

            font-size: 14px;

            font-weight: 700;

            border-radius: 9px;

            padding: 9px 17px !important;

            margin-left: 4px;

            box-shadow:
                0 5px 14px rgba(111, 66, 193, 0.20);
        }


        .guest-register-button:hover {
            color: #fff !important;

            transform: translateY(-1px);

            box-shadow:
                0 7px 18px rgba(111, 66, 193, 0.28);
        }


        /*
        |--------------------------------------------------------------------------
        | CONTENT
        |--------------------------------------------------------------------------
        */

        .content-wrapper {
            width: 100%;

            margin-left: 0 !important;

            flex: 1;

            background: var(--background);
        }


        .content-wrapper > .content {
            padding: 0;
        }


        .content-wrapper .container {
            width: 100%;

            max-width: 1180px;

            margin-left: auto;
            margin-right: auto;
        }


        /*
        |--------------------------------------------------------------------------
        | BREADCRUMB
        |--------------------------------------------------------------------------
        */

        .content-header {
            padding: 25px 0 10px;
        }


        .content-header h1 {
            font-size: 25px;

            font-weight: 800;

            color: #292532;
        }


        .breadcrumb {
            background: transparent;

            margin: 0;

            padding: 8px 0;

            font-size: 13px;
        }


        .breadcrumb-item a {
            color: var(--primary);

            font-weight: 600;
        }


        /*
        |--------------------------------------------------------------------------
        | FOOTER
        |--------------------------------------------------------------------------
        */

        .main-footer {
            width: 100%;

            margin-left: 0 !important;

            border: 0 !important;

            padding: 55px 0 25px;

            background: #201b2d;

            color: #fff;
        }


        .main-footer .container {
            width: 100%;

            max-width: 1180px;

            margin-left: auto;
            margin-right: auto;
        }


        /*
        |--------------------------------------------------------------------------
        | FOOTER BRAND
        |--------------------------------------------------------------------------
        */

        .footer-brand {
            display: flex;

            align-items: center;

            margin-bottom: 17px;
        }


        .footer-logo {
            width: 43px;
            height: 43px;

            border-radius: 13px;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #8b5cf6,
                    #6f42c1
                );

            color: #fff;

            margin-right: 11px;

            font-size: 18px;
        }


        .footer-brand-name {
            font-size: 18px;

            font-weight: 800;

            color: #fff;
        }


        .footer-description {
            max-width: 430px;

            color: #aaa4b6;

            font-size: 13px;

            line-height: 1.8;

            margin-bottom: 20px;
        }


        /*
        |--------------------------------------------------------------------------
        | FOOTER HEADINGS
        |--------------------------------------------------------------------------
        */

        .footer-heading {
            color: #fff;

            font-size: 13px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.7px;

            margin-bottom: 17px;
        }


        .footer-links {
            list-style: none;

            padding: 0;

            margin: 0;
        }


        .footer-links li {
            margin-bottom: 10px;
        }


        .footer-links a {
            color: #aaa4b6;

            font-size: 13px;

            text-decoration: none;

            transition: color 0.2s ease;
        }


        .footer-links a:hover {
            color: #fff;

            text-decoration: none;
        }


        /*
        |--------------------------------------------------------------------------
        | SOCIAL ICONS
        |--------------------------------------------------------------------------
        */

        .social-link {
            width: 35px;
            height: 35px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: rgba(255,255,255,0.07);

            color: #c5bfce;

            text-decoration: none;

            transition: all 0.2s ease;
        }


        .social-link:hover {
            background: var(--primary);

            color: #fff;

            transform: translateY(-2px);

            text-decoration: none;
        }


        /*
        |--------------------------------------------------------------------------
        | FOOTER BOTTOM
        |--------------------------------------------------------------------------
        */

        .footer-divider {
            border: 0;

            border-top: 1px solid rgba(255,255,255,0.08);

            margin: 38px 0 20px;
        }


        .footer-bottom {
            display: flex;

            align-items: center;

            justify-content: space-between;

            color: #858090;

            font-size: 12px;
        }


        .footer-bottom a {
            color: #a79faf;

            text-decoration: none;
        }


        .footer-bottom a:hover {
            color: #fff;
        }


        /*
        |--------------------------------------------------------------------------
        | MOBILE
        |--------------------------------------------------------------------------
        */

        @media (max-width: 767.98px) {

            .main-header .container {
                padding-left: 15px;
                padding-right: 15px;
            }


            .website-nav .nav-link {
                margin: 2px 0;

                padding: 10px 12px !important;
            }


            .guest-register-button {
                margin-left: 0;

                margin-top: 5px;

                display: inline-block;
            }


            .notification-dropdown {
                position: fixed;

                top: 70px;

                left: 12px;

                right: 12px;

                width: auto;
            }


            .main-footer {
                padding: 40px 0 20px;
            }


            .footer-column {
                margin-bottom: 30px;
            }


            .footer-bottom {
                flex-direction: column;

                gap: 8px;

                text-align: center;
            }

        }

    </style>

</head>


<body>

<div class="wrapper">


    <!-- =========================================================
         HEADER
    ========================================================== -->

    <nav class="main-header navbar navbar-expand-md">

        <div class="container">


            <!-- =====================================================
                 BRAND
            ====================================================== -->

            <a
                href="{{ url('/') }}"
                class="website-brand"
            >

                <span class="brand-logo">

                    <i class="fas fa-headphones-alt"></i>

                </span>


                <span class="brand-content">

                    <span class="brand-name">
                        Haly
                    </span>

                    <span class="brand-tagline">
                        STORIES WORTH HEARING
                    </span>

                </span>

            </a>


            <!-- =====================================================
                 MOBILE BUTTON
            ====================================================== -->

            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#websiteNavbar"
                aria-controls="websiteNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            <!-- =====================================================
                 NAVIGATION
            ====================================================== -->

            <div
                class="collapse navbar-collapse"
                id="websiteNavbar"
            >


                <!-- =================================================
                     LEFT MENU
                ================================================== -->

                <ul class="navbar-nav mr-auto website-nav">


                    <li class="nav-item">

                        @auth

                            <a
                                href="{{ route('dashboard') }}"
                                class="nav-link"
                            >

                                <i class="fas fa-compass mr-1"></i>

                                Discover

                            </a>

                        @else

                            <a
                                href="{{ route('guest.index') }}"
                                class="nav-link"
                            >

                                <i class="fas fa-compass mr-1"></i>

                                Discover

                            </a>

                        @endauth

                    </li>


                    @auth

                        <li class="nav-item">

                            <a
                                href="{{ route('channel.index') }}"
                                class="nav-link"
                            >

                                <i class="fas fa-broadcast-tower mr-1"></i>

                                My Channel

                            </a>

                        </li>


                        <li class="nav-item">

                            <a
                                href="{{ route('podcasts.favourite') }}"
                                class="nav-link"
                            >

                                <i class="far fa-heart mr-1"></i>

                                Favourites

                            </a>

                        </li>

                    @endauth

                </ul>


                <!-- =================================================
                     RIGHT MENU
                ================================================== -->

                <ul class="navbar-nav ml-auto website-nav">


                    @auth


                        <!-- =================================================
                             NOTIFICATIONS
                        ================================================== -->

                        @php

                            $unreadCount = auth()->user()
                                ->unreadNotifications()
                                ->count();

                            $recentNotifications = auth()->user()
                                ->notifications()
                                ->latest()
                                ->take(5)
                                ->get();

                        @endphp


                        <li class="nav-item d-flex align-items-center">

                            <div class="notification-wrapper">


                                <button
                                    type="button"
                                    class="notification-button"
                                    id="notificationButton"
                                    aria-label="Notifications"
                                >

                                    <!-- CSS notification bell -->

                                    <span class="notification-bell-css"></span>


                                    @if($unreadCount > 0)

                                        <span class="notification-badge">

                                            {{ $unreadCount > 99 ? '99+' : $unreadCount }}

                                        </span>

                                    @endif

                                </button>


                                <!-- =================================================
                                     NOTIFICATION DROPDOWN
                                ================================================== -->

                                <div
                                    class="notification-dropdown"
                                    id="notificationDropdown"
                                >


                                    <!-- Header -->

                                    <div class="notification-header">

                                        <div>

                                            <h6>
                                                Notifications
                                            </h6>


                                            @if($unreadCount > 0)

                                                <span>

                                                    {{ $unreadCount }}

                                                    {{ Str::plural(
                                                        'unread notification',
                                                        $unreadCount
                                                    ) }}

                                                </span>

                                            @else

                                                <span>
                                                    You are all caught up
                                                </span>

                                            @endif

                                        </div>


                                        @if($unreadCount > 0)

                                            <form
                                                action="{{ route('notifications.markAllAsRead') }}"
                                                method="POST"
                                                class="mark-all-form"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="mark-all-button"
                                                >

                                                    Mark all as read

                                                </button>

                                            </form>

                                        @endif

                                    </div>


                                    <!-- Notification list -->

                                    <div class="notification-list">


                                        @forelse(
                                            $recentNotifications
                                            as $notification
                                        )


                                            @php

                                                $data = $notification->data;

                                                $channelImage =
                                                    $data['channel_image'] ?? null;

                                            @endphp


                                            <a
                                                href="{{ route(
                                                    'notifications.show',
                                                    $notification->id
                                                ) }}"
                                                class="notification-item
                                                    {{ is_null($notification->read_at)
                                                        ? 'unread'
                                                        : '' }}"
                                            >


                                                @if($channelImage)

                                                    <img
                                                        src="{{ asset(
                                                            'storage/' .
                                                            $channelImage
                                                        ) }}"
                                                        alt="Channel"
                                                        class="notification-image"
                                                    >

                                                @else

                                                    <div class="notification-image-placeholder">

                                                        <i class="fas fa-podcast"></i>

                                                    </div>

                                                @endif


                                                <div class="notification-content">

                                                    <p class="notification-text">

                                                        <strong>
                                                            {{ $data['channel_name']
                                                                ?? 'A channel' }}
                                                        </strong>

                                                        published a new podcast:

                                                        <strong>
                                                            {{ $data['podcast_title']
                                                                ?? 'New podcast' }}
                                                        </strong>

                                                    </p>


                                                    <span class="notification-time">

                                                        <i class="far fa-clock"></i>

                                                        {{ $notification->created_at
                                                            ->diffForHumans() }}

                                                    </span>

                                                </div>


                                                @if(is_null($notification->read_at))

                                                    <span class="notification-dot"></span>

                                                @endif


                                            </a>


                                        @empty


                                            <div class="notification-empty">

                                                <i class="far fa-bell-slash"></i>

                                                <p>
                                                    No notifications yet.
                                                </p>

                                            </div>


                                        @endforelse


                                    </div>


                                    <!-- Footer -->

                                    <div class="notification-footer">

                                        <a
                                            href="{{ route('notifications.index') }}"
                                        >

                                            View all notifications

                                            <i class="fas fa-arrow-right ml-1"></i>

                                        </a>

                                    </div>


                                </div>

                            </div>

                        </li>


                        <!-- =================================================
                             USER
                        ================================================== -->

                        <li class="nav-item ml-2">

                            <details class="user-dropdown">


                                <summary
                                    class="nav-link user-dropdown-button"
                                >

                                    <span class="user-icon">

                                        <i class="fas fa-user"></i>

                                    </span>


                                    {{ Auth::user()->name }}


                                    <i
                                        class="fas fa-chevron-down ml-2"
                                        style="font-size: 9px;"
                                    ></i>

                                </summary>


                                <!-- USER DROPDOWN -->

                                <div class="user-dropdown-menu">


                            


                                    @if(Route::has('channel.index'))

                                        <a
                                            href="{{ route('channel.index') }}"
                                            class="user-menu-item"
                                        >

                                            <i class="fas fa-broadcast-tower"></i>

                                            My Channel

                                        </a>

                                    @endif


                                    <a
                                        href="{{ route('notifications.index') }}"
                                        class="user-menu-item"
                                    >

                                        <i class="fas fa-bell"></i>

                                        Notifications

                                    </a>


                                    <div
                                        style="
                                            height:1px;
                                            background:#ebe7f3;
                                            margin:5px 0;
                                        "
                                    ></div>


                                    <form
                                        method="POST"
                                        action="{{ route('logout') }}"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="logout-button"
                                        >

                                            <i class="fas fa-sign-out-alt mr-2"></i>

                                            Logout

                                        </button>

                                    </form>


                                </div>


                            </details>

                        </li>


                    @else


                        <!-- =================================================
                             LOGIN
                        ================================================== -->

                        @if (Route::has('login'))

                            <li class="nav-item">

                                <a
                                    href="{{ route('login') }}"
                                    class="nav-link guest-login-button"
                                >

                                    Login

                                </a>

                            </li>

                        @endif


                        <!-- =================================================
                             REGISTER
                        ================================================== -->

                        @if (Route::has('register'))

                            <li class="nav-item">

                                <a
                                    href="{{ route('register') }}"
                                    class="nav-link guest-register-button"
                                >

                                    <i class="fas fa-user-plus mr-1"></i>

                                    Join Free

                                </a>

                            </li>

                        @endif

                    @endauth


                </ul>

            </div>

        </div>

    </nav>


    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->

    <div class="content-wrapper">


        @hasSection('breadcrumb')

            <div class="content-header">

                <div class="container">

                    <div class="row mb-2">

                        <div class="col-sm-6">

                            <h1 class="m-0">

                                @yield('title')

                            </h1>

                        </div>


                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item">

                                    <a href="{{ url('/') }}">
                                        Home
                                    </a>

                                </li>


                                @yield('breadcrumb')

                            </ol>

                        </div>

                    </div>

                </div>

            </div>

        @endif


        <!-- Main content -->

        <main class="content">

            <div class="container">

                @yield('content')

            </div>

        </main>


    </div>


    <!-- =========================================================
         FOOTER
    ========================================================== -->

    <footer class="main-footer">

        <div class="container">


            <div class="row">


                <!-- ABOUT -->

                <div class="col-lg-5 col-md-6 footer-column">

                    <div class="footer-brand">

                        <span class="footer-logo">

                            <i class="fas fa-headphones-alt"></i>

                        </span>


                        <span class="footer-brand-name">

                            Haly

                        </span>

                    </div>


                    <p class="footer-description">

                        A place to discover thoughtful conversations,
                        inspiring stories, and voices worth listening to.
                        Find something interesting, press play,
                        and enjoy the journey.

                    </p>


                </div>


                <!-- EXPLORE -->

                <div class="col-lg-3 col-md-3 col-6 footer-column">

                    <h6 class="footer-heading">
                        Explore
                    </h6>


                    <ul class="footer-links">

                        <li>

                            @auth

                                <a href="{{ route('dashboard') }}">
                                    Discover Podcasts
                                </a>

                            @else

                                <a href="{{ route('guest.index') }}">
                                    Discover Podcasts
                                </a>

                            @endauth

                        </li>


                        <li>

                            <a href="{{ route('podcasts.tag', 1) }}">
                                Categories
                            </a>

                        </li>


                        <li>

                            <a href="{{ url('/') }}">
                                Home
                            </a>

                        </li>

                    </ul>

                </div>


                <!-- ACCOUNT -->

                <div class="col-lg-2 col-md-3 col-6 footer-column">

                    <h6 class="footer-heading">
                        Account
                    </h6>


                    <ul class="footer-links">

                        @auth

                            <li>

                                <a href="{{ route('channel.index') }}">
                                    My Channel
                                </a>

                            </li>


                            <li>

                                <a href="{{ route('podcasts.favourite') }}">
                                    Favourites
                                </a>

                            </li>

                        @else

                            @if (Route::has('login'))

                                <li>

                                    <a href="{{ route('login') }}">
                                        Login
                                    </a>

                                </li>

                            @endif


                            @if (Route::has('register'))

                                <li>

                                    <a href="{{ route('register') }}">
                                        Create Account
                                    </a>

                                </li>

                            @endif

                        @endauth

                    </ul>

                </div>


                <!-- MESSAGE -->

                <div class="col-lg-2 col-md-12 footer-column">

                    <h6 class="footer-heading">
                        Listen & Share
                    </h6>


                    <p
                        style="
                            color:#aaa4b6;
                            font-size:13px;
                            line-height:1.7;
                            margin:0;
                        "
                    >

                        Discover new voices,
                        follow your interests,
                        and share the conversations
                        that matter to you.

                    </p>

                </div>


            </div>


            <!-- DIVIDER -->

            <hr class="footer-divider">


            <!-- BOTTOM -->

            <div class="footer-bottom">

                <span>

                    &copy; {{ date('Y') }}

                    Haly

                    . All rights reserved.

                </span>


                <span>

                    Made for people who

                    <i
                        class="fas fa-heart"
                        style="color:#8b5cf6;"
                    ></i>

                    great conversations.

                </span>

            </div>


        </div>

    </footer>


</div>


<!-- =========================================================
     SCRIPTS
========================================================== -->

<script
    src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"
></script>


<script
    src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"
></script>


<script
    src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"
></script>


<script>

document.addEventListener('DOMContentLoaded', function () {


    /*
    |--------------------------------------------------------------------------
    | NOTIFICATION DROPDOWN
    |--------------------------------------------------------------------------
    */

    const notificationButton =
        document.getElementById('notificationButton');

    const notificationDropdown =
        document.getElementById('notificationDropdown');


    if (notificationButton && notificationDropdown) {

        notificationButton.addEventListener('click', function (event) {

            event.stopPropagation();


            notificationDropdown.classList.toggle('show');


            notificationButton.classList.toggle(
                'active',
                notificationDropdown.classList.contains('show')
            );

        });


        notificationDropdown.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | CLOSE NOTIFICATION WHEN CLICKING OUTSIDE
    |--------------------------------------------------------------------------
    */

    document.addEventListener('click', function () {

        if (notificationDropdown) {

            notificationDropdown.classList.remove('show');

        }


        if (notificationButton) {

            notificationButton.classList.remove('active');

        }

    });


    /*
    |--------------------------------------------------------------------------
    | USER DETAILS DROPDOWN
    |--------------------------------------------------------------------------
    */

    const userDropdown =
        document.querySelector('.user-dropdown');


    if (userDropdown) {

        document.addEventListener('click', function (event) {

            if (!userDropdown.contains(event.target)) {

                userDropdown.removeAttribute('open');

            }

        });

    }

});

</script>


@stack('scripts')


</body>

</html>