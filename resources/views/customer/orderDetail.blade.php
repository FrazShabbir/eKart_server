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
                        <a href="{{ route('customer.orders') }}">Orders</a> /
                        <span>Details</span>
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
                                                      <th scope="col">Type</th>
                                                      <th scope="col">Action</th>
                                                      <th scope="col">Issues</th>
                                                    </tr>
                                                  </thead>

                                                  @foreach ($orders->details as $order )
                                                        <tr>
                                                            <td>
                                                                {{ $loop->iteration}}
                                                            </td>
                                                            
                                                            <td>
                                                                @if($order->report) 
                                                                    
                                                                    {{ $order->report->title }}
                                                                
                                                                @elseif($order->subIndustry)
                                                                    
                                                                    {{ $order->subIndustry->subindustry }}
                                                                
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{  ucfirst($order->type) }}
                                                            </td>
                                                            <td>
                                                                @if($order->report) 
                                                                    {{ $order->report->totalPages }}
                                                                @else
                                                                    -- 
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($order->report) 
                                                                <a href="{{ route('customer.report.info',$order->report->id)}}"   style="color:#3078BF"> 
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                @else
                                                                    <a href="{{ route('customer.report.category.info',$order->subIndustry->id)}}"   style="color:#3078BF"> 
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td> 
                                                                @if($order->report)  
                                                                    <a href="{{ route('customer.rise.issue',$order->report->id)}}" 
                                                                        class="btn btn-sm btn-warning ">  Rise   Issue  
                                                                    </a>
                                                                @else
                                                                    -- 
                                                                @endif 
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
