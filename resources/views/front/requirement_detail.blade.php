<!DOCTYPE html>
<html lang="zxx">

<head>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/mobile-responsive.css') }}" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/app/public/data/' . $option->faveIcon) }}">

</head>

<body>
    {{-- <div class="float-container">
        <a href="{{ route('requirements') }}">Requirements</a>

    </div> --}}
    <a href="{{ route('requirements')}}" class="btn btn-danger right_btn" ><b>View Requirements</b></a>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#"><img src="img/add.png" class="img-responsive mobile-cart-icon" alt=""></a>
            <a href="register.php"><img src="img/user-1.png" class="img-responsive mobile-cart-icon1"
                    alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        @if ($option->getFirstMediaUrl('company_logo', 'thumb') != '')
                            <img src="{{ $option->getFirstMediaUrl('company_logo', 'thumb') }}" alt="">
                        @else
                            <img src="https://rebank.cc/wp-content/uploads/2019/04/dummylogo-300x107@2x.jpg"
                                alt="">
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <form action="" method="get" class="modal-content modal-body border-0 p-0">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="inputModalSearch" name="q"
                                placeholder="Search ...">
                            <button type="submit" class="input-group-text bg-success text-light">
                                <i class="fa fa-fw fa-search text-white"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="header__nav__option">

                        <a href="{{ route('cart.index') }}">
                            @if (Cart::count() > 0)
                                <sup style="font-size:10px;color:#000"> {{ Cart::count() }}</sup>
                            @endif
                            <img src="{{ asset('frontEnd/img/add.png') }}" class="img-responsive account-iocn"
                                alt="">
                        </a>
                        @if (Auth::user())
                            <a href="{{ route('customer.dashboard') }}">

                                <img src="{{ asset('frontEnd/img/dashbaord.png') }}"class="img-responsive account-iocn1"
                                    alt="">
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                <img src="{{ asset('frontEnd/img/user-1.png') }}"class="img-responsive account-iocn1"
                                    alt="">
                            </a>
                        @endif




                        <a href="#" class="search-switch"><img src="{{ asset('frontEnd/img/bar-icon-1.png') }}"
                                alt=""></a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br>
                    <div class="breadcrumb__text">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    {{-- @php
    dd($report);
@endphp --}}
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 rt-wrap1">
                    <div class="hidden-xs catg-icon-img">
                        <img class="img-responsive single-img"
                            src="{{ asset($requirement->photo) }}"
                            alt="{{ $requirement->project->projectType }}">

                        <div class="hidden-xs hidden-sm rpt-pg-cta">


                            <ul style="list-style: none;text-align:left">
                                <li>
                                    <b> Project:</b> {{ $requirement->project->projectType }}
                                </li>
                                <li>
                                    <b>Service:</b> {{ $requirement->service->serviceType }}
                                </li>
                                <li>
                                    <b>Industry:</b> {{ $requirement->industry->industryType }}
                                </li>
                                <li>
                                    <b>Sub Industry: </b>{{ $requirement->subIndustry->subindustry }}
                                </li>
                                <li>
                                    <b>Region:</b> {{ $requirement->region->region }}
                                </li>
                                <li>
                                    <b>Country:</b> {{ $requirement->country->country }}
                                </li>

                            </ul>

                            <div>
                                @if (Auth::user())
                                    @php
                                        $applied = App\Models\ApplyRequirement::where('user_id', Auth::user()->id)
                                            ->where('requirement_id', $requirement->id)
                                            ->first();
                                        
                                    @endphp

                                    @if ($applied)
                                        <div class="mt-4">

                                            <button type="button" disabled class="btn btn-block btn-info"
                                                title="Already Applied"> Applied </button>
                                        </div>
                                    @else
                                        <div class="mt-4">
                                            <button type="button" class="btn btn-block btn-info applyNow"
                                                data-requirment_id="{{ $requirement->id }}">
                                                Apply Now
                                            </button>
                                        </div>
                                    @endif
                                @else
                                    <div class="mt-4">
                                        <button type="button" disabled class="btn btn-block btn-info"
                                            title="Login In to Apply"> Login to Apply </button>
                                    </div>
                                @endif
                            </div>










                        </div>

                    </div>
                </div>
                <div class="col-lg-10 content-wrap content-reponsive">
                    <div class="content-main pdbtm-none">
                        <div class="clear row marginbtm30">
                            <div class="col-xs-7 col-sm-7 col-md-7 pdltrt-xs-none">
                                <div class="report-detail-heading">
                                    <h1> {{ $requirement->title ?? $requirement->project->projectType }}</h1>
                                </div>
                                <div class="author-text">
                                    {{-- <p><strong>Authors :</strong> {{ $requirement->author }} <strong>Publish Date
                                            :</strong> {{ $report->created_at }}, <strong>Type :</strong>
                                        {{ $report->project->projectType }} </p> --}}
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5 col-md-5 pdltrt-xs-none">
                                <div class="tags">
                                    <span class="share-links"> <a href="#"> Share</a> / <a
                                            href="#">Follow</a> / <a href="#">Recommends</a> / <a
                                            href="#">Suggest</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">
                                        Report Overview
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="clear row marginbtm30">
                                            <div class="col-xs-12 col-sm-12 col-md-12 pdltrt-xs-none single-box">

                                                @if ($requirement->description)
                                                    {!! $requirement->description !!}
                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <br>


                    </div>
                </div>
            </div><br><br>

            <!-- Table Of Content Block Start Here -->

            <!-- Table Of Content Block End Here -->
        </div>
    </section>
    <!-- Shop Section End -->



    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="footer__widget">
                        <h6>New Initiatives</h6>
                        <ul>
                            <li><a href="#">News Room</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="footer__widget">
                        <h6>Analytics</h6>
                        <div class="Anal-text">
                            <p>
                                {{ $logo->footerContent }}

                                <br><br><span class="readmore-butn"> <a href="#"> Read More</a></span>
                            </p>

                            <div class="hero__social1">
                                <a href="http://www.facebook.com/{{ $option->fb }}" target="_blank"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="http://www.twitter.com/{{ $option->twitter }}" target="_blank"><i
                                        class="fa fa-twitter"></i></a>
                                <a href="http://www.pinterest.com/{{ $option->pinterest }}" target="_blank"><i
                                        class="fa fa-pinterest"></i></a>
                                <a href="http://www.instagram.com/{{ $option->insta }}" target="_blank"><i
                                        class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <div class="col-md-5 copytext1">
                            <p class="text-left text-light copyr-text">
                                <span class="terms-links">
                                    <a href="{{ route('termsConditions') }}">Terms &amp; Conditions</a> |
                                    <a href="{{ route('privacy') }}">Privacy</a> |
                                    <a href="{{ route('disclaimer') }}">Disclaimer</a> |
                                    <a href="{{ route('legal') }}">Legal</a> |
                                    <a href="{{ route('accessibilitys') }}">Accessibilitys</a>
                                </span>
                            </p>
                        </div>
                        <div class="col-md-7 copytext">
                            <p>{{ $option->cr }}. Website Developed by: <a href="https://www.webneeds.in"
                                    target="_blank">Webneeds.in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 navbar-menu">
                        <div class="col-md-3 about-links">
                            <h4 class="menu-title">About Us</h4>
                            <ul class="menu-tab">
                                <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                                <li><a href="{{ route('ourclients') }}">Our Clients New</a></li>
                                <li><a href="{{ route('pressReleases') }}">Press Releases</a></li>
                                <li><a href="{{ route('companynews') }}">Company News</a></li>
                                <li><a href="{{ route('events') }}">Events</a></li>
                                <li><a href="{{ route('contact') }}">Conatct Us</a></li>
                            </ul>
                            <div class="menu-2">
                                <h4 class="menu-title">Financial Markets</h4>
                                <ul class="menu-tab">
                                    @foreach ($projectTypes as $projectType)
                                        <li><a href="#"> {{ $projectType->projectType }} </a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="menu-2">
                                <h4 class="menu-title"><a href="{{ route('region.template') }}">Regions<a></h4>
                                <ul class="menu-tab">
                                    @foreach ($regions as $region)
                                        <li><a href="{{ route('country.template', $region->id) }}">
                                                {{ $region->region }} </a></li>
                                    @endforeach


                                </ul>
                            </div>

                        </div>
                        <div class="col-md-3 services-links">
                            <h4 class="menu-title"><a href="{{ route('services.index') }}"> Services </a> </h4>
                            <ul class="menu-tab">
                                @foreach ($services as $service)
                                    <li><a href="{{ route('service.sub.template', $service->id) }}">
                                            {{ $service->serviceType }} </a></li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="col-md-3 industries-links">
                            <h4 class="menu-title"><a href="{{ route('industry.template') }}">Industries</a></h4>
                            <ul class="menu-tab">
                                @foreach ($industries as $industry)
                                    <li>
                                        {{-- <a href="{{ route('front-report',$industry->id)}}"> {{ $industry->industryType }}</a> --}}

                                        <a href="{{ route('sub.industry.template', $industry->id) }}">
                                            {{ $industry->industryType }}</a>
                                    </li>
                                @endforeach



                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->
    <script src="{{ asset('frontEnd/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontEnd/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/main.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Js Plugins -->


    <!-- <script>
        $(document).ready(function() {
            $('ul li a').click(function() {
                $('li a').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script> -->

    <script>
        $('.onoffbtn').on('click', function() {
            if ($(this).children().is(':checked')) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active')
            }
        });
    </script>
 
 <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on("click", ".applyNow", function(e) {
        var id = $(this).data('requirment_id');

        $.ajax("{{ route('requirements.apply') }}", {
            type: 'POST', // http method
            data: {
                id: id
            },
            success: function(data) {
                $('.table').load(' .table');
                if (data.status == true) {
                    Swal.fire(data.message)
                    window.location.reload();

                }
                if (data.status == false) {
                    Swal.fire(data.message)

                }

            },
        });


    });
</script>
</body>

</html>
