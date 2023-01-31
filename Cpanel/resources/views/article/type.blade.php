@extends('layout.master')
@section('title', 'All By Type')
@section('customStyle')
    <style>
        .logo-title a:hover {
            color: #000;
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
                            <span> Trade News </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <section class="shop spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 content-wrap content-reponsive">
                    <div class="content-main pdbtm-none">
                        <h2 class="artl-heading">Trade News</h2>
                        <div class="clear row marginbtm30">
                            <div class="col-sm-9 col-md-9 hidden-xs catg-icon-img">
                                <img class="img-responsive catg-icon" src="{{ asset('public/frontEnd/img/banner-1.jpg')}}" alt=""><br><br>
                                <p class="discr-text">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text ever...</p>
                            </div>
                            <div class="col-xs-3 col-sm4 col-md-3 pdltrt-xs-none">
                                <div class="view-more-block">
                                    <h5 class="view-text">View More</h5>
                                    <ul class="art-links">
                                        <li><a href="#">Technical Articles</a></li>
                                        <li><a href="#">Market Forecasts</a></li>
                                        <li><a href="#">Upcomming Research</a></li>
                                        <li><a href="#">Working Papers</a></li>
                                        <li><a href="#">Industry Insights</a></li>
                                    </ul>
                                </div>
                                <div class="view-more-block view-box-2">
                                    <h5 class="view-text">My Account</h5>
                                    <ul class="art-links">
                                        <li><a href="login.php">Login Now</a></li>
                                        <li><a href="register.php">Register Now</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            @foreach ($articles as $article)
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="blog__item">
                                        <div class="blog__item__pic set-bg"
                                            data-setbg="{{ asset('storage/app/public/data/reports/' . $article->photo) }}">
                                        </div>
                                        <div class="blog__item__text">
                                            <span>
                                                <img src="{{ asset('public/frontEnd/img/calendar.png') }}" alt="">
                                                {{ \Carbon\Carbon::parse($article->created_at)->format('D-m-Y') }}
                                            </span>
                                            <h5> {{ $article->title }} </h5>
                                            <a href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
