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
    <link href="{{ asset('backEnd/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backEnd/assets/vendors/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('backEnd/assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('backEnd/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css') }}"
        rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('backEnd/assets/css/main.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{ asset('backEnd/assets/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/app/public/data/'.$option->faveIcon) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .ibox .ibox-body{
            min-height: 60em!important;
        }
    </style>
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
                    <span class="brand">Admin
                        <span class="brand-tip"> PANEL</span>
                    </span>
                    <span class="brand-mini">AP</span>
                </a>
                <br />
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>

                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span
                                    class="notify-signal"></span></i></a>
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
                                                <div class="font-13">Notification 1</div><small
                                                    class="text-muted">22
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
                            <img src="{{ asset('backEnd/assets/img/admin-avatar.png') }}" />
                            <span></span> {{ Auth::user()->name }} |
                            {{ Auth::user()->roles()->pluck('name')->implode(' ') }}
                            <i class="fa fa-angle-down m-l-5"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item" href="{{ route('admin.profiles') }}">
                                 <i class="fa fa-user"></i>Profile
                            </a>


                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
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
            <div id="sidebar-collapse" >
                <hr>
                <ul class="side-menu metismenu">
                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a class="active" href="{{ route('admin.dashboard') }}"><i
                                class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="  {{ request()->routeIs('admin.roles') ? 'active' : '' }}">

                        <a class="" href="{{ route('admin.roles') }}"><i
                                class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Roles</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/home') ? 'active' : '' }}">
                        <a href="{{ route('admin.home') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Home Page Text</span>
                        </a>
                    </li>
                    <li class="@if (Request::is('admin/user*')) active @endif">
                        <a href="#" class="{{ request()->is('reg-users') ? 'active' : '' }}">
                            <i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Users / Employees List</span>
                            <i class="fa fa-angle-left arrow"></i>
                        </a>
                        <ul class="nav-2-level collapse {{ request()->is('reg-users') ? 'in' : '' }}">
                            <li>
                                <a href="{{ route('admin.registered.users') }} "> All Registred
                                    Users</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.pending.users') }} "> Pending Users</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.managers') }} "> All Managers</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.employee') }} "> All Employees</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.customers') }} "> Customers</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.user.create') }}"> Add Manager/Employee</a>
                            </li>

                        </ul>
                    </li>

                    <li class="@if (Request::is('admin/projects')) active @endif">
                        <a href="#">
                            <i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Project Module</span>
                            <i class="fa fa-angle-left arrow"></i></a>

                        <ul class="nav-2-level collapse ">
                            <li>
                                <a href="{{ route('admin.projects') }}">All Project Type</a>
                            </li>
                        </ul>
                    </li>

                    <li class="@if (Request::is('admin/service') or Request::is('admin/service/template') or Request::is('admin/service/client') or Request::is('admin/service/testimonial')) active @endif">
                        <a href=" #">
                            <i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Services Module</span><i
                                class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">

                            <li>
                                <a href="{{ route('admin.service.template') }}">Service Page  Template</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.service') }}">All Services Type</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.service.client') }}">Services Clients</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.service.testimonial') }}">Services
                                    Testimonials</a>
                            </li>


                        </ul>
                    </li>
                    <li class="@if (Request::is('admin/industry*')
                                    or
                                    Request::is('admin/subIndustry*') )) active @endif"
                                >
                        <a href=" javascript:;">
                            <i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Industries Module</span><i
                                class="fa fa-angle-left arrow"></i></a>


                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{ route('admin.industry') }}">All Industries Type</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.subIndustry') }}">All Sub-Industries Type</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.industry.template') }}">Industries Page
                                    Template</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.industry.client') }}">Industries Clients</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.industry.testimonial') }}">Industries
                                    Testimonials</a>
                            </li>

                        </ul>
                    </li>

                    <li class="@if (Request::is('admin/regions') or Request::is('admin/regions/template') or Request::is('admin/region/client') or Request::is('admin/region/testimonial')) active @endif">

                        <a href=" javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Region Module</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{ route('admin.region') }}"> All Region & Countries</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.regions.template') }}">Region Page
                                    Template</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.regions.client') }}">Region Clients</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.region.testimonial') }}">Region
                                    Testimonials</a>
                            </li>
                        </ul>
                    </li>

                    <li class="@if(Request::is('admin/reports') or Request::is('admin/reports/users') or Request::is('admin/report/create') or  Request::is('admin/report/issues')) active @endif">

                        <a href=" #"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Reports / Articles</span><i
                                class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">

                            <li>
                                <a href="{{ route('admin.report') }}">All Reports</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.report.user.track')}}">User Wise Tracking</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.my_reports') }}">My Work / Report</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.report.create') }}">Add New Report / Work</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.report.issues') }}"> Issues

                                    <span class="badge badge-primary badge-circle m-r-5 m-b-5">  {{ $reportIssue  }}  </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.report.article.index') }}">
                                    Artcles
                                </a>

                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Message Box </span>
                        </a>
                    </li>




                    <li class="@if(Request::is('admin/enquires') or Request::is('admin/enquires/about')) active @endif">
                        <a href="#">
                            <i class="sidebar-item-icon fa fa-phone"></i>
                            <span class="nav-label">Enquires</span><i class="fa fa-angle-left arrow"></i>
                        </a>
                            <ul class="nav-2-level collapse">
                                <li>
                                    <a href="{{ route('admin.enquires') }}">
                                        Contact Enquires
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.about.enquiry') }}">
                                        Quick Enquires
                                    </a>
                                </li>
                            </ul>
                    </li>


                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Informational Pages 1</span><i
                                class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{ route('admin.about') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.client') }}"> Our Clients</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.press') }}"> Press Releases</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.news') }}"> Company News</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.event') }}"> Events</a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Informational Pages 2</span><i
                                class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">

                            <li>
                                <a href="{{ route('admin.contact.setting') }}">Conatct Us</a>
                            </li>


                            <li>
                                <a href="{{ route('admin.termsconditions') }}"> Terms & Conditions</a>
                            </li>


                            <li>
                                <a href="{{ route('admin.privacy') }}"> Privacy</a>
                            </li>

                            <li>
                                <a href="{{ route('admin.disclaimer') }}">  Disclaimer </a>
                            </li>


                        </ul>
                    </li>



                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Informational Pages 3</span><i
                                class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">

                            <li>
                                <a href="{{ route('admin.legal') }}"> Legal </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.accessibilitys') }}"> Accessibilitys</a>
                            </li>
                        </ul>
                    </li>
                    <li class="@if (Request::is('admin/orders') or Request::is('admin/myOrders')) active @endif">
                        <a href=" javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Orders</span><i class="fa fa-angle-left arrow"></i></a>

                        <ul class="nav-2-level collapse">

                            <li>
                                <a href="{{ route('admin.orders') }}">All Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.myOrders') }}"> My Orders</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Messages / Inbox </span><i
                                class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="#">Messages</a>
                            </li>
                        </ul>
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
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
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

    <script src="{{ asset('backEnd/assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('backEnd/assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('backEnd/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('backEnd/assets/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('backEnd/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}"
        type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ asset('backEnd/assets/vendors/chart.js/dipublic/backEndst/Chart.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('backEnd/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('backEnd/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('backEnd/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js') }}"
        type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('backEnd/assets/js/app.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('backEnd/assets/vendors/DataTables/datatables.min.js') }}" type="text/javascript">
    </script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ asset('backEnd/assets/js/scripts/dashboard_1_demo.js') }}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        @if (Session::has('success'))
            swal({
            text: "{{ Session::get('success') }}",
            icon: "success",
            });
        @endif

        @if (Session::has('error'))
            swal({
            text: "{{ Session::get('error') }}",
            icon: "error",
            });
        @endif
    </script>



    @section('custom_js')
    @show

</body>
