<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ config('app.name', 'Podcast') }} | @yield('title')
    </title>

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Bootstrap / AdminLTE -->
    <link rel="stylesheet"
          href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">

    @stack('styles')
</head>

<body >

<div class="wrapper">

    <!-- =========================
         HEADER
    ========================== -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

        <div class="container">

            <!-- Logo / Website Name -->
            <a href="{{ url('/') }}" class="navbar-brand">
                <i class="fas fa-podcast text-primary mr-2"></i>

                <span class="brand-text font-weight-bold">
                    {{ config('app.name', 'Podcast') }}
                </span>
            </a>


            <!-- Mobile menu button -->
            <button class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#websiteNavbar"
                    aria-controls="websiteNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>


            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="websiteNavbar">

                <!-- Left menu -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a href="{{ url('/') }}"
                           class="nav-link">

                            <i class="fas fa-home mr-1"></i>
                            Home

                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#podcasts"
                           class="nav-link">

                            <i class="fas fa-microphone mr-1"></i>
                            Podcasts

                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#about"
                           class="nav-link">

                            <i class="fas fa-info-circle mr-1"></i>
                            About

                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#contact"
                           class="nav-link">

                            <i class="fas fa-envelope mr-1"></i>
                            Contact

                        </a>
                    </li>

                </ul>


                <!-- Right menu -->
                <ul class="navbar-nav ml-auto">

                    @auth

                        <!-- User -->
                        <li class="nav-item dropdown">

                            <a class="nav-link"
                               href="#"
                               id="userDropdown"
                               role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">

                                <i class="fas fa-user-circle mr-1"></i>

                                {{ Auth::user()->name }}

                                <i class="fas fa-angle-down ml-1"></i>

                            </a>


                            <div class="dropdown-menu dropdown-menu-right"
                                 aria-labelledby="userDropdown">

                                <!-- Dashboard -->
                                <a href="{{ route('dashboard.index') }}"
                                   class="dropdown-item">

                                    <i class="fas fa-tachometer-alt mr-2"></i>
                                    Dashboard

                                </a>


                                <div class="dropdown-divider"></div>


                                <!-- Logout -->
                                <form method="POST"
                                      action="{{ route('logout') }}">

                                    @csrf

                                    <button type="submit"
                                            class="dropdown-item text-danger">

                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                        Logout

                                    </button>

                                </form>

                            </div>

                        </li>

                    @else

                        <!-- Login -->
                        <li class="nav-item">

                            <a href="{{ route('login') }}"
                               class="nav-link">

                                <i class="fas fa-sign-in-alt mr-1"></i>
                                Login

                            </a>

                        </li>


                        <!-- Register -->
                        <li class="nav-item">

                            <a href="{{ route('register') }}"
                               class="btn btn-primary ml-2">

                                <i class="fas fa-user-plus mr-1"></i>
                                Register

                            </a>

                        </li>

                    @endauth

                </ul>

            </div>

        </div>

    </nav>
    <!-- /.main-header -->


    <!-- =========================
         MAIN CONTENT
    ========================== -->

    <div class="content-wrapper">

        <!-- Content Header -->
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
        <!-- /.content-header -->


        <!-- Main Content -->
        <main class="content">

            <div class="container">

                @yield('content')

            </div>

        </main>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->


    <!-- =========================
         FOOTER
    ========================== -->

    <footer class="main-footer">

        <div class="container">

            <div class="row">

                <!-- About -->
                <div class="col-md-6">

                    <h5>
                        <i class="fas fa-podcast text-primary mr-2"></i>
                        {{ config('app.name', 'Podcast') }}
                    </h5>

                    <p class="text-muted mb-0">
                        Discover interesting podcasts,
                        listen to your favorite episodes,
                        and enjoy great content.
                    </p>

                </div>


                <!-- Links -->
                <div class="col-md-6 text-md-right">

                    <a href="{{ url('/') }}"
                       class="text-muted mr-3">
                        Home
                    </a>

                    <a href="#about"
                       class="text-muted mr-3">
                        About
                    </a>

                    <a href="#contact"
                       class="text-muted">
                        Contact
                    </a>

                </div>

            </div>


            <hr>


            <div class="row">

                <div class="col-md-6">

                    <strong>
                        Copyright &copy; {{ date('Y') }}
                        <a href="{{ url('/') }}">
                            {{ config('app.name', 'Podcast') }}
                        </a>.
                    </strong>

                    All rights reserved.

                </div>


                <div class="col-md-6 text-md-right">

                    <span class="text-muted">
                        Podcast Platform
                    </span>

                </div>

            </div>

        </div>

    </footer>
    <!-- /.main-footer -->

</div>
<!-- ./wrapper -->


<!-- =========================
     SCRIPTS
========================== -->

<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>

@stack('scripts')

    <style>
    html,
    body {
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .wrapper {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .main-header {
        margin-left: 0 !important;
    }

    .content-wrapper {
        margin-left: 0 !important;
        width: 100%;
    }

    .main-footer {
        margin-left: 0 !important;
    }

    .content-wrapper > .content {
        padding: 0;
    }

    .content-wrapper .container,
    .main-header .container,
    .main-footer .container {
        width: 100%;
        max-width: 1140px;
        margin-left: auto;
        margin-right: auto;
    }
</style>

</body>

</html>

