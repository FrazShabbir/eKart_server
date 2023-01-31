@extends('layout.admin_master')
@section('title','All Orders')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Orders</h1>
    </div>
    <div class="page-content fade-in-up" style="min-height:700px;">
        <div class="ibox">
            <div class="ibox-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="tab-content">
                                  <th scope="col">S.No</th>
                                  <th scope="col">Order #</th>
                                  <th scope="col">Total</th>
                                  <th scope="col">Purchase Date</th>
                                  <th colspan="2"> Actions </th>

                                </tr>
                              </thead>
                            <tbody>

                                @foreach($orders as $order)
                                <tr>
                                    <td> {{ $loop->iteration}} </td>
                                    <td> {{ $order->orderNumber}}	</td>
                                     <td> {{ $order->total}}</td>
                                    <td> {{ $order->orderDate}} </td>
                                    <td class="view-details-button">
                                            <a href="{{ route('admin.orderDetail', $order->id) }}">
                                                    <i class="fa fa-eye"></i> Order Details
                                            </a>
                                    </td>
                                    <td class="invoice-button">
                                            <a href="{{ route('admin.order.invoice',$order->id) }}">
                                                    <i class="fa fa-file-text"></i> Invoice
                                            </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
        </div>
        <div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->

</div>


@endsection
