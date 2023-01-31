@extends('layout.master')
@section('title', 'Forget Reset')
@section('customStyle')
    <style>
            .mb{
                margin-bottom: 10px!important;
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
                            <a href="{{ route('homePage')}}">Home</a> /
                            <span>Reset Password</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form register-block">

                <form  action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="row">
                        <div class="col-lg-2 col-md-6">
                        </div>
                        <div class="col-lg-8 col-md-6 register-block1">
                            <h6 class="checkout__title">Please set new password.</h6>
                            @foreach ($errors->all() as $error)
                                    <small class="text-danger"> {{ $error }} </small>
                            @endforeach


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">

                                        <input type="email" placeholder="Email Address" name="email" value="{{old('email', $request->email)}}" required  >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Password<span>*</span></p>
                                        <input type="password" placeholder="Enter password" name="password"  required  >
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Confirm Password<span>*</span></p>
                                        <input type="password" placeholder="Re enter password" name="password_confirmation"  required  >
                                        @error('password_confirmation')
                                            <small class="text-danger">{{ $message }}</small>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <button type="submit" class="site-btn">Update</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="forgot pull-right">
                                        <a href="{{ route('login')}}">Back to Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection




@section('customJs')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            @if(Session::has('success'))
            swal({
                text: "{{ Session::get('success') }}",
                icon: "success",
            });
            @endif
            @if(Session::has('error'))
            swal({

                text: "{{ Session::get('error') }}",
                icon: "error",
            });
            @endif

            @if(Session::has('status'))
            swal({

                text: "{{ Session::get('status') }}",
                icon: "success",
            });
            @endif




        </script>




@endsection



