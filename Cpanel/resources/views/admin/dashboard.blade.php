@extends('layout.admin_master')
@section('title','Admin Dashboard')
@section('customCss')
    <style>
        .ibox .ibox-body{
           // min-height:0em!important;
        }
        .ibox-dashborad{
            margin-bottom: 20px;
            padding: 10px 20px;
        }

        .ibox-dashborad i{
           background: none!important;
           padding-right: 20px;
        }
    </style>
@endsection
@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox-dashborad bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> {{ $publishreports }} </h2>
                        <div class="m-b-5">Published Reports</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View All Reports</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox-dashborad bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> {{ $pendingreports }} </h2>
                        <div class="m-b-5">Pending Reports</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View all Pendings</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox-dashborad bg-warning color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> {{ $enquires }}</h2>
                        <div class="m-b-5">Enquires</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View All Enquires</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox-dashborad bg-danger color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong">{{ $orders }}</h2>
                        <div class="m-b-5">All Orders</div><i class="ti-bar-chart widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View All Orders</small></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="ibox-dashborad bg-success color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> {{ $customer }} </h2>
                        <div class="m-b-5">Active Customers</div><i class="ti-user widget-stat-icon"></i>
                        <div><i class="fa fa-level-up m-r-5"></i><small>View All Customers</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="ibox-dashborad bg-info color-white widget-stat">
                    <div class="ibox-body">
                        <h2 class="m-b-5 font-strong"> {{ $pendingCustomer }} </h2>
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
                                    <th>Order #</th>
                                    <th>Total</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($latestOrders as $latestOrder )
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td> {{ $latestOrder->orderNumber }}</td>
                                        <td> {{ $latestOrder->total }} </td>
                                        <td>
                                            {{ $latestOrder->user->name }}
                                        </td>
                                        <td> {{ $latestOrder->orderDate }} </td>
                                        <td><a href="{{ route('admin.order.invoice',$latestOrder->id)}}"><span class="btn btn-primary"><i class="fa fa-print"></i> View Invoice</span></a></td>
                                    </tr>
                                    @endforeach

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
