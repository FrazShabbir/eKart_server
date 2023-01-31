<!DOCTYPE html>
<html lang="zxx">

<head>



  <!-- Css Styles -->
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/bootstrap.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/font-awesome.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/elegant-icons.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/magnific-popup.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/nice-select.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/owl.carousel.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/slicknav.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/style.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/custom.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('public/frontEnd/css/mobile-responsive.css')}}" type="text/css">
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
            <a href="#"><img src="{{asset('public/frontEnd/img/add.png')}}" class="img-responsive mobile-cart-icon"
                    alt=""></a>
            <a href="register.php"><img src="{{asset('public/frontEnd/img/user-1.png')}}"
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
                            <img src="{{asset('public/frontEnd/img/add.png')}}" class="img-responsive account-iocn"
                                alt="">
                        </a>
                        @if (Auth::user())
                            <a href="{{ route('customer.dashboard') }}">

                                <img src="{{asset('public/frontEnd/img/dashbaord.png')}}"class="img-responsive account-iocn1" alt="">
                            </a>
                        @else
                            <a href="{{ route('login') }}">
                                <img src="{{asset('public/frontEnd/img/user-1.png')}}"class="img-responsive account-iocn1" alt="">
                            </a>
                        @endif

                        <a href="#" class="search-switch"><img src="{{asset('public/frontEnd/img/bar-icon-1.png')}}"
                                alt=""></a>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

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
  <!-- Shop Section Begin -->
  <section class="shop spad">

    <div class="container-fluid">
        <div class="row">

                @include('layout.customerMenu')

            <div class="col-lg-10">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-8" role="tab">Report Overview</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-9" role="tab">Previous Reports/Related Works</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tabs-8" role="tabpanel">
                        <div class="product__details__tab__content">
                          <div class="row">
                            <div class="col-lg-12 content-wrap content-reponsive">
                              <div class="content-main pdbtm-none">
                                <div class="product__details__tab__content__item">
                                  <div class="col-md-12 as-min">
                                    <div id="product-fullview" class="col-sm-9 col-md-9 as-mi">
                                      <h5><a href="#"> {{ $report->title }} </a></h5>
                                      <p class="card-text">
                                        {!!$report->overview->overview !!}
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="clear row marginbtm30 note-block">
                                  <p><span class="not-text">Note:</span> Clicking on the chapter titles will display theentire
                                    chapter. If you would like to read the chapter content by each subtopic, then click on the tab
                                    next to each chapter.</p>

                                </div>
                                <div class="clear row marginbtm30 chapter-tab-block">

                                  <div class="col-md-12 ag-tabs_box">
                                    <ul class="ag-tabs_list">
                                        @foreach ($details as $detail )
                                            <li class="js-tabs_item ag-tabs_item @if($loop->iteration == 1) js-ag-tabs_item__active @endif ">
                                                <a href="#chapter-{{ $detail->id }}" class="ag-tabs_link" aria-expanded="true">  {{ $detail->title }}  </a>
                                            </li>
                                        @endforeach


                                      </li>

                                    </ul>

                                    <div class="ag-tab_box">
                                        @foreach ($details as $chapter )
                                            <div id="chapter-{{ $chapter->id }}" class="js-tab_pane ag-tab_pane  @if($loop->iteration == 1) js-ag-tab_pane__active @endif">
                                                <div class="ag-tab_img-box">
                                                    <h2> {{ $chapter->title }} </h2>
                                                    <p>
                                                        {{ $chapter->content }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tabs-9" role="tabpanel">
                        <div class="product__details__tab__content">
                          <div class="product__details__tab__content__item">
                            <div class="col-md-12 as-min">
                              <div class="col-sm-12 col-md-12 as-mi">
                                <h5><a href="#">Global Microneedle Market</a></h5>
                                <p class="card-text">
                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                  the
                                  industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                                  and scrambled it to make a type specimen book.
                                </p>
                              </div>

                            </div>
                            <hr>
                            <div class="col-md-12 as-min">
                              <div class="col-sm-12 col-md-12 as-mi">
                                <h5><a href="#">Advanced Medical Dressings: Global Markets</a></h5>
                                <p class="card-text">
                                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                  the
                                  industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                                  and scrambled it to make a type specimen book.
                                </p>
                              </div>
                            </div>
                            <hr>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="accro-tas">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                <i class="more-less fa fa-plus"></i> FAQ
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                              <div class="panel-body card-body" id="accordion_data">
                                <p>
                                    {!!$report->overview->faq !!}
                                </p>

                              </div>
                            </div>
                          </div>
                        </div>

                      </div><!-- panel-group -->
                    </div>
                  </div>
            </div>
        </div>


    </div>
  </section>
  <!-- Shop Section End -->
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
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
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
                            <span class="terms-links"><a href="#">Terms &amp; Conditions</a> | <a
                                    href="#">Privacy</a> | <a href="#">Disclaimer</a> | <a href="#">Legal</a> | <a
                                    href="#">Accessibilitys</a></span>
                        </p>
                    </div>
                    <div class="col-md-7 copytext">
                        <p>Copyright © 2021 ByReddy Consulting All Rights Reserved. Website Developed by: <a
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
                        <h4 class="menu-title"><a href="{{ route('service.template')}}"> Services </a> </h4>
                        <ul class="menu-tab">
                            @foreach($services as $service)
                            <li><a href="{{ route('service.sub.template',$service->id)}}"> {{ $service->serviceType }} </a></li>
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


  <script src="{{asset('public/frontEnd/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/jquery.slicknav.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/mixitup.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('public/frontEnd/js/main.js')}}"></script>


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


</body>

</html>
