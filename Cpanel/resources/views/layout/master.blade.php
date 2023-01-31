<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="ByReddy Consulting">
    <meta name="keywords" content="ByReddy Consulting">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app/public/data/'.$option->faveIcon) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @yield('title') | ByReddy Consulting
    </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
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



    @section('customStyle')
    @show
</head>

<body>

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
            <a href="#"><img src="{{asset('frontEnd/img/add.png')}}" class="img-responsive mobile-cart-icon"
                    alt=""></a>
            <a href="register.php"><img src="{{asset('frontEnd/img/user-1.png')}}"
                    class="img-responsive mobile-cart-icon1" alt=""></a>
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
                        <a href="{{ route('homePage') }}">
                            <img src="{{asset('storage/app/public/data/'.$option->logo) }}" alt="">
                        </a>
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

                        <a href="{{ route('cart.index')}}">
                            @if(Cart::count()>0)
                            <sup style="font-size:10px;color:#000"> {{ Cart::count() }}</sup>
                            @endif
                            <img src="{{asset('frontEnd/img/add.png')}}" class="img-responsive account-iocn"
                                alt="">
                        </a>
                        @if (Auth::user())
                            <a href="{{ route('customer.dashboard') }}">

                                <img src="{{asset('frontEnd/img/dashbaord.png')}}"class="img-responsive account-iocn1" alt="">
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                <img src="{{asset('frontEnd/img/user-1.png')}}"class="img-responsive account-iocn1" alt="">
                            </a>
                        @endif

                        <a href="#" class="search-switch"><img src="{{asset('frontEnd/img/bar-icon-1.png')}}"
                                alt=""></a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

    @section('content')
    @show



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

                                <br><br><span class="readmore-butn"> <a href="#"> Read More</a></span></p>

                            <div class="hero__social1">
                                <a href="http://www.facebook.com/{{ $option->fb}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="http://www.twitter.com/{{ $option->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="http://www.pinterest.com/{{ $option->pinterest}}" target="_blank"><i class="fa fa-pinterest"></i></a>
                                <a href="http://www.instagram.com/{{ $option->insta}}" target="_blank"><i class="fa fa-instagram"></i></a>
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
                            <p>{{ $option->cr }}. Website Developed by: <a
                                    href="https://www.webneeds.in" target="_blank">Webneeds.in</a>
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
                                <li><a href="{{ route('aboutUs')}}">About Us</a></li>
                                <li><a href="{{ route('ourclients')}}">Our Clients</a></li>
                                <li><a href="{{ route('pressReleases')}}">Press Releases</a></li>
                                <li><a href="{{ route('companynews') }}">Company News</a></li>
                                <li><a href="{{ route('events') }}">Events</a></li>
                                <li><a href="{{ route('contact') }}">Conatct Us</a></li>
                            </ul>
                            <div class="menu-2">
                                <h4 class="menu-title">Financial Markets</h4>
                                <ul class="menu-tab">
                                    @foreach($projectTypes as $projectType)
                                    <li><a href="#"> {{ $projectType->projectType }} </a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="menu-2">
                                <h4 class="menu-title"><a href="{{ route('region.template')}}">Regions<a></h4>
                                <ul class="menu-tab">
                                    @foreach($regions as $region)
                                    <li><a href="{{ route('country.template',$region->id) }}"> {{ $region->region }} </a></li>
                                    @endforeach


                                </ul>
                            </div>

                        </div>
                        <div class="col-md-3 services-links">
                            <h4 class="menu-title"><a href="{{ route('services.index')}}"> Services </a> </h4>
                            <ul class="menu-tab">
                                @foreach($services as $service)

                                <li><a href="{{ route('front-reports',$service->id)}}"> {{ $service->serviceType }} </a></li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="col-md-3 industries-links">
                            <h4 class="menu-title"><a href="{{ route('industry.template')}}">Industries</a></h4>
                            <ul class="menu-tab">
                                @foreach($industries as $industry)
                                <li>
                                    {{-- <a href="{{ route('front-report',$industry->id)}}"> {{ $industry->industryType }}</a> --}}

                                    <a href="{{ route('sub.industry.template',$industry->id)}}"> {{ $industry->industryType }}</a>
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

    <!-- Js Plugins -->

    <script src="{{asset('frontEnd/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('frontEnd/js/mixitup.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontEnd/js/main.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:true,
        nav:true,
        autoplay:true,
        smartSpeed: 3000,
        autoplayTimeout:7000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:6
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
    $(document).ready(function(){
      $('ul li a').click(function(){
        $('li a').removeClass("active");
        $(this).addClass("active");
    });
    });
    </script> -->
    <script>
    (function ($) {
        $(function () {


          function fnToggleTabs(argItem) {
            var ariaState = argItem.attr('aria-expanded');

            if (ariaState === 'true') {
              ariaState = 'false';
            } else {
              ariaState = 'true';
            }

            argItem.attr('aria-expanded', ariaState);
          }

          $('.js-tabs_item').on('click', function (e) {
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
    $('.onoffbtn').on('click', function(){
      if($(this).children().is(':checked')){
        $(this).addClass('active');
      }
      else{
        $(this).removeClass('active')
      }
    });
    </script>
    <script>

    // vars
    'use strict'
    var	testim = document.getElementById("testim"),
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
            ignoreTouch = 30;
    ;

    window.onload = function() {

        // Testim Script
        function playSlide(slide) {
            for (var k = 0; k < testimDots.length; k++) {
                testimContent[k].classList.remove("active");
                testimContent[k].classList.remove("inactive");
                testimDots[k].classList.remove("active");
            }

            if (slide < 0) {
                slide = currentSlide = testimContent.length-1;
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
        @if(Session::has('success'))

        swal({

            text: "{{ Session::get('success') }}",
            icon: "success",
        });

        @endif


        @if(Session::has('error'))

        swal({

            text: "{{ Session::get('error') }}",
            icon: "error",
        });

        @endif
    </script>



    @section('customJs')
    @show
</body>

</html>
