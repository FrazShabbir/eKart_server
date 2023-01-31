@extends('layout.master')
@section('title', 'Register')
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
                            <a href="{{ route('homePage') }}">Home</a> /
                            <span>Registration</span>
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
                <form action="{{ route('registerProcess') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2 col-md-6">
                        </div>
                        <div class="col-lg-8 col-md-6 register-block1" @if(Session::has('success')) style="display: none"  @endif>
                            <h6 class="checkout__title">Fill Your Details to Create an New Account</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" placeholder="First Name" name="name" value="{{ old('name')}}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" placeholder="Last Name" name="last" value="{{ old('last')}}">
                                        @error('last')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Company / Institute Name<span>*</span></p>
                                        <input type="text" placeholder="Company / Institute Name" name="company" value="{{ old('company')}}">
                                        @error('company')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Designation<span>*</span></p>
                                        <input type="text" placeholder="Founder, Student etc." name="designation" value="{{ old('designation')}}">
                                        @error('designation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Address" class="checkout__input__add" name="address" value="{{ old('address')}}">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" placeholder="Town/City" name="city" value="{{ old('city')}}">
                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" placeholder="Country/State" name="state" value="{{ old('state')}}">
                                @error('state')
                                 <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" placeholder="Postcode/ZIP" name="zip" value="{{ old('name')}}">
                                @error('zip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Phone Number<span>*</span></p>
                                <input type="text" placeholder="Phone Number" name="phone" value="{{ old('phone')}}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" placeholder="Email" name="email" value="{{ old('email')}}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Password<span>*</span></p>
                                        <input type="password" placeholder="Password" name="password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="checkout__input2">
                                        <p>Add SOP+Reference Work (Word/PDF/PPT)</p>
                                        <input id="file-upload" type="file" name="attach"/>
                                        </div>
                                </div>
                                <div class="col-lg-12">
                                        <p>* Add your SOP (Statement of purpose)+ Reference Work (both in single document) in the area of your interest/industry to showcase your skill/expertise to your fellow Academicians / Researchers / Industry SME's and to register with us.</p>

                                </div>
                            </div>
                            <div class="checkout__input">
                                    <button type="submit" class="site-btn">Create An ACCOUNT</button>
                            </div>



                        </div>

                          @if(Session::has('success'))

                            <div class="success-msg">
                                <p class="thank-you-txt">Thank you for showing interest in joining us. We will look at your credentials, reference work and get back to you for further requirements, if any, before registration approval.</p>
                                <p class="thank-you-txt2">Contact us, if you have further queries.</p>
                                <p>*All registrations are subject to checks before approval.</p>
                                </div>

                            @endif


                        <div class="col-lg-2 col-md-6">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
