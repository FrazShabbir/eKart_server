@extends('layout.master')
@section('title', 'Home')
@section('customStyle')
<style>
    .work-progress {
        background-color: lightcyan;
        color: #000;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .toast-body {
        padding: 4px;
        color: #000;
    }

    .toast-header {
        padding: 5px;
        color: #000;
    }

    .alert.alert-warning.proje-pro-bg {
        height: 430px;
    }

    .project-heading {
        text-align: center !important;
        font-weight: 800;
        color: #fff;
        margin-bottom: 7px;
        font-size: 20px;
        background-color: black;
        padding: 7px;
    }
    .skills-block  button{
            padding: 5px 20px 5px 20px;
            border: 1px solid #adadad;
            border-radius: 20px;
            width: 40%;
            color: #3078bf;
            font-weight: 700;
            margin-right: 10px;
            transition: 0.5s;
            background-color: #fff;
    }
</style>
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
                        <h6 class="checkout__title">My Account Details</h6>
                        <div class="row">
                            <div class="col-lg-3 my-profile-block">
                                <div class="checkout__input my-profile">
                                    @if( $user->UserDetail)
                                    @php
                                         $src = $user->UserDetail->photo
                                    @endphp
                                    @else
                                    @php
                                        $src = ''
                                    @endphp
                                    @endif
                                    <img src="{{asset('storage/data/'.$src) }}"
                                        class="img-responsive uplaod-photo1 img-thumbnail" alt=""><br><br>
                                    <h2 class="person-name"> {{ $user->name }} </h2>

                                    <p> {{ Str::ucfirst($user->role)  }} </p>
                                </div>
                                <div class="skills-block text-center" >

                                    <button style="text-align:center;width:100%">
                                        <a href="{{asset('storage/data/'.$user->UserDetail->resume) }}"  download="download">
                                            Download
                                        </a>
                                    </button>

                                    {{-- <button>
                                        <a href="{{asset('storage/data/'.$user->attachment) }}"  download="download">
                                            Work
                                        </a>
                                    </button> --}}
                                </div>
                            </div>
                            <div class="col-lg-9 my-profile-block1">
                                @if($user->userDetail )
                                    @if($user->userDetail->about != null)
                                        <div class="col-lg-12 information-4">
                                            <p class="institue-text">About Me <br>
                                            <span class="institue-text1">
                                                @if($user->userDetail )
                                                    {{ $user->userDetail->about}}
                                                @endif
                                            </span>
                                            </p>
                                        </div>
                                    @endif
                                @endif
                                <div class="person-information">
                                    @if($user->userDetail )
                                        @if($user->userDetail->company != null )
                                            <div class="col-lg-6 information-1">
                                                <p class="institue-text">Company / Institute Name <br><span
                                                        class="institue-text1">
                                                        @if($user->userDetail )
                                                        {{ $user->userDetail->company}}
                                                        @endif
                                                    </span></p>
                                            </div>
                                        @endif
                                    @endif
                                    @if($user->userDetail )
                                        @if($user->userDetail->education != null )
                                            <div class="col-lg-6 information-2">
                                                <p class="institue-text">Education <br><span class="institue-text1">
                                                    @if($user->userDetail )
                                                    {{ $user->userDetail->education}}
                                                    @endif
                                                    </span></p>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <div class="person-information1">
                                    @if($user->userDetail )
                                        @if($user->userDetail->business_intrest != null )
                                            <div class="col-lg-12 information-3">
                                                <p class="institue-text">Research / Business Interest <br>
                                                    <span  class="institue-text1">
                                                        @if($user->userDetail )
                                                            {{ $user->userDetail->business_intrest}}
                                                        @endif
                                                    </span></p>
                                            </div>
                                        @endif
                                    @endif
                                    @if($user->userDetail )
                                        @if($user->userDetail->others != null )
                                            <div class="col-lg-12 information-4">
                                                <p class="institue-text">Others <br><span class="institue-text1">  
                                                    @if($user->userDetail )
                                                    {{ $user->userDetail->others}} 
                                                    @endif
                                                </span></p>
                                            </div>
                                        @endif
                                    @endif
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
