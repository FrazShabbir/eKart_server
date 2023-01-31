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
                        <h6 class="checkout__title">Dashboard</h6>
                        <div class="alert alert-info">Your Profile is incomplete, Please <a class="alert-link"
                                href="{{ route('customer.profile.edit') }}">Click here</a> and complete your profile.
                        </div>
                        <p class="my-acc-text">Hello byreddy consulting (not byreddy consulting? <a href="#">Log
                                out</a>)
                        </p>
                        <p class="my-acc-text1">From your account dashboard you can view your <a href="my-orders.php">recent
                                orders</a>, and <a href="edit-profile.php">edit your profile and account details.</a></p>

                        <div class="col-md-12 dash-part">
                            <div class="col-lg-4 col-md-4 col-sm-4 dash-brd-part">
                                <div class="ibox bg-success1 color-white widget-stat">
                                    <div class="ibox-body1">
                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1" href="#"><i
                                                    class="fa fa-signal"></i> </a></h2>
                                        <div class="m-b-5"><a class="pur-view-text" href="#">Purchased Reports</a>
                                        </div><i class="fa fa ti-bar-chart widget-stat-icon"></i>
                                        <div><a class="pur-view-text" href="my-orders.php"><span class="dash-read-btn">View
                                                    All Reports</span></a></div>
                                    </div>
                                </div>
                                <div class="ibox bg-warning1 color-white widget-stat">
                                    <div class="ibox-body1">
                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1" href="#"><i
                                                    class="fa fa-cogs"></i> </a></h2>
                                        <div class="m-b-5"><a class="pur-view-text" href="add-work.php">Your Work</a></div>
                                        <i class="fa fa ti-bar-chart widget-stat-icon"></i>
                                        <div><a class="pur-view-text" href="add-work.php"><i
                                                    class="fa fa-level-up m-r-5"></i><small>Article / News / Reports /
                                                    etc.</small></a></div>
                                        <div><a class="pur-view-text" href="add-work.php"><span class="dash-read-btn"> <i
                                                        class="fa fa-plus-circle"></i> Add Work</span></a></div>
                                    </div>
                                </div>

                                <div class="alert alert-info dash-cont-bg">Contact us, if you wish to update or change your
                                    work.
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 dash-brd-part1">
                                <div class="ibox bg-info1 color-white widget-stat">
                                    <div class="ibox-body1">
                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1" href="#"><i
                                                    class="fa fa-user-circle-o"></i> </a></h2>
                                        <div class="m-b-5"><a class="pur-view-text" href="#">Our Consulting
                                                Expertise</a>
                                        </div><i class="fa fa ti-bar-chart widget-stat-icon"></i>
                                        <div><a class="pur-view-text" href="#"><span class="dash-read-btn">Read
                                                    More</span></a></div>
                                    </div>
                                </div>
                                <div class="ibox bg-danger1 color-white widget-stat">
                                    <div class="ibox-body1">
                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1" href="#"><i
                                                    class="fa fa-search"></i> </a></h2>
                                        <div class="m-b-5"><a class="pur-view-text" href="#">Search Our Database
                                                Write
                                                Your</a></div><i class="fa fa ti-bar-chart widget-stat-icon"></i>
                                        <div><a class="pur-view-text" href="#"><i
                                                    class="fa fa-level-up m-r-5"></i><small>Own News / Articles.</small></a>
                                        </div>
                                        <div><a class="pur-view-text" href="#"><span class="dash-read-btn"> Read
                                                    More</span></a></div>
                                    </div>
                                </div>

                                <div class="alert alert-info dash-cont-bg1">Which showcases your expertise and monetize.

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 dash-brd-part1">
                                <div class="alert alert-warning proje-pro-bg">
                                    <div class="project-heading">PROJECT PROGRESS</div>

                                    @foreach ($progress as $progressing)
                                        <div class="work-progress">
                                            <div class="toast-header">
                                                <strong> {{ $progressing->report->title }} - <small>
                                                        {{ $progressing->created_at->diffForHumans() }} </small></strong>
                                            </div>
                                            <div class="toast-body">
                                                {{ $progressing->comment }}
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 read-the-industry-part">
                            <div class="row">
                                <div class="tile dash-slider" id="tile-1">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified" role="tablist">
                                        <div class="slider"></div>
                                        <li class="nav-item tabslider">
                                            <a class="nav-link active" id="news-tab" data-toggle="tab" href="#news"
                                                role="tab" aria-controls="home" aria-selected="true"> News</a>
                                        </li>
                                        <li class="nav-item tabslider">
                                            <a class="nav-link" id="insights-tab" data-toggle="tab" href="#insights"
                                                role="tab" aria-controls="profile" aria-selected="false">
                                                Insights</a>
                                        </li>
                                        <li class="nav-item tabslider">
                                            <a class="nav-link" id="markets-tab" data-toggle="tab" href="#markets"
                                                role="tab" aria-controls="contact" aria-selected="false"> Markets</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="news" role="tabpanel"
                                            aria-labelledby="news-tab">
                                            <div class="blog_content">
                                                <div class="owl-carousel owl-theme">
                                                    @foreach ($news as $new)
                                                        <div class="blog_item">
                                                            <div class="blog_image">
                                                                <img class="img-responsive img-fluid"
                                                                    src="{{ asset('storage/app/public/data/reports/' . $new->photo) }}"
                                                                    alt="images">
                                                            </div>
                                                            <div class="blog_details">
                                                                <div class="blog_title">
                                                                    <h5><a href="#"> {{ $new->title }}</a></h5>
                                                                </div>
                                                                <p class="news-text">
                                                                    <a href="#" style="color:#000">
                                                                        {!! Str::limit($new->description, 40) !!}
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="tags pull-right tab-btmbutn">
                                                <a href="#">View More</a>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="insights" role="tabpanel"
                                            aria-labelledby="insights-tab">
                                            <div class="blog_content">
                                                <div class="owl-carousel owl-theme">
                                                    @foreach ($insights as $insight)
                                                        <div class="blog_item">
                                                            <div class="blog_image">
                                                                <img class="img-responsive img-fluid"
                                                                    src="{{ asset('storage/app/public/data/reports/' . $insight->photo) }}"
                                                                    alt="images">
                                                            </div>
                                                            <div class="blog_details">
                                                                <div class="blog_title">
                                                                    <h5><a href="#"> {{ $insight->title }}</a></h5>
                                                                </div>
                                                                <p class="news-text">
                                                                    <a href="#" style="color:#000">
                                                                        {!! Str::limit($insight->description, 40) !!}
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="tags pull-right tab-btmbutn">
                                                <a href="#">View More</a>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="markets" role="tabpanel"
                                            aria-labelledby="markets-tab">
                                            <div class="blog_content">
                                                <div class="owl-carousel owl-theme">
                                                    @foreach ($markets as $market)
                                                        <div class="blog_item">
                                                            <div class="blog_image">
                                                                <img class="img-responsive img-fluid"
                                                                    src="{{ asset('storage/app/public/data/reports/' . $market->photo) }}"
                                                                    alt="images">
                                                            </div>
                                                            <div class="blog_details">
                                                                <div class="blog_title">
                                                                    <h5><a href="#"> {{ $market->title }}</a></h5>
                                                                </div>
                                                                <p class="news-text">
                                                                    <a href="#" style="color:#000">
                                                                        {!! Str::limit($market->description, 40) !!}
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="tags pull-right tab-btmbutn">
                                                <a href="#">View More</a>
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
    </section>
@endsection
