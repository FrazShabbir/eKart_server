@extends('layout.master')
@section('title', 'Cart')
@section('customStyle')
    <style>
        .payment-info {
            background: #3078BF;
            padding: 10px;
            border-radius: 6px;
            color: #fff;
            font-weight: bold
        }

        .product-details {
            padding: 10px
        }

        body {
            background: #eee
        }

        .cart {
            background: #fff
        }

        .p-about {
            font-size: 12px
        }

        .table-shadow {
            -webkit-box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
            box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42)
        }

        .type {
            font-weight: 400;
            font-size: 10px
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            padding: 1px 12px;
            border: 2px solid #ada9a9;
            display: inline-block;
            color: #8f37aa;
            border-radius: 3px;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 300
        }

        label.radio input:checked+span {
            border-color: #fff;
            background-color: blue;
            color: #fff
        }

        .credit-inputs {
            background: rgb(102, 102, 221);
            color: #fff !important;
            border-color: rgb(102, 102, 221)
        }

        .credit-inputs::placeholder {
            color: #fff;
            font-size: 13px
        }

        .credit-card-label {
            font-size: 9px;
            font-weight: 300
        }

        .form-control.credit-inputs:focus {
            background: rgb(102, 102, 221);
            border: rgb(102, 102, 221)
        }

        .line {
            border-bottom: 1px solid rgb(102, 102, 221)
        }

        .information span {
            font-size: 12px;
            font-weight: 500
        }

        .information {
            margin-bottom: 5px
        }

        .items {
            -webkit-box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.25);
            box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08)
        }

        .spec {
            font-size: 11px
        }
    </style>
@endsection
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <div class="breadcrumb__links">
                            <a href="{{ route('homePage') }}">Home</a> /
                            <span>Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section class="shop spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 content-wrap content-reponsive">
                    <div class="content-main pdbtm-none">

                        <div class="product__details__tab">
                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    @if(Auth::user())
                                    @if( count($carts) > 0)
                                        <div class="product__details__tab__content">
                                            <div class="ibox">
                                                <div class="container mt-5   rounded cart">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-9">
                                                            <div class="product-details mr-2">
                                                                <div class="d-flex flex-row align-items-center">
                                                                     
                                                                        <a class="text-primary" href="{{ route('homePage')}}"
                                                                        class="ml-2">
                                                                        Continue Shopping
                                                                        </a>
                                                                </div>
                                                               <br>
                                                             
                                                            <table class="table">
                                                                <tr>
                                                                    <th>
                                                                        S #
                                                                    </th>
                                                                    <th>
                                                                        Industry  
                                                                    </th>
                                                                    <th>
                                                                        Report
                                                                    </th>
                                                                    <th>
                                                                        Qty
                                                                    </th>
                                                                    <th>
                                                                        Unit Price
                                                                    </th>
                                                                    <th>
                                                                       Total
                                                                    </th>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                                @foreach ($carts as $item)
                                                                    <tr>
                                                                        <td>
                                                                            {{$loop->iteration}}
                                                                        </td>

                                                                        <td>
                                                                           @if($item->subindustry) {{$item->subindustry->subindustry}} @else -- @endif 
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            @if($item->report) {{$item->report->title}} @else -- @endif 
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            {{$item->qty}}
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            {{$item->price}}
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            {{$item->price*$item->qty}}
                                                                            <input type="hidden" name="total" value=" {{$item->price*$item->qty}}">
                                                                        </td>
                                                                        <td>
                                                                          <button type="button"  class="btn btn-sm remove_cart" data-id="{{ $item->id }}">
                                                                                <i class="fa fa-trash"></i>
                                                                          </button>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                            <table class="table">
                                                                <tr>
                                                                    <th>
                                                                       Total : {{ $cart_total }}
                                                                    </th>
                                                                </tr>
                                                            </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="payment-info">
                                                                <form method="post" action="{{ route('cart.checkout') }}">
                                                                    @csrf
                                                                    <div>
                                                                        <label class="credit-card-label">
                                                                            Name on card <span class="text-danger">*</span>
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control credit-inputs"
                                                                            placeholder="Name on card" name="cardName"
                                                                            required>
                                                                    </div>
                                                                    <div>
                                                                        <label class="credit-card-label">
                                                                            Address
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control credit-inputs"
                                                                            placeholder="Address" name="address">
                                                                    </div>
                                                                    <div>
                                                                        <label class="credit-card-label">
                                                                            Card number
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control credit-inputs"
                                                                            placeholder="0000 0000 0000 0000"
                                                                            name="cardNumber" required>
                                                                    </div>
                                                                    <hr class="line">
                                                                    <div class="d-flex justify-content-between information">
                                                                        <span>Subtotal</span>
                                                                        <span> $ {{ $cart_total }} </span>
                                                                    </div>
                                                                     
                                                                     

                                                                    @auth
                                                                        <input type="hidden" value="{{ Auth::user()->id }}"
                                                                            name="userId" />
                                                                        <button
                                                                            class="btn btn-primary btn-block d-flex justify-content-between mt-3"
                                                                            type="submit">
                                                                            <span>$  {{ $cart_total }}  </span>
                                                                            <span>Checkout<i
                                                                                    class="fa fa-long-arrow-right ml-1"></i></span>
                                                                        </button>
                                                                    @else
                                                                        <button
                                                                            class="btn btn-primary btn-block d-flex justify-content-between mt-3"
                                                                            type="button" data-toggle="modal"
                                                                            data-target="#loginConfirm">
                                                                            <span> Login to Proceed </span>
                                                                            <span>Checkout<i class="fa fa-lock ml-1"></i></span>
                                                                        </button>


                                                                    @endauth
                                                                    <form>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @else
                                        <div class="product__details__tab__content">
                                            <div class="ibox">
                                                <div class="container rounded cart">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-12">
                                                            <div class="product-details">
                                                              <div class=" align-items-center text-center text-danger ">
                                                                    <img src="https://i.pinimg.com/originals/2e/ac/fa/2eacfa305d7715bdcd86bb4956209038.png" 
                                                                    
                                                                    class="img img-thumbnail"
                                                                    alt="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                    @else
                                    <div class="product__details__tab__content">
                                        <div class="ibox">
                                            <div class="container rounded cart">
                                                <div class="row no-gutters">
                                                    <div class="col-md-12">
                                                        <div class="product-details">
                                                          <div class=" align-items-center text-center text-danger ">
                                                                <img src="https://i.pinimg.com/originals/2e/ac/fa/2eacfa305d7715bdcd86bb4956209038.png" 
                                                                
                                                                class="img img-thumbnail"
                                                                alt="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="loginConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Please login to complete your order
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('login') }}" class="btn btn-info">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('customJs')
<script>
    $('.remove_cart').click(function() {
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('delete.cart')}}",
                method: "POST",
                data: {
                    id: id, 
                },
                success: function(result) {
                    if(result.status == true){
                        location.reload();
                    }else{
                        toastr.error(result.message, "Error");
                    }
                }
        });
         

    });

 </script>
@endsection
