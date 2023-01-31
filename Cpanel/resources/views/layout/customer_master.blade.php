<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>
        @yield('title') | Admin Panel
    </title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('public/backEnd/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backEnd/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backEnd/assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('public/backEnd/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('public/backEnd/assets/css/main.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{ asset('public/backEnd/assets/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @section('customCss')
    @show
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="{{ route('admin.dashboard') }}">
                    <span class="brand">Customer
                        <span class="brand-tip"> PANEL</span>
                    </span>
                    <span class="brand-mini">CP</span>

                </a>
                <br />

            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o rel"><span class="notify-signal"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <a class="pull-right" href="#">view all</a>
                                    <br />
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">

                                            <div class="media-body">
                                                <div class="font-13">Notification 1</div><small class="text-muted">22
                                                    mins</small>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="{{ asset('public/backEnd/assets/img/admin-avatar.png') }}" />
                            <span></span> {{  Auth::user()->name }} |
                            {{  Auth::user()->roles()->pluck('name')->implode(' ') }} <i
                                class="fa fa-angle-down m-l-5"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">


                            <a class="dropdown-item" href="{{ route('profile') }}"> <i
                                    class="fa fa-user"></i>Profile</a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">

                                <i class="fa fa-power-off"></i>Logout

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <hr>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="{{ route('admin.dashboard') }}"><i
                                class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="navi-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <span class="symbol symbol-20 mr-3">
                                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">
                                    <i class="sidebar-item-icon fa fa-calendar"></i>
                                </span>
                            </span>
                            <span class="navi-text" id="logout-btn">Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @section('content')
        @show
    </div>

    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>

    <script src="{{ asset('public/backEnd/assets/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/backEnd/assets/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('public/backEnd/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('public/backEnd/assets/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('public/backEnd/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}"
        type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('public/backEnd/assets/vendors/chart.js/dipublic/backEndst/Chart.min.js')}}"
        type="text/javascript"></script>
    <script src="{{ asset('public/backEnd/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"
        type="text/javascript"></script>
    <script src="{{ asset('public/backEnd/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"
        type="text/javascript"></script>
    <script src="{{ asset('public/backEnd/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js')}}"
        type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('public/backEnd/assets/js/app.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public/backEnd/assets/vendors/DataTables/datatables.min.js')}}" type="text/javascript">
    </script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('public/backEnd/assets/js/scripts/dashboard_1_demo.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if(Session::has('success'))

        swal({

            text: "{{ Session::get('success') }}",
            icon: "success",
        });


        @endif


        @if(Session::has('error'))

        swal({

            text: "{{ Session::get('error') }}",
            icon: "error",
        });

        @endif

    </script>

    @section('custom_js')
    @show

</body>
