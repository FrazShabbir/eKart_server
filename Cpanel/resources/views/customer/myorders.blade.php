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
                        <span>My Orders</span>
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
                  <h6 class="checkout__title">My Orders</h6>
                  <div class="product__details__tab__content1 ">
                    <table class="table table-striped">
                      <thead>
                        <tr class="tab-content">
                          <th scope="col">S.No</th>
                          <th scope="col">Order #</th>
                          <th scope="col">Total</th>
                          <th scope="col">Purchase Date</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- <tr>
                          <th scope="row">1</th>
                          <td>Healthcare Virtual Assistants Market</td>
                          <td>23-08-2021</td>
                          <td class="view-details-button"><a href="product-single.php#product-fullview"><i
                                class="fa fa-eye"></i> View Details</a></td>
                          <td class="invoice-button"><a href="invoice.php"><i class="fa fa-file-text"></i> Invoice</a></td>
                        </tr> --}}

                        @foreach($orders as $order)
                        <tr>
                            <td> {{ $loop->iteration}} </td>
                            <td> #{{ $order->orderNumber}}	</td>
                             <td> {{ $order->total}}</td>
                            <td> {{ $order->orderDate}} </td>
                            <td class="view-details-button">
                                    <a href="{{ route('customer.orderDetail', $order->id) }}">
                                            <i class="fa fa-eye"></i> Order Details
                                    </a>
                            </td>
                            <td class="invoice-button">
                                    <a href="{{ route('customer.invoice',$order->id) }}">
                                            <i class="fa fa-file-text"></i> Invoice
                                    </a>
                            </td>
                        </tr>
                    @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


        </div>
    </div>
</section>
@endsection
