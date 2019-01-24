<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Company') }} | @yield('title', 'Company')</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ url('plugins/font-awesome/css/font-awesome.min.css') }}">

        <!-- iCheck -->
        <link rel="stylesheet" href="{{ url('plugins/iCheck/square/blue.css') }}">

        <!-- DataTables -->
        <link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap4.css') }}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Favicon -->
        <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
        
        <!-- Tooltip -->
        <style>
            .tooltip .tooltip-inner {
                min-width: 500px;
                text-align: justify;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini">
        <div id="app" class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                    </li>
                </ul>
            </nav>

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{ url('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
                    <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item has-treeview">
                                    <a href="#" class="d-block nav-link">
                                        <img src="{{ url('images/user.png') }}" class="img-circle elevation-2" alt="User Image">
                                        <p>{{ Auth::user()->name }}</p>
                                        <i class="right fa fa-angle-left"></i>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}" 
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                        <i class="nav-icon fa fa-sign-out"></i>
                                                        <p>{{ __('Logout') }}</p>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul> 
                                </li>
                            @endguest
                        </ul>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column">
                            @auth
                                @includeWhen(Auth::user()->role == 'director', 'partials.director.navbar')
                                @includeWhen(Auth::user()->role == 'employee', 'partials.employee.navbar')
                            @endauth
                        </ul>
                    </nav>
                </div>
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">@yield('title', 'Company')</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <main>
                    @yield('content')
                </main>
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Made by GoStars
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2019 <a href="{{ url('/') }}">My Company</a>.</strong> All rights reserved.
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- iCheck -->
        <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

        <!-- DataTables -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>

        <!-- SlimScroll -->
        <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

        <!-- FastClick -->
        <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>

        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass   : 'iradio_square-blue',
                    increaseArea : '20%' // optional
                });

                $('[data-toggle="tooltip"]').tooltip();

                // $("#paymentsTable").DataTable();
                // $("#employeesTable").DataTable();
                // $("#usersTable").DataTable();
            });
        </script>
    </body>
</html>
