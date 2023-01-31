@extends('layout.admin_master')
@section('title','Home')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">201</h2>
                        <div class="m-b-5">Published Reports</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View All Reports</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">1250</h2>
                        <div class="m-b-5">Pending Reports</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View all Pendings</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">70</h2>
                        <div class="m-b-5">Enquires</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View All Enquires</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">108</h2>
                        <div class="m-b-5">All Orders</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View All Orders</small></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">201</h2>
                        <div class="m-b-5">Active Customers</div><i class="ti-user widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View All Customers</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">1250</h2>
                        <div class="m-b-5">Pending Customers</div><i class="ti-user widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View All Pending Customers</small></div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Latest Orders</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>


                        </div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Customer</th>
                                    <th width="91px">Date</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    1
                                    </td>
                                    <td>Healthcare Virtual Assistants Market	</td>
                                    <td>Construction</td>
                                    <td>
                                        Ramesh K
                                    </td>
                                    <td>10/07/2021</td>
                                    <td><a href="invoice.php"><span class="btn btn-primary"><i class="fa fa-print"></i> View Invoice</span></a></td>
                                </tr>
                                <tr>
                                    <td>
                                    2
                                    </td>
                                    <td>Introduction</td>
                                    <td>Research Institutes</td>
                                    <td>
                                        Pratap Singh
                                    </td>
                                    <td>10/07/2021</td>
                                    <td><a href="invoice.php"><span class="btn btn-primary"><i class="fa fa-print"></i> View Invoice</span></a></td>
                                </tr>
                                <tr>
                                    <td>
                                    3
                                    </td>
                                    <td>Summary and Highlights	</td>
                                    <td>Semiconductors</td>
                                    <td>
                                        Kumari
                                    </td>
                                    <td>10/07/2021</td>
                                    <td><a href="invoice.php"><span class="btn btn-primary"><i class="fa fa-print"></i> View Invoice</span></a></td>
                                </tr>
                                <tr>
                                    <td>
                                    4
                                    </td>
                                    <td>Market and Technology Background	</td>
                                    <td>Financial Markets</td>
                                    <td>
                                        Venkatesh
                                    </td>
                                    <td>10/07/2021</td>
                                    <td><a href="invoice.php"><span class="btn btn-primary"><i class="fa fa-print"></i> View Invoice</span></a></td>
                                </tr>
                                <tr>
                                    <td>
                                    5
                                    </td>
                                    <td>Impact of COVID-19	</td>
                                    <td>Information and Communication</td>
                                    <td>
                                        SriKanth
                                    </td>
                                    <td>10/07/2021</td>
                                    <td><a href="invoice.php"><span class="btn btn-primary"><i class="fa fa-print"></i> View Invoice</span></a></td>
                                </tr>
                                <tr>
                                    <td>
                                     6
                                    </td>
                                    <td>Market Dynamics	</td>
                                    <td>Chemicals and Materials</td>
                                    <td>
                                        Jeeva
                                    </td>
                                    <td>10/07/2021</td>
                                    <td><a href="invoice.php"><span class="btn btn-primary"><i class="fa fa-print"></i> View Invoice</span></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Messages</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="media-list media-list-divider m-0">
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="{{asset('public/backEnd/assets/img/users/u1.jpg')}}" width="40" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">Ramesh Kumar <small class="float-right text-muted">22/08/2021</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="{{asset('public/backEnd/assets/img/users/u2.jpg')}}" width="40" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">Swapna <small class="float-right text-muted">15/09/2021</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="{{asset('public/backEnd/assets/img/users/u3.jpg')}}" width="40" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">Kiran <small class="float-right text-muted">15/09/2021</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                </div>
                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="{{asset('public/backEnd/assets/img/users/u6.jpg')}}" width="40" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">Rajesh <small class="float-right text-muted">14/09/2021</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                </div>

                            </li>
                            <li class="media">
                                <a class="media-img" href="javascript:;">
                                    <img class="img-circle" src="{{asset('public/backEnd/assets/img/users/u6.jpg')}}" width="40" />
                                </a>
                                <div class="media-body">
                                    <div class="media-heading">Naveen Readdy <small class="float-right text-muted">16/09/2021</small></div>
                                    <div class="font-13">Lorem Ipsum is simply dummy text of the printing and typesetting.</div>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .visitors-table tbody tr td:last-child {
                display: flex;
                align-items: center;
            }

            .visitors-table .progress {
                flex: 1;
            }

            .visitors-table .progress-parcent {
                text-align: right;
                margin-left: 10px;
            }
        </style>

    </div>
    <!-- END PAGE CONTENT-->

</div>


@endsection
