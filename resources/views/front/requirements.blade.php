<!DOCTYPE html>
<html lang="zxx">

<head>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

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
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">
    <script src="{{ asset('frontEnd/js/jquery-3.3.1.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="float-container">
        <a href="{{ route('requirements')}}">Requirements</a>
       
        </div>
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
                        <div class="breadcrumb__links">
                            <a href="{{ route('homePage') }}"> Home </a> /
                            <span> Requirements</span>
                        </div>
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

                        <div class="hidden-xs hidden-sm rpt-pg-cta text-left">

                         





                        </div>

                    </div>
                </div>
                <div class="col-lg-10 content-wrap content-reponsive">
                    <div class="content-main pdbtm-none">
                        <div class="clear row marginbtm30">
                            <div class="col-xs-7 col-sm-7 col-md-7 pdltrt-xs-none">
                                <div class="report-detail-heading">
                                    <h1> Requirements</h1>
                                </div>
                                <div class="author-text">

                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5 col-md-5 pdltrt-xs-none">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Service Type</label>
                                    <select name="" id="service_id" class="form-control">
                                        @foreach ($services as $ser)
                                            <option value="{{ $ser->id }}">{{ $ser->serviceType }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Industry Type</label>
                                    <select name="" id="industry_id" class="form-control">
                                        @foreach ($industries as $ind)
                                            <option value="{{$ind->id}}">{{ $ind->industryType }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Subindustry Type</label>
                                    <select name="" id="subindustry_id" class="form-control">
                                        @foreach ($subindustries as $sub)
                                            <option value="{{$sub->id}}">{{ $sub->subindustry }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Region</label>
                                    <select name="" id="region_id" class="form-control">
                                        @foreach ($regions as $reg)
                                            <option value="{{$reg->id}}">{{ $reg->region }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group mt-2">
                                    <label for="exampleInputEmail1">Country</label>
                                    <select name="" id="country_id" class="form-control">
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mt-2">
                                    <button class="btn btn-primary mt-4" onclick="filter()">Search</button>
                                    <button type="button" onclick="clearFilters()"
                                    class="btn btn-outline-secondary btn-sm mt-4">Clear Filters</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 pdltrt-xs-none single-box">

                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                S #
                                            </th>
                                            <th>
                                                Project Type
                                            </th>
                                            <th>
                                                Service Type
                                            </th>
                                            <th>
                                                Industry Type
                                            </th>
                                            <th>
                                                Subindustry Type
                                            </th>
                                            <th>
                                                Region
                                            </th>
                                            <th>
                                                Country
                                            </th>
                                            <th>
                                                View Requirements
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach ($requiremnts as $requirment)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td> {{ $requirment->project->projectType }} {{ $requirment->id }}</td>
                                            <td> {{ $requirment->service->serviceType }} </td>
                                            <td> {{ $requirment->industry->industryType }} </td>
                                            <td> {{ $requirment->subIndustry->subindustry }} </td>
                                            <td> {{ $requirment->region->region }} </td>
                                            <td> {{ $requirment->country->country }} </td>
                                            <td> {{ $requirment->description }} </td>
                                            <td>
                                                @if (Auth::user())
                                                    @php
                                                        $applied = App\Models\ApplyRequirement::where('user_id', Auth::user()->id)
                                                            ->where('requirement_id', $requirment->id)
                                                            ->first();
                                                        
                                                    @endphp

                                                    @if ($applied)
                                                        <button type="button" disabled class="btn btn-sm btn-info"
                                                            title="Already Applied"> Applied </button>
                                                    @else
                                                        <button type="button" class="btn btn-sm btn-info applyNow"
                                                            data-requirment_id="{{ $requirment->id }}">
                                                            Apply Now
                                                        </button>
                                                    @endif
                                                @else
                                                    <button type="button" disabled class="btn btn-sm btn-info"
                                                        title="Login In to Apply"> Login to Apply </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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


    <script>
        function submit_comment() {
            var comment = $('.commentar').val();
            el = document.createElement('li');
            el.className = "box_result row";
            el.innerHTML =
                '<div class=\"avatar_comment col-md-1\">' +
                '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>' +
                '</div>' +
                '<div class=\"result_comment col-md-11\">' +
                '<h4>Anonimous</h4>' +
                '<p>' + comment + '</p>' +
                '<div class=\"tools_comment\">' +
                '<a class=\"like\" href=\"#\">Like</a><span aria-hidden=\"true\"> · </span>' +
                '<i class=\"fa fa-thumbs-o-up\"></i> <span class=\"count\">0</span>' +
                '<span aria-hidden=\"true\"> · </span>' +
                '<a class=\"replay\" href=\"#\">Reply</a><span aria-hidden=\"true\"> · </span>' +
                '<span>1m</span>' +
                '</div>' +
                '<ul class="child_replay"></ul>' +
                '</div>';
            document.getElementById('list_comment').prepend(el);
            $('.commentar').val('');
        }

        $(document).ready(function() {
            $('#list_comment').on('click', '.like', function(e) {
                $current = $(this);
                var x = $current.closest('div').find('.like').text().trim();
                var y = parseInt($current.closest('div').find('.count').text().trim());

                if (x === "Like") {
                    $current.closest('div').find('.like').text('Unlike');
                    $current.closest('div').find('.count').text(y + 1);
                } else if (x === "Unlike") {
                    $current.closest('div').find('.like').text('Like');
                    $current.closest('div').find('.count').text(y - 1);
                } else {
                    var replay = $current.closest('div').find('.like').text('Like');
                    $current.closest('div').find('.count').text(y - 1);
                }
            });

            $('#list_comment').on('click', '.replay', function(e) {
                cancel_reply();
                $current = $(this);
                el = document.createElement('li');
                el.className = "box_reply row";
                el.innerHTML =
                    '<div class=\"col-md-12 reply_comment\">' +
                    '<div class=\"row\">' +
                    '<div class=\"avatar_comment col-md-1\">' +
                    '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>' +
                    '</div>' +
                    '<div class=\"box_comment col-md-10\">' +
                    '<textarea class=\"comment_replay\" placeholder=\"Add a comment...\"></textarea>' +
                    '<div class=\"box_post\">' +
                    '<div class=\"pull-right\">' +
                    '<span>' +
                    '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\" />' +
                    '<i class=\"fa fa-caret-down\"></i>' +
                    '</span>' +
                    '<button class=\"cancel\" onclick=\"cancel_reply()\" type=\"button\">Cancel</button>' +
                    '<button onclick=\"submit_reply()\" type=\"button\" value=\"1\">Reply</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $current.closest('li').find('.child_replay').prepend(el);
            });
        });

        function submit_reply() {
            var comment_replay = $('.comment_replay').val();
            el = document.createElement('li');
            el.className = "box_reply row";
            el.innerHTML =
                '<div class=\"avatar_comment col-md-1\">' +
                '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>' +
                '</div>' +
                '<div class=\"result_comment col-md-11\">' +
                '<h4>Anonimous</h4>' +
                '<p>' + comment_replay + '</p>' +
                '<div class=\"tools_comment\">' +
                '<a class=\"like\" href=\"#\">Like</a><span aria-hidden=\"true\"> · </span>' +
                '<i class=\"fa fa-thumbs-o-up\"></i> <span class=\"count\">0</span>' +
                '<span aria-hidden=\"true\"> · </span>' +
                '<a class=\"replay\" href=\"#\">Reply</a><span aria-hidden=\"true\"> · </span>' +
                '<span>1m</span>' +
                '</div>' +
                '<ul class="child_replay"></ul>' +
                '</div>';
            $current.closest('li').find('.child_replay').prepend(el);
            $('.comment_replay').val('');
            cancel_reply();
        }

        function cancel_reply() {
            $('.reply_comment').remove();
        }
    </script>
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
    <script src="{{ asset('frontEnd/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontEnd/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/main.js') }}"></script>
    <!-- Js Plugins -->

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            nav: true,
            autoplay: true,
            smartSpeed: 3000,
            autoplayTimeout: 7000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 6
                }
            }
        })
    </script>
    <script>
        function toggleIcon(e) {
            $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('glyphicon-plus glyphicon-minus');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
    <!-- <script>
        $(document).ready(function() {
            $('ul li a').click(function() {
                $('li a').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script> -->
    <script>
        (function($) {
            $(function() {
                function fnToggleTabs(argItem) {
                    var ariaState = argItem.attr('aria-expanded');
                    if (ariaState === 'true') {
                        ariaState = 'false';
                    } else {
                        ariaState = 'true';
                    }
                    argItem.attr('aria-expanded', ariaState);
                }
                $('.js-tabs_item').on('click', function(e) {
                    e.preventDefault();
                    agItem = $(this).children('a');
                    fnToggleTabs(agItem);
                    if (agItem.attr('aria-expanded')) {
                        var agID = agItem.attr('href');
                        console.log(agID);
                        $('.js-tabs_item').removeClass('js-ag-tabs_item__active');
                        $(this).addClass('js-ag-tabs_item__active');
                        $('.js-tab_pane').removeClass('js-ag-tab_pane__active');
                        $(agID).addClass('js-ag-tab_pane__active');
                    }
                });
            });
        })(jQuery);
    </script>
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
        // vars
        'use strict'
        var testim = document.getElementById("testim"),
            testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
            testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
            testimLeftArrow = document.getElementById("left-arrow"),
            testimRightArrow = document.getElementById("right-arrow"),
            testimSpeed = 4500,
            currentSlide = 0,
            currentActive = 0,
            testimTimer,
            touchStartPos,
            touchEndPos,
            touchPosDiff,
            ignoreTouch = 30;;

        window.onload = function() {
            // Testim Script
            function playSlide(slide) {
                for (var k = 0; k < testimDots.length; k++) {
                    testimContent[k].classList.remove("active");
                    testimContent[k].classList.remove("inactive");
                    testimDots[k].classList.remove("active");
                }

                if (slide < 0) {
                    slide = currentSlide = testimContent.length - 1;
                }

                if (slide > testimContent.length - 1) {
                    slide = currentSlide = 0;
                }

                if (currentActive != currentSlide) {
                    testimContent[currentActive].classList.add("inactive");
                }
                testimContent[slide].classList.add("active");
                testimDots[slide].classList.add("active");

                currentActive = currentSlide;

                clearTimeout(testimTimer);
                testimTimer = setTimeout(function() {
                    playSlide(currentSlide += 1);
                }, testimSpeed)
            }

            testimLeftArrow.addEventListener("click", function() {
                playSlide(currentSlide -= 1);
            })

            testimRightArrow.addEventListener("click", function() {
                playSlide(currentSlide += 1);
            })

            for (var l = 0; l < testimDots.length; l++) {
                testimDots[l].addEventListener("click", function() {
                    playSlide(currentSlide = testimDots.indexOf(this));
                })
            }
            playSlide(currentSlide);
            // keyboard shortcuts
            document.addEventListener("keyup", function(e) {
                switch (e.keyCode) {
                    case 37:
                        testimLeftArrow.click();
                        break;

                    case 39:
                        testimRightArrow.click();
                        break;

                    case 39:
                        testimRightArrow.click();
                        break;

                    default:
                        break;
                }
            })
            testim.addEventListener("touchstart", function(e) {
                touchStartPos = e.changedTouches[0].clientX;
            })
            testim.addEventListener("touchend", function(e) {
                touchEndPos = e.changedTouches[0].clientX;
                touchPosDiff = touchStartPos - touchEndPos;
                console.log(touchPosDiff);
                console.log(touchStartPos);
                console.log(touchEndPos);
                if (touchPosDiff > 0 + ignoreTouch) {
                    testimLeftArrow.click();
                } else if (touchPosDiff < 0 - ignoreTouch) {
                    testimRightArrow.click();
                } else {
                    return;
                }

            })
        }


        
    </script>


<script>
    function filter() {
        const service_id = $("#service_id").val() ? $("#service_id").val() : "";
        const industry_id = $("#industry_id").val() ? $("#industry_id").val() : "";
        const subindustry_id = $("#subindustry_id").val() ? $("#subindustry_id").val() : "";
        const region_id = $("#region_id").val() ? $("#region_id").val() : "";
        const country_id = $("#country_id").val() ? $("#country_id").val() : "";


        const url = "{{ route('requirements') }}" + "?service_id=" + service_id + "&industry_id=" + industry_id 
        +"&subindustry_id=" + subindustry_id+"&region_id=" + region_id+"&country_id=" + country_id

        //    alert(date_from);
        // console.log(completed_at);
        window.location.replace(url);
    }
</script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable(
            // hide length menu 
            {
                "lengthChange": false,
                "info": false
            }



        );
    });
</script>
<script>
    // alert('Final')
    function clearFilters() {
        const newurl = window.location.href.split("?");
        window.location.replace(newurl[0]);

    }
</script>

</body>

</html>
