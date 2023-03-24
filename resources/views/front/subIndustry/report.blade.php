@extends('layout.master')
@section('title', 'All Reports')
@section('customStyle')

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
                            <a href="{{ route('sub.industry.template', $subindustry->industry->id) }}">
                                {{ $subindustry->industry->industryType }} </a> /
                            <span> {{ $subindustry->subindustry }} </span>
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
                        <h2 class="artl-heading"> {{ $subindustry->subindustry }} </h2>
                        <div class="clear row marginbtm30">
                            <div class="col-sm-9 col-md-9 hidden-xs catg-icon-img">
                                <img class="img-responsive catg-icon"
                                    src="{{ asset('storage/data/' . $subindustry->banner) }}" alt="">
                                <h4 class="indus-title"> {{ $subindustry->subindustry }} </h4>
                                <p class="discr-text"> {{ $subindustry->description }} </p>
                                <p class="margintp15"><a class="read-info" href="#">Read for More Information</a>
                                </p>
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
                        <div class=" ">
                            @if (Auth::user())
                                @if ($subindustry->category_price > 0)
                                    @php
                                        $orders = App\Models\Order::with('user')
                                            ->where('user_id', Auth::user()->id)
                                            ->get();
                                        $reportss = [];
                                        foreach ($orders as $order) {
                                            $orders_details = App\Models\OrderDetail::where('order_id', $order->id)->get();
                                            foreach ($orders_details as $order_detail) {
                                                $reportss[] = $order_detail->subindustry_id;
                                            }
                                        }
                                        
                                    @endphp
                                    @if (!in_array($subindustry->id, $reportss))
                                        <form method="post" action="{{ route('add.to.cart') }}">
                                            @csrf
                                            <input type="hidden" name="subindustry_id" value="{{ $subindustry->id }}">
                                            <input type="hidden" name="price"
                                                value="{{ $subindustry->category_price }}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="order_type" value="bulk">
                                            <ul class="nav nav-tabs" style="border-bottom: none">
                                                <li class="nav-item">
                                                    <button type="submit" class="btn btn-default btn-gold  "
                                                        title="Buy Now">
                                                        <i class="fa fa-shopping-cart fa-lg  " aria-hidden="true"></i>
                                                        Buy Category ${{ $subindustry->category_price }}
                                                    </button>
                                                </li>
                                            </ul>
                                        </form>
                                    @else
                                        <button disabled type="button" class="btn btn-default btn-gold margintp15"
                                            title="Already Purchased">
                                            <i class="fa fa-shopping-cart fa-lg marginrt" aria-hidden="true"></i>
                                            Already Purchased
                                        </button>
                                    @endif
                                    <br>
                                @endif
                            @else
                                <a href="{{ route('login') }}" disabled type="button" class="btn btn-default btn-gold"
                                    title="Login to Buy">
                                    <i class="fa fa-shopping-cart fa-lg  " aria-hidden="true"></i>
                                    Buy Now $ {{ $subindustry->category_price }}
                                </a>
                            @endif
                        </div>
                        <div class="product__details__tab">

                            <ul class="nav nav-tabs" role="tablist" id="myBtnContainer">
                                <li class="nav-item">
                                    <button class="nav-link clickbtnclass active checkfilter" data-filter="All">All</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link clickbtnclass" data-filter="Research">Research</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link clickbtnclass" data-filter="Projects">Projects</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link clickbtnclass" data-filter="Insights">Insights</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link clickbtnclass" data-filter="Team">Team</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link clickbtnclass" data-filter="Company">Companies</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link clickbtnclass" data-filter="Finance">Financial
                                        Markets</button>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" data-toggle="tab" href="#tabs-8" role="tab">Data &
                                        Statistics</a> --}}
                                    <button class="nav-link clickbtnclass" data-filter="Stats">Data &
                                        Statistics</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link clickbtnclass" data-filter="Media">Media</button>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" data-toggle="tab" href="#tabs-10" role="tab">Data Store</a> --}}
                                    <button class="nav-link clickbtnclass" data-filter="Data">Data Store</button>

                                </li>
                                <li class="nav-item">
                                    <button class="nav-link clickbtnclass" data-filter="Others">Others</button>
                                </li>
                            </ul>

                            {{-- <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Research</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Insights</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab">Team</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Companies</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Financial
                                        Markets</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-9" role="tab">Media</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-11" role="tab">Others</a>
                                </li>
                            </ul> --}}

                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    @if ($reports->count() > 0)
                                        @foreach ($reports as $report)
                                            <div class="product__details__tab__content filterDiv {{ $report->type }}">
                                                <div class="product__details__tab__content__item">
                                                    <div class="col-md-12 as-min">
                                                        <div class="col-sm-9 col-md-9 as-mi storeLog">
                                                            {{--  --}}
                                                            <h5> <a href="{{ route('report-details', $report->id) }}"
                                                                    data-report_id={{ $report->id }}>
                                                                    {{ $report->title }} </a></h5>
                                                            <p class="card-text">
                                                                @if ($report->overview)
                                                                    @php
                                                                        $data = substr($report->overview->overview, 0, 1520);
                                                                    @endphp

                                                                    {{ strip_tags($data) }}...
                                                                @endif
                                                            </p>
                                                        </div>

                                                        <div class="col-sm-3 col-md-3 hidden-xs as-mi1">
                                                            <img src="{{ asset('storage/data/reports/' . $report->photo) }}"
                                                                class="img-reponsive mining-img">
                                                        </div>
                                                    </div>
                                                    <div class="author-text">
                                                        <p><strong>Authors:</strong> {{ $report->author }} <strong>Publish
                                                                Date:</strong> {{ $report->created_at }}
                                                            <strong>Category:</strong>
                                                            {{ $report->subIndustry->subindustry }} <strong>Project
                                                                Type:</strong> {{ $report->project->projectType }}
                                                        </p>
                                                    </div>
                                                    <div class="tags">
                                                        <a href="#">Overview</a> <a href="#">Contents</a>
                                                        <a href="#">Project Code</a> <a href="#">Downloads</a>
                                                        <span class="share-links"> <a href="#"> Share</a> / <a
                                                                href="#">Follow</a> / <a
                                                                href="#">Recommends</a> / <a
                                                                href="#">Suggest</a></span>
                                                    </div>
                                                    <p class="report-block"></p>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="product__details__tab__content filterDiv Data">
                                            <div class="product__details__tab__content__item">
                                                <div class="col-md-12 as-min">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-primary my-3">
                                                                Data Store
                                                            </h5>
                                                        </div>
                                                        <div class="col-12">
                                                            {!! $subindustry->data_store !!}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="product__details__tab__content filterDiv Stats">
                                            <div class="product__details__tab__content__item">
                                                <div class="col-md-12 as-min">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-primary my-3">
                                                                Data Statistics
                                                            </h5>
                                                        </div>
                                                        <div class="col-12">
                                                            {!! $subindustry->data_stats !!}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="product__details__tab__content NoImage d-none">
                                            <div class="product__details__tab__content__item">
                                                <div class="col-md-12 as-min">
                                                    <img src="{{asset('no-record-found.png')}}" alt="">
                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <div class="author-text text-center">
                                            <br>
                                            <p class="text-danger">
                                                <strong> No reports against "{{ $subindustry->subindustry }}" </strong>

                                            </p>
                                        </div>
                                    @endif


                                    <hr class="indus-divider">
                                    <div class="our-exp-block">
                                        <h2 class="artl-heading">Our Expertise</h2>
                                        <div class="industry-client-logos">
                                            <div class="col-xs-8 col-sm4 col-md-8 our-exp">

                                                {!! $industryTemplate->content !!}
                                            </div>
                                            <div class="col-xs-4 col-sm4 col-md-4 our-exp">
                                                <img src="{{ asset('storage/data/reports/' . $industryTemplate->expert) }}"
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
                                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1"
                                                                href="#"><i class="fa fa-signal"></i> </a></h2>
                                                        <div class="m-b-5"><a class="pur-view-text solu-view-text"
                                                                href="#">Reports /
                                                                Product / Intelligence</a></div><i
                                                            class="fa fa ti-bar-chart widget-stat-icon"></i>
                                                        <div><a class="pur-view-text" href=""><span
                                                                    class="dash-read-btn">Visit</span></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-3 col-sm4 col-md-3 our-solu">
                                                <div class="ibox bg-warning1 color-white widget-stat">
                                                    <div class="ibox-body1">
                                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1"
                                                                href="#"><i class="fa fa-user-circle-o"></i> </a>
                                                        </h2>
                                                        <div class="m-b-5"><a class="pur-view-text solu-view-text"
                                                                href="#">Consulting
                                                                Services</a></div><i
                                                            class="fa fa ti-bar-chart widget-stat-icon"></i>
                                                        <div><a class="pur-view-text" href="my-orders.php"><span
                                                                    class="dash-read-btn">Contact Us</span></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-3 col-sm4 col-md-3 our-solu">
                                                <div class="ibox bg-info1 color-white widget-stat">
                                                    <div class="ibox-body1">
                                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1"
                                                                href="#"><i class="fa fa-database"></i> </a></h2>
                                                        <div class="m-b-5"><a class="pur-view-text solu-view-text"
                                                                href="#">Financial /
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
                                                        <h2 class="m-b-5 font-strong"><a class="pur-view-text1"
                                                                href="#"><i class="fa fa-search"></i> </a></h2>
                                                        <div class="m-b-5"><a class="pur-view-text solu-view-text"
                                                                href="#">Articles /
                                                                News</a></div><i
                                                            class="fa fa ti-bar-chart widget-stat-icon"></i>
                                                        <div><a class="pur-view-text" href="#"><span
                                                                    class="dash-read-btn">
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
                                                    <div id="client-logos"
                                                        class="owl-carousel text-center owl-loaded owl-drag">
                                                        <div class="owl-stage-outer">
                                                            <div class="owl-stage"
                                                                style="transform: translate3d(-1734px, 0px, 0px); transition: all 3s ease 0s; width: 4915px;">

                                                                @foreach ($clients as $client)
                                                                    <div class="owl-item cloned"
                                                                        style="width: 279.112px; margin-right: 10px;">
                                                                        <div class="item">
                                                                            <div class="client-inners">
                                                                                <img src="{{ asset('storage/data/clients/' . $client->logo) }}"
                                                                                    alt=""
                                                                                    title="{{ $client->title }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach



                                                            </div>
                                                        </div>
                                                        <div class="owl-nav disabled"><button type="button"
                                                                role="presentation" class="owl-prev"><span
                                                                    aria-label="Previous">‹</span></button><button
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
                                                        <span id="right-arrow"
                                                            class="nav-arrow-right fa fa-chevron-right"></span>
                                                        <span id="left-arrow"
                                                            class="nav-arrow-left fa fa-chevron-left "></span>
                                                        <ul id="testim-dots" class="dots">
                                                            @php $no = 0; @endphp
                                                            @foreach ($testimonials as $testimonialdot)
                                                                @if ($no == 1)
                                                                    <li class="dot active"></li>
                                                                @endif
                                                                <li class="dot"></li>
                                                            @endforeach

                                                        </ul>
                                                        <div id="testim-content" class="cont">
                                                            @php $no = 0; @endphp
                                                            @foreach ($testimonials as $testimonial)
                                                                @php $no++; @endphp
                                                                @if ($no == 1)
                                                                    <div class="active">
                                                                        <div class="img">
                                                                            <img src="{{ asset('storage/data/testimonial/' . $testimonial->icon) }}"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="h4"> {{ $testimonial->title }}
                                                                        </div>
                                                                        <p> {{ $testimonial->description }} </p>
                                                                    </div>
                                                                @else
                                                                    <div class="">
                                                                        <div class="img">
                                                                            <img src="{{ asset('storage/data/testimonial/' . $testimonial->icon) }}"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="h4">{{ $testimonial->title }}
                                                                        </div>
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
                                <div class="tab-pane" id="tabs-10" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-primary my-3">
                                                Data Store
                                            </h5>
                                        </div>
                                        <div class="col-12">
                                            {!! $subindustry->data_store !!}
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tabs-8" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-primary my-3">
                                                Data Statistics
                                            </h5>
                                        </div>
                                        <div class="col-12">
                                            {!! $subindustry->data_stats !!}
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

@section('customJs')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".storeLog a").click(function() {
                var report_id = $(this).data('report_id');
                @if (Auth::check())
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('store.log') }}",
                        data: {
                            report_id: report_id,
                        },
                        success: function(data) {
                            console.log(data);
                        }
                    });
                @endif
            });
        });
    </script>

    <script>
        filterSelection("All")

        $('.clickbtnclass').click(function() {
            var filter = $(this).data('filter');

            $('.clickbtnclass').removeClass('active');
            $(this).addClass('active');
            filterSelection(filter)

        })

        function filterSelection(c) {
            $(this).addClass('active');
            $('.NoImage').addClass('d-none');


            $('.filterDiv').addClass('d-none');
            if (c == 'All') {
                $('.filterDiv').removeClass('d-none');
            }
            var numItems = $('.' + c).length;

            if (numItems == 0) {
                $('.NoImage').removeClass('d-none');
            }

            $('.' + c).removeClass('d-none');
        }
    </script>
@endsection
