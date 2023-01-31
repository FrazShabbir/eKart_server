@extends('layout.admin_master')
@section('title', 'Profile')

@section('content')

    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title"> My Profile</h1>
        </div>

        <div class="page-content fade-in-up" style="min-height:750px;!important">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="ibox">
                        <div class="ibox-body text-center">
                            <div class="m-t-20">
                                <img class="img-circle" src="{{ asset('public/backEnd/assets/img/admin-avatar.png') }}">
                            </div>
                            <h5 class="font-strong m-b-10 m-t-10">  {{  Auth::User()->name}} </h5>


                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="ibox">
                        <div class="ibox-body">
                            <ul class="nav nav-tabs tabs-line">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-settings"></i> Profile Update</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#tab-2" data-toggle="tab"><i class=" ti-bell"></i> Notification</a>
                                </li>


                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="tab-1">
                                    <form action="{{ route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label>First Name</label>
                                                <input class="form-control" type="text" placeholder="First Name" value="{{  Auth::User()->name  }}" name="name">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" placeholder="Email address" value="{{  Auth::User()->email  }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" placeholder="Password" name="password">
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-default" type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade show " id="tab-2">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="noti-text">Choose which way to communicate with us, if you wish to receive Email / Calls.</p><br><br>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="switch-btn col-lg-6">
                                                    <p class="switch-btn1">Contact via Email :</p>

                                                </div>

                                                <div class="switch-btn col-lg-6">

                                                    <p><label class="onoffbtn"><input type="checkbox"></label></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="switch-btn col-lg-6">
                                                    <p class="switch-btn1">Contact via Mobile :</p>

                                                </div>

                                                <div class="switch-btn col-lg-6">

                                                    <p><label class="onoffbtn"><input type="checkbox"></label></p>
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
            <style>
                .profile-social a {
                    font-size: 16px;
                    margin: 0 10px;
                    color: #999;
                }

                .profile-social a:hover {
                    color: #485b6f;
                }

                .profile-stat-count {
                    font-size: 22px
                }
            </style>

        </div>
    </div>


@endsection
