@extends('layout.master')
@section('title', 'Home')
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
                        <h6 class="checkout__title">Edite Your Account Details</h6>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="text-danger">{{$error}}</div>
                            @endforeach
                        @endif

                        <form action="{{ route('customer.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <input type="hidden" name="UserDetailId" value="{{ $user->UserDetail->id }}">
                                <div class="col-lg-9">
                                    <div class="checkout__input">
                                        <p>Name<span>*</span></p>
                                        <input type="text" placeholder="Name" value="{{ $user->name }}" name="name">

                                    </div>
                                    <div class="checkout__input">
                                        <p>Designation<span>*</span></p>
                                        <input type="text" placeholder="Manager, Student etc." value="{{ $user->UserDetail->designation }}" name="designation">
                                    </div>
                                    <div class="checkout__input">
                                        <p>Company / Institute Name<span>*</span></p>
                                        <input type="text" placeholder="ByReddy Consulting Pvt Ltd" value="{{ $user->UserDetail->company }}" name="company">
                                    </div>
                                    <div class="checkout__input mb-2">
                                        <p>Industry Type</p>
                                        <select class="form-control" name="industry_id">

                                            @foreach ($industries as $industry )
                                                    <option value="{{  $industry->id }}"
                                                        @if($industry->id ==  $user->UserDetail->industry_id ) selected @endif>
                                                        {{  $industry->industryType}}
                                                    </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="checkout__input">
                                              @if($user->UserDetail->photo == '')
                                                    @php
                                                        $src = 'analysts-avatar.gif'
                                                    @endphp
                                              @else
                                                    @php
                                                        $src = $user->UserDetail->photo
                                                    @endphp
                                              @endif
                                            <img src="{{asset('storage/app/public/data/'.$src) }}"
                                             class="img-responsive uplaod-photo"
                                             alt=""><br><br>

                                            <a href="{{asset('storage/app/public/data/'.$user->UserDetail->resume) }}" class="btn btn-info btn-sm" download="download" style="color:#fff;font-size:11px;font-weight:bold">Download Resume (doc / pdf / Reference Doc)</a>


                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Education<span>*</span></p>
                                        <input type="text" placeholder="MS (Space Systems)" name="education" value="{{ $user->UserDetail->education }}">
                                    </div>
                                    <div class="checkout__input">
                                        <p>About Me:<span>*</span></p>
                                        <textarea id="txtid" name="about">{{ $user->UserDetail->about }}</textarea>
                                    </div>
                                    <div class="checkout__input">
                                        <p>Research / Business Interest<span>*</span></p>
                                        <textarea id="txtid" name="business_intrest">{{ $user->UserDetail->business_intrest }}</textarea>
                                    </div>
                                    <div class="checkout__input">
                                        <p>Others<span>*</span></p>
                                        <textarea id="txtid" name="others">{{ $user->UserDetail->others }}</textarea>
                                    </div>
                                    <div class="checkout__input">
                                        <p>Update Resume  (doc / pdf / Reference Doc)<span></span></p>
                                        <input type="file" name="resume" class="form-control"/>
                                    </div>
                                    <div class="checkout__input">
                                        <p>Update Photo <span></span></p>
                                        <input type="file" name="photo" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <button type="submit" class="site-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
