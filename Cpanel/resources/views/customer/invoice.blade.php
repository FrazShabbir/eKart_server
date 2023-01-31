@extends('layout.master')
@section('title', 'My Orders')
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
                        <span>My Account</span>
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
                        <h6 class="checkout__title">Invoice Details</h6>
                        <div class="row">
                            <div class="ibox invoice" style="width:100%;">
                                <div class="invoice-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="invoice-logo">
                                                <h1><b>INVOICE</b></h1>
                                            </div>
                                            <div>
                                                <div class="m-b-5 font-bold">Invoice from</div>
                                                <div><b>BYREDDY CONSULTING</b></div>
                                                <ul class="list-unstyled m-t-10">
                                                    <li class="m-b-5">
                                                        <i class="fa fa-map-marker" aria-hidden="true"></i> Flat 101,
                                                        Vigneshwara residency<br>
                                                        Vani Nagar, Malkajgiri, Hyderabad, 500047</li>
                                                    <li class="m-b-5">
                                                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                                        +91-9966779325</li>
                                                    <li>
                                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                        info@byreddyconsulting.com</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right">
                                            <div class="clf" style="margin-bottom:30px;">
                                                <dl class="row pull-right" style="width:100%;">
                                                    <dt class="col-sm-6">Invoice Date</dt>
                                                    <dd class="col-sm-6"> {{ $order->orderDate }}  </dd>
                                                </dl>
                                            </div>
                                            <div>
                                                <div class="m-b-5 font-bold">Invoice To</div>
                                                <div>   {{ $order->user->name }} </div>
                                                <ul class="list-unstyled m-t-10">
                                                    <li class="m-b-5"><i class="fa fa-map-marker"
                                                            aria-hidden="true"></i>  {{ $order->user->address }}</li>
                                                    <li class="m-b-5"><i class="fa fa-envelope-o"
                                                            aria-hidden="true"></i>    {{ $order->user->email }} </li>
                                                    <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                                        {{ $order->user->phone }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped no-margin table-invoice">
                                    <thead>
                                        <tr>
                                            <th>Item Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($orderdetails->count()>0)
                                        @foreach ($orderdetails as $orderdetail)
                                            <tr>
                                                <td>
                                                    <div>
                                                        <strong>
                                                            {{ $orderdetail->report->title }}
                                                        </strong>
                                                    </div><small> {{ $orderdetail->report->author }} </small>
                                                </td>
                                                <td> {{ $orderdetail->qty }} </td>
                                                <td> {{ $orderdetail->price }} </td>
                                                <td> {{ $orderdetail->qty * $orderdetail->price }} </td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                        Product Detail Not Found
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <table class="table no-border">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th width="15%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($orderdetails->count()>0)
                                        <tr class="text-right">
                                            <td class="font-bold font-18">TOTAL:</td>
                                            <td class="font-bold font-18">Rs. {{ $order->total }}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    <button class="btn btn-info" type="button" onclick="javascript:window.print();"><i
                                            class="fa fa-print"></i> Print</button>
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
