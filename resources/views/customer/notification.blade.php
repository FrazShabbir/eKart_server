@extends('layout.master')
@section('title', 'Notification')
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
                        <h6 class="checkout__title">Notifications Details</h6>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="noti-text">Choose which way to communicate with us, if you wish to receive Email / Calls.</p><br><br>
                                <div class="switch-btn">
                                    <p class="switch-btn1">Contact via Email :</p>
                                    <p><label class="onoffbtn"><input type="checkbox"></label></p>
                                </div>
                                <div class="switch-btn">
                                    <p class="switch-btn1">Contact via Mobile :</p>
                                    <p><label class="onoffbtn"><input type="checkbox"></label></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</section>
@endsection
