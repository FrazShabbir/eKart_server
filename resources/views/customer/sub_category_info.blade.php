@extends('layout.master')
@section('title', 'Order Details')
@section('customStyle')

@endsection
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <div class="breadcrumb__links">
                            <a href="{{ route('homePage') }}">Home</a> /
                            <a href="{{ route('homePage') }}">My Orders</a> /
                            <span>Order Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop spad">
        <div class="container-fluid">
            <div class="row">
                @include('layout.customerMenu')

                <div class="col-lg-10 content-wrap content-reponsive">
                    <div class="content-main pdbtm-none">
                        <div class="col-lg-12 col-md-12 edit-block">
                            <h6 class="checkout__title">Order Details</h6>
                            <div class="row">
                                <div class="ibox invoice" style="width:100%;">
                                    <div class="invoice-header">
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table table-striped ">
                                                    <thead>
                                                        <tr class="tab-content">
                                                            <th scope="col"> S# </th>
                                                            <th scope="col">Title / Chapter Name</th>
                                                            <th scope="col">Pages</th>
                                                            <th scope="col">Action</th>
                                                            <th scope="col">Issues</th>
                                                        </tr>
                                                    </thead>

                                                    @foreach ($sub_categories->reports as $report)
                                                        <tr>
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>

                                                            <td>
                                                                {{ $report->title }}
                                                            </td>
                                                            <td>
                                                                {{ $report->totalPages }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('customer.report.info', $report->id) }}"
                                                                    style="color:#3078BF">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('customer.rise.issue', $report->id) }}"
                                                                    class="btn btn-sm btn-warning "> Rise Issue
                                                                </a>
                                                            </td>

                                                        </tr>

                                                         
                                                    @endforeach
                                                </table>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
