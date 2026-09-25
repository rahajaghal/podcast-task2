<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name','Laravel')}} | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">
<style>
    .user-panel {
        padding-left: 10px;
        padding-right: 10px;
    }

    .user-panel-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .user-name {
        display: flex;
        align-items: center;
        gap: 8px;

        min-width: 0;
        color: #ffffff;
        font-size: 14px;
        font-weight: 500;
    }

    .user-name i {
        font-size: 17px;
        color: #adb5bd;
        flex-shrink: 0;
    }

    .user-name span {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .logout-form {
        margin: 0;
        padding: 0;
        flex-shrink: 0;
    }

    .logout-button {
        width: 36px !important;
        height: 36px !important;

        display: flex !important;
        align-items: center !important;
        justify-content: center !important;

        padding: 0 !important;
        margin: 0 !important;

        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        border-radius: 8px !important;

        background: rgba(255, 255, 255, 0.08) !important;
        color: #ff6b6b !important;

        cursor: pointer;
        line-height: 1 !important;

        transition: all 0.2s ease;
    }

    .logout-button i {
        display: block;
        font-size: 15px;
        line-height: 1;
        margin: 0 !important;
    }

    .logout-button:hover {
        background: #dc3545 !important;
        border-color: #dc3545 !important;
        color: #ffffff !important;
    }

    .logout-button:hover i {
        color: #ffffff !important;
    }
</style>


  @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard.index') }}" class="nav-link">Home</a>
      </li>
      
      
    </ul>


    <!-- Right navbar links -->
    
<!-- Right navbar links -->
{{-- <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown">

        <a class="nav-link"
           href="#"
           id="userDropdown"
           role="button"
           data-toggle="dropdown"
           aria-haspopup="true"
           aria-expanded="false">

            <i class="fas fa-user-circle mr-2"></i>
            {{ Auth::user()->name }}
            <i class="fas fa-angle-down ml-2"></i>

        </a>

        <div class="dropdown-menu dropdown-menu-right"
             aria-labelledby="userDropdown">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </button>
            </form>

        </div>

    </li>

</ul> --}}



    {{-- <ul class="navbar-nav ml-auto">

      <!-- User Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">
            <span class="badge badge-primary p-2 rounded-circle mr-2">
                <i class="fas fa-user"></i>
            </span>
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right">

          <!-- Logout -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="dropdown-item text-danger">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
          </form>

        </div>
      </li>

    </ul> --}}
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link">
      <img src="{{ asset('dashboard/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3">
    <div class="user-panel-content">


    <div class="user-name">
        <i class="fas fa-user-circle"></i>
        <span>{{ Auth::user()->name }}</span>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="logout-form">
        @csrf

        <button type="submit" class="logout-button" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
        </button>
    </form>

</div>


      </div>


      

      <!-- Sidebar Menu -->
      <x-nav/>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
              @yield('breadcrumb')
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
</body>
</html> 