@extends('layout.master')
@section('title', 'About Us')
@section('customStyle')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container-fluid ab-banner1">
        <div class="ab-banner"
        style="background-image: url('{{asset('storage/app/public/data/'.$about->banner) }}')!important">
            <div class="about-bg">
                <div class="col-md-12 ab-banner-text">
                    <h2>
                        {{ $about->heading }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="ab-part-bg">
            <div class="ab-part">
                <div class="col-md-12 ab-heading">
                    <h2>    {{ $about->content_heading }} </h2>

                    <br>

                {!! $about->content !!}

                </div>
            </div>
        </div>
        @include('connectForm');
    </div>
</section>

@endsection

@section('customJs')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(".js-example-tags").select2({
            tags: true
        });
    </script>
@endsection
