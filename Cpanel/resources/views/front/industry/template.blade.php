@extends('layout.master')
@section('title', 'Industry Template')
@section('customStyle')
    <style>
        .logo-title a:hover{
            color:#000;
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
                        <span>Industry Template</span>
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
                    <h2 class="artl-heading indu-heading">Industry</h2>
                    <div class="clear row marginbtm30">
                        <div class="col-sm-9 col-md-9 hidden-xs catg-icon-img">
                            <img class="img-responsive catg-icon"  src="{{asset('storage/app/public/data/reports/'.$industryTemplate->banner) }}" alt="">
                            <br><br>
                            {!! $industryTemplate->description !!}

                        </div>
                        <div class="col-xs-3 col-sm4 col-md-3 pdltrt-xs-none">
                            <div class="view-more-block">
                                <h5 class="view-text">View More</h5>
                                <ul class="art-links">
                                    <li><a href="#">Report / Intelligence Data</a></li>
                                    <li><a href="#">Articles</a></li>
                                    <li><a href="#">Upcomming Research</a></li>
                                    <li><a href="#">Working Papers</a></li>
                                    <li><a href="#">Financial Markets</a></li>
                                </ul>
                            </div>
                            <div class="view-more-block view-box-2">
                                <ul class="art-links">
                                    <li><a href="#">Request for a Demo</a></li>
                                    <li><a href="register.php">Register for Free</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr class="indus-divider">

                    <div class="indu-client-block">
                        <h2 class="artl-heading">Our Industries</h2>
                        <div class="industry-client-logos">
                            @foreach ($industries as $industry )
                            <div class="col-xs-3 col-sm4 col-md-3 indu-clogos">

                                <img src="{{asset('storage/app/public/data/industry/'.$industry->imageIcon) }}"
                                class="img-responsive dummy-logo" alt="" >
                                <p class="logo-title"> <a href="{{ route('sub.industry.template',$industry->id)}}">  {{ $industry->industryType}} </a> </p>

                                {{-- <p class="logo-title"> <a href="{{ route('sub.industry.template',$industry->id)}}">  {{ $industry->industryType}} </a> </p> --}}


                            </div>
                            @endforeach

                        </div>


                    </div>
                    <hr class="indus-divider">
                    <div class="our-exp-block">
                        <h2 class="artl-heading">Our Expertise</h2>
                        <div class="industry-client-logos">
                            <div class="col-xs-8 col-sm4 col-md-8 our-exp">

                                {!! $industryTemplate->content !!}
                            </div>
                            <div class="col-xs-4 col-sm4 col-md-4 our-exp">
                                <img src="{{asset('storage/app/public/data/reports/'.$industryTemplate->expert) }}"
                                    class="img-reponsive mining-img">
                            </div>
                        </div>
                    </div>
                    <hr class="indus-divider">

                    <div class="our-solution-block">
                        <h2 class="artl-heading">Our Solutions</h2>
                        {!! $industryTemplate->solution !!}
                        <div class="industry-client-logos">
                            <div class="col-xs-3 col-sm4 col-md-3 our-solu">
                                <div class="ibox bg-success1 color-white widget-stat">
                                    <div class="ibox-body1">
                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1" href="#"><i
                                                    class="fa fa-signal"></i> </a></h2>
                                        <div class="m-b-5"><a class="pur-view-text solu-view-text" href="#">Reports /
                                                Product / Intelligence</a></div><i
                                            class="fa fa ti-bar-chart widget-stat-icon"></i>
                                        <div><a class="pur-view-text" href="my-orders.php"><span
                                                    class="dash-read-btn">Visit</span></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm4 col-md-3 our-solu">
                                <div class="ibox bg-warning1 color-white widget-stat">
                                    <div class="ibox-body1">
                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1" href="#"><i
                                                    class="fa fa-user-circle-o"></i> </a></h2>
                                        <div class="m-b-5"><a class="pur-view-text solu-view-text" href="#">Consulting
                                                Services</a></div><i class="fa fa ti-bar-chart widget-stat-icon"></i>
                                        <div><a class="pur-view-text" href="my-orders.php"><span
                                                    class="dash-read-btn">Contact Us</span></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm4 col-md-3 our-solu">
                                <div class="ibox bg-info1 color-white widget-stat">
                                    <div class="ibox-body1">
                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1" href="#"><i
                                                    class="fa fa-database"></i> </a></h2>
                                        <div class="m-b-5"><a class="pur-view-text solu-view-text" href="#">Financial /
                                                Company Analysis</a></div><i
                                            class="fa fa ti-bar-chart widget-stat-icon"></i>
                                        <div><a class="pur-view-text" href="#"><span
                                                    class="dash-read-btn">Visit</span></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm4 col-md-3 our-solu">
                                <div class="ibox bg-danger1 color-white widget-stat">
                                    <div class="ibox-body1">
                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1" href="#"><i
                                                    class="fa fa-search"></i> </a></h2>
                                        <div class="m-b-5"><a class="pur-view-text solu-view-text" href="#">Articles /
                                                News</a></div><i class="fa fa ti-bar-chart widget-stat-icon"></i>
                                        <div><a class="pur-view-text" href="#"><span class="dash-read-btn">
                                                    Visit</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="indus-divider">

                    <div class="our-clnts-block">
                        <h2 class="artl-heading">Our Clients</h2>
                        <div class="industry-client-logos">
                            <div class="col-xs-12 col-sm4 col-md-12 our-clnts1">
                                <div class="cover-wrapper">
                                    <div id="client-logos" class="owl-carousel text-center owl-loaded owl-drag">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                style="transform: translate3d(-1734px, 0px, 0px); transition: all 3s ease 0s; width: 4915px;">

                                                @foreach ($clients as $client )
                                                    <div class="owl-item cloned"
                                                    style="width: 279.112px; margin-right: 10px;">
                                                    <div class="item">
                                                        <div class="client-inners">
                                                            <img src="{{asset('storage/app/public/data/clients/'.$client->logo) }}"
                                                                alt="" title="{{ $client->title }}">
                                                        </div>
                                                    </div>
                                                    </div>
                                                @endforeach



                                            </div>
                                        </div>
                                        <div class="owl-nav disabled"><button type="button" role="presentation"
                                                class="owl-prev"><span aria-label="Previous">‹</span></button><button
                                                type="button" role="presentation" class="owl-next"><span
                                                    aria-label="Next">›</span></button></div>
                                        <div class="owl-dots disabled"><button role="button"
                                                class="owl-dot active"><span></span></button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="indus-divider">

                    <div class="our-testimoni-block">
                        <h2 class="artl-heading">Customer Testimonials</h2>
                        <div class="industry-client-logos">
                            <div class="col-xs-12 col-sm4 col-md-12 testimoni">
                                <div id="testim" class="testim">
                                    <div class="wrap">
                                        <span id="right-arrow" class="nav-arrow-right fa fa-chevron-right"></span>
                                        <span id="left-arrow" class="nav-arrow-left fa fa-chevron-left "></span>
                                        <ul id="testim-dots" class="dots">
                                                @php $no = 0; @endphp
                                                @foreach($testimonials as $testimonialdot)


                                                        @if($no == 1)
                                                            <li class="dot active"></li>
                                                        @endif
                                                        <li class="dot"></li>


                                                @endforeach

                                        </ul>
                                        <div id="testim-content" class="cont">
                                            @php $no = 0; @endphp
                                            @foreach($testimonials as $testimonial)
                                                @php $no++; @endphp
                                                @if($no == 1)
                                                    <div class="active">
                                                        <div class="img">
                                                            <img src="{{asset('storage/app/public/data/testimonial/'.$testimonial->icon) }}" alt=""></div>
                                                        <div class="h4"> {{ $testimonial->title }} </div>
                                                        <p> {{ $testimonial->description }} </p>
                                                    </div>
                                                @else
                                                <div class="">
                                                    <div class="img">
                                                        <img src="{{asset('storage/app/public/data/testimonial/'.$testimonial->icon) }}" alt=""></div>
                                                    <div class="h4">{{ $testimonial->title }}</div>
                                                    <p> {{ $testimonial->description }} </p>
                                                </div>
                                                @endif

                                            @endforeach

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
