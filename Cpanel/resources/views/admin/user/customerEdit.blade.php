@extends('layout.admin_master')
@section('title','Edit Customer')

@section('content')

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
        <div class="ibox">
            <div class="ibox-body">
                <div class="page-heading">
                    <h1 class="page-title">Update Customer</h1>
                </div>
                <form action="{{ route('registerProcess') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2 col-md-6">

                        </div>
                        <div class="col-lg-8 col-md-6 register-block1">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" placeholder="First Name" name="name" class="form-control" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" placeholder="Last Name" name="last" class="form-control">
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
                                        <input type="text" placeholder="Company / Institute Name" name="company" class="form-control">
                                        @error('company')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Designation<span>*</span></p>
                                        <input type="text" placeholder="Founder, Student etc." name="designation" class="form-control">
                                        @error('designation')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Address" class="checkout__input__add form-control" name="address" class="">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" placeholder="Town/City" name="city" class="form-control" required>
                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" placeholder="Country/State" name="state" class="form-control">
                                @error('state')
                                 <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" placeholder="Postcode/ZIP" name="zip" class="form-control">
                                @error('zip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Phone Number<span>*</span></p>
                                <input type="text" placeholder="Phone Number" name="phone" class="form-control">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" placeholder="Email" name="email" class="form-control " required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Password<span>*</span></p>
                                        <input type="text" placeholder="Password" name="password" class="form-control" required>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="checkout__input2">
                                        <p>Add SOP+Reference Work (Word/PDF/PPT)</p>
                                        <input id="file-upload" type="file" name="attach"/>
                                        </div>
                                </div>

                                <div class="col-lg-6 pt-4">


                                        <a href=""> <i class="fa fa-download"></i> Download  </a>


                            </div>
                                <div class="col-lg-12">
                                    <br/>
                                        <p>* Add your SOP (Statement of purpose)+ Reference Work (both in single document) in the area of your interest/industry to showcase your skill/expertise to your fellow Academicians / Researchers / Industry SME's and to register with us.</p>

                                </div>
                            </div>
                            <div class="checkout__input">
                                    <button type="submit" class="site-btn btn btn-sm btn-info">Create An Account</button>
                            </div>



                        </div>
                        <div class="col-lg-2 col-md-6">

                        </div>
                    </div>
                </form>
            </div>
        </div>
            </div>
        </div>
        <div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->

</div>


@endsection
