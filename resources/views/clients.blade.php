@extends('layout.master')
@section('title', 'Our Clients')
@section('customStyle')
    <style>
        .contact__form input{
            margin-bottom: 10px!important;
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
                        <span> Our Clients </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container-fluid ab-banner1">
        <div class="ab-banner"
        style="background-image: url('{{asset('storage/app/public/data/'.$client->banner) }}')!important">
            <div class="about-bg">
                <div class="col-md-12 ab-banner-text">
                    <h2>
                        {{ $client->heading }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="ab-part-bg">
            <div class="ab-part">
                <div class="col-md-12 ab-heading">
                    <h2>    {{ $client->content_heading }} </h2>

                    <br>

                {!! $client->content !!}

                </div>
            </div>
        </div>
        @include('connectForm');
    </div>
</section>

@endsection
