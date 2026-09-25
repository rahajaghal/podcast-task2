<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ config('app.name', 'Podcast') }} |
        @yield('title')
    </title>


    <!-- Google Font -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
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

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100%;
        }


        body {
            background: #f4f6f9;
            color: #343a40;
        }


        .wrapper {
            width: 100%;
            min-height: 100vh;
            margin: 0;
            padding: 0;

            display: flex;
            flex-direction: column;
        }


        /*
        |--------------------------------------------------------------------------
        | Navbar
        |--------------------------------------------------------------------------
        */

        .main-header {
            margin-left: 0 !important;
            width: 100%;
        }


        .main-header .container {
            width: 100%;
            max-width: 1140px;

            margin-left: auto;
            margin-right: auto;
        }


        .navbar-brand {
            display: flex;
            align-items: center;
        }


        .navbar-brand .brand-text {
            font-size: 20px;
        }


        /*
        |--------------------------------------------------------------------------
        | Guest Buttons
        |--------------------------------------------------------------------------
        */

        .guest-login-button {
            color: #6f42c1 !important;
            font-weight: 600;

            padding: 6px 15px !important;
        }


        .guest-login-button:hover {
            color: #59339d !important;
        }


        .guest-register-button {
            background: #6f42c1;

            color: #fff !important;

            font-weight: 600;

            border-radius: 6px;

            padding: 6px 15px !important;

            margin-left: 5px;
        }


        .guest-register-button:hover {
            background: #59339d;

            color: #fff !important;
        }


        /*
        |--------------------------------------------------------------------------
        | Content
        |--------------------------------------------------------------------------
        */

        .content-wrapper {
            margin-left: 0 !important;

            width: 100%;

            flex: 1;

            background: #f4f6f9;
        }


        .content-wrapper > .content {
            padding: 0;
        }


        .content-wrapper .container {
            width: 100%;

            max-width: 1140px;

            margin-left: auto;
            margin-right: auto;
        }


        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */

        .main-footer {
            margin-left: 0 !important;

            width: 100%;

            background: #343a40;

            color: #fff;

            padding: 30px 0;
        }


        .main-footer .container {
            width: 100%;

            max-width: 1140px;

            margin-left: auto;
            margin-right: auto;
        }


        .main-footer h5 {
            color: #fff;

            font-weight: 600;

            margin-bottom: 15px;
        }


        .main-footer p {
            color: #ced4da;

            margin-bottom: 8px;
        }


        .main-footer a {
            color: #ced4da;

            text-decoration: none;
        }


        .main-footer a:hover {
            color: #fff;

            text-decoration: none;
        }


        /*
        |--------------------------------------------------------------------------
        | Responsive
        |--------------------------------------------------------------------------
        */

        @media (max-width: 767.98px) {

            .navbar-brand .brand-text {
                font-size: 18px;
            }


            .guest-register-button {
                margin-left: 0;

                margin-top: 5px;

                display: inline-block;
            }


            .main-footer {
                text-align: center;
            }

        }

    </style>

</head>


<body class="hold-transition layout-top-nav">


<div class="wrapper">


    <!--
    |--------------------------------------------------------------------------
    | Navbar
    |--------------------------------------------------------------------------
    -->

    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

        <div class="container">


            <!-- Brand -->

            <a
                href="{{ url('/') }}"
                class="navbar-brand"
            >

                <i class="fas fa-podcast text-primary mr-2"></i>

                <span class="brand-text font-weight-bold">

                    {{ config('app.name', 'Podcast') }}

                </span>

            </a>


            <!-- Mobile Toggle -->

            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#guestWebsiteNavbar"
                aria-controls="guestWebsiteNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            <!-- Navigation -->

            <div
                class="collapse navbar-collapse"
                id="guestWebsiteNavbar"
            >


                <!-- Left menu -->

                <ul class="navbar-nav mr-auto">


                    <li class="nav-item">

                        <a
                            href="{{ route('podcasts.index') }}"
                            class="nav-link"
                        >

                            <i class="fas fa-microphone mr-1"></i>

                            Podcasts

                        </a>

                    </li>


                </ul>


                <!-- Right menu -->

                <ul class="navbar-nav ml-auto">


                    @if (Route::has('login'))

                        <li class="nav-item">

                            <a
                                href="{{ route('login') }}"
                                class="nav-link guest-login-button"
                            >

                                <i class="fas fa-sign-in-alt mr-1"></i>

                                Login

                            </a>

                        </li>

                    @endif


                    @if (Route::has('register'))

                        <li class="nav-item">

                            <a
                                href="{{ route('register') }}"
                                class="nav-link guest-register-button"
                            >

                                <i class="fas fa-user-plus mr-1"></i>

                                Register

                            </a>

                        </li>

                    @endif


                </ul>


            </div>

        </div>

    </nav>



    <!--
    |--------------------------------------------------------------------------
    | Content
    |--------------------------------------------------------------------------
    -->

    <div class="content-wrapper">


        @hasSection('breadcrumb')

            <section class="content-header">

                <div class="container">

                    @yield('breadcrumb')

                </div>

            </section>

        @endif


        <section class="content">

            @yield('content')

        </section>


    </div>



    <!--
    |--------------------------------------------------------------------------
    | Footer
    |--------------------------------------------------------------------------
    -->

    <footer class="main-footer">


        <div class="container">


            <div class="row">


                <!-- About -->

                <div class="col-md-5 mb-3 mb-md-0">

                    <h5>

                        <i class="fas fa-podcast mr-2"></i>

                        {{ config('app.name', 'Podcast') }}

                    </h5>


                    <p>

                        Discover podcasts, explore different categories,
                        and enjoy your favorite content.

                    </p>

                </div>


                <!-- Quick Links -->

                <div class="col-md-3 mb-3 mb-md-0">

                    <h5>
                        Quick Links
                    </h5>


                    <p>

                        <a href="{{ url('/') }}">

                            <i class="fas fa-home mr-2"></i>

                            Home

                        </a>

                    </p>


                    <p>

                        <a href="{{ route('podcasts.index') }}">

                            <i class="fas fa-microphone mr-2"></i>

                            Podcasts

                        </a>

                    </p>

                </div>


                <!-- Account -->

                <div class="col-md-4">

                    <h5>
                        Account
                    </h5>


                    @if (Route::has('login'))

                        <p>

                            <a href="{{ route('login') }}">

                                <i class="fas fa-sign-in-alt mr-2"></i>

                                Login

                            </a>

                        </p>

                    @endif


                    @if (Route::has('register'))

                        <p>

                            <a href="{{ route('register') }}">

                                <i class="fas fa-user-plus mr-2"></i>

                                Register

                            </a>

                        </p>

                    @endif


                </div>


            </div>


            <hr style="border-color: rgba(255,255,255,.15);">


            <div class="text-center">

                <small>

                    &copy; {{ date('Y') }}

                    {{ config('app.name', 'Podcast') }}.

                    All rights reserved.

                </small>

            </div>


        </div>


    </footer>


</div>



<!-- jQuery -->

<script
    src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"
></script>


<!-- Bootstrap -->

<script
    src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"
></script>


<!-- AdminLTE -->

<script
    src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"
></script>


@stack('scripts')


</body>

</html>