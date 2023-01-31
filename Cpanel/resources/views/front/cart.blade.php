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
                                    @if (Cart::count() > 0)
                                        <div class="product__details__tab__content">
                                            <div class="ibox">
                                                <div class="container mt-5 p-3 rounded cart">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-8">
                                                            <div class="product-details mr-2">
                                                                <div class="d-flex flex-row align-items-center"><i
                                                                        class="fa fa-long-arrow-left"></i><span
                                                                        class="ml-2">
                                                                        Continue Shopping</span>
                                                                </div>
                                                                <hr>
                                                                <h6 class="mb-0">Cart Items
                                                                    ({{ Cart::count() }})</h6>
                                                                @foreach (Cart::content() as $item)
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                                                                        <div class="d-flex flex-row">
                                                                            @if ($item->model->photo)
                                                                                <img class="rounded"
                                                                                    src="{{ asset('storage/app/public/data/reports/' . $item->model->photo) }}"
                                                                                    width="40">
                                                                            @else
                                                                                <img class="rounded"
                                                                                    src="{{ asset('storage/app/public/data/' . $item->model->imageIcon) }}"
                                                                                    width="40">
                                                                            @endif
                                                                            <div class="ml-2">
                                                                                <span class="font-weight-bold d-block">
                                                                                    @if ($item->model->title)
                                                                                        {{ $item->model->title }}
                                                                                    @else
                                                                                        {{ $item->model->subindustry }}
                                                                                        <small> (Category) </small>
                                                                                    @endif
                                                                                </span>
                                                                                <span class="spec">
                                                                                    {{ $item->author }} </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex flex-row align-items-center">
                                                                            <span class="d-block">
                                                                                {{ $item->qty }}</span>

                                                                            <span class="d-block ml-5 font-weight-bold">$
                                                                                {{ $item->price }}</span>
                                                                            <form action="{{ route('cartItem.remove') }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="itemId"
                                                                                    value="{{ $item->rowId }}">
                                                                                <button
                                                                                    class="fa fa-trash-o ml-3 text-black-50"
                                                                                    style="border:none" type="submit">
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="payment-info">
                                                                <form method="post" action="{{ route('checkOut') }}">
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
                                                                        <span> $ {{ Cart::subtotal() }} </span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between information">
                                                                        <span>Shipping</span><span> -</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between information">
                                                                        <span>Tax</span> <span>${{ Cart::tax() }}</span>
                                                                    </div>

                                                                    @auth
                                                                        <input type="hidden" value="{{ Auth::user()->id }}"
                                                                            name="userId" />
                                                                        <button
                                                                            class="btn btn-primary btn-block d-flex justify-content-between mt-3"
                                                                            type="submit">
                                                                            <span>$ {{ Cart::total() }}</span>
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
                                        <div class="product__details__tab__content text-center">
                                            <img src="https://i.pinimg.com/originals/2e/ac/fa/2eacfa305d7715bdcd86bb4956209038.png" 
                                            style="width:30%"
                                            alt="" class="img img-thumbnail">

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
