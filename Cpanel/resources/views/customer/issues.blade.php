@extends('layout.master')
@section('title', 'Reports Issue')
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
                        <a href="{{ route('homePage') }}">My Orders</a> /
                        <a href="{{ route('homePage') }}">Order Detail</a> /
                        <span>Issues</span>
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

            <div class="col-lg-7 content-wrap content-reponsive">
                <div class="content-main pdbtm-none">
                    <h6 class="checkout__title"> Issues    </h6>
                    <div class="ibox invoice" style="width:100%;">
                        <div class="ibox">
                            <div class="ibox-body">
                                <ul class="media-list">
                                    @foreach ($issues as $issue )
                                        <li class="media">
                                            <a class="media-img" href="javascript:;">
                                                <img src="{{asset('public/backEnd/assets/img/admin-avatar.png')}}" class="img-circle" style="width:25px;"  >
                                            </a>
                                            <div class="media-body ">
                                                <h6 class="media-heading " style="padding-left:10px;"> {{ $issue->report->title  }}  <small class="text-danger"> {{ $issue->created_at->diffForhumans()}} </small> </h6>
                                                <p style="padding-left:10px;"> {{ $issue->question }} </p>
                                            </div>
                                        </li>
                                        @if($issue->answer != '')
                                            <li class="media media-right">
                                                <div class="media-body text-right">
                                                    <h6 class="media-heading" style="padding-right:10px;">   {{ $issue->report->title }} </h6>
                                                    <p style="padding-right:10px;">  {{ $issue->answer }} </p>
                                                </div>
                                                <a class="media-img" href="javascript:;">
                                                    <img src="{{asset('public/backEnd/assets/img/admin-avatar.png')}}" class="img-circle" style="width:25px;"  >
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 content-wrap content-reponsive">
                <div class="content-main pdbtm-none">
                    <div class=" edit-block">
                        <div class="ibox">
                            <div class="ibox-head">
                                <h6 class="checkout__title"> Create Issues  </h6>
                            </div>
                            <div class="ibox-body">
                                <form method="post" action="{{ route('customer.report.issue.create') }}">
                                    @csrf
                                    <input type="hidden" name="report_id" id="" value="{{ $id }}">
                                    <div class="form-group">
                                        <label>Description*</label>
                                        <textarea class="form-control"  placeholder="Enter your issue" required style="height: 100px" name="question"></textarea>
                                    </div>
                                    <button class="btn btn-info btn-sm" type="submit"> Submit </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
