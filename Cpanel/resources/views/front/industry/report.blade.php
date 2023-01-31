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
                            <a href="{{ route('industry.template') }}">Industry Template</a> /
                            <span> {{ $industry->industryType }} </span>

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
                        <h2 class="artl-heading">  {{ $industry->industryType }} </h2>
                        <div class="clear row marginbtm30">
                            <div class="col-sm-9 col-md-9 hidden-xs catg-icon-img">
                                <img class="img-responsive catg-icon"
                                src="{{asset('storage/app/public/data/industry/'.$industry->banner) }}"
                                alt="">
                                <h4 class="indus-title">  {{ $industry->subindustry }}  </h4>
                                <p class="discr-text"> {{ $industry->description }} </p>
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

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('customJs')
    <script>

        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $(".storeLog a").click(function() {
                var report_id = $(this).data('report_id');
               @if (Auth::check())
                    $.ajax({
                        type:'POST',
                        url:"{{ route('store.log') }}",
                        data:{report_id:report_id,},
                        success:function(data){
                        console.log(data);
                        }
                    });
                @endif
            });
        });
    </script>
@endsection
