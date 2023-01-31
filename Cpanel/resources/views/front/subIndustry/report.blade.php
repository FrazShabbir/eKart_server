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
                            <a href="{{ route('sub.industry.template',$subindustry->industry->id ) }}"> {{ $subindustry->industry->industryType }} </a> /
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
                        <h2 class="artl-heading">  {{ $subindustry->subindustry }} </h2>
                        <div class="clear row marginbtm30">
                            <div class="col-sm-9 col-md-9 hidden-xs catg-icon-img">
                                <img class="img-responsive catg-icon"
                                src="{{asset('storage/app/public/data/'.$subindustry->banner) }}"
                                alt="">
                                <h4 class="indus-title">  {{ $subindustry->subindustry }}  </h4>
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
                            @if($subindustry->category_price > 0 )
                            <form method="post" action="{{route('cart.category.store')}}">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $subindustry->id }}">
                                <input type="hidden" name="category_title" value="{{ $subindustry->subindustry }}">
                                <input type="hidden" name="category_price" value="{{ $subindustry->category_price }}">
                                <input type="hidden" name="category_qty" value="1">
                                <ul class="nav nav-tabs"  style="border-bottom: none">
                                    <li class="nav-item">
                                        <button type="submit" class="btn btn-default btn-gold  " title="Buy Now">
                                            <i class="fa fa-shopping-cart fa-lg  " aria-hidden="true"></i>
                                            Buy Now ${{ $subindustry->category_price }}
                                        </button>
                                    </li>
                                </ul>
                            </form>
                            <br>
                            @endif
                        </div>
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
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
                                    <a class="nav-link" data-toggle="tab" href="#tabs-8" role="tab">Data &
                                        Statistics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-9" role="tab">Media</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-10" role="tab">Data Store</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-11" role="tab">Others</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    @if($reports->count() > 0)
                                    @foreach ($reports as $report)
                                        <div class="product__details__tab__content">
                                            <div class="product__details__tab__content__item">
                                                <div class="col-md-12 as-min">
                                                    <div class="col-sm-9 col-md-9 as-mi storeLog">
                                                        {{--  --}}
                                                        <h5> <a href="{{ route('report-details',$report->id) }}"  data-report_id={{ $report->id}} >   {{ $report->title }} </a></h5>
                                                            <p class="card-text">
                                                            @if($report->overview)
                                                                @php
                                                                        $data = substr($report->overview->overview,0, 1520);
                                                                @endphp

                                                                {{ strip_tags($data) }}...

                                                            @endif
                                                            </p>
                                                    </div>

                                                    <div class="col-sm-3 col-md-3 hidden-xs as-mi1">
                                                        <img src="{{asset('storage/app/public/data/reports/'.$report->photo)}}"
                                                            class="img-reponsive mining-img">
                                                    </div>
                                                </div>
                                                <div class="author-text">
                                                    <p><strong>Authors:</strong> {{ $report->author }}  <strong>Publish
                                                            Date:</strong>  {{ $report->created_at }} </p>
                                                </div>
                                                <div class="tags">
                                                    <a href="#">Overview</a> <a href="#">Contents</a>
                                                    <a href="#">Project Code</a> <a href="#">Downloads</a>
                                                    <span class="share-links"> <a href="#"> Share</a> / <a
                                                            href="#">Follow</a> / <a href="#">Recommends</a> / <a
                                                            href="#">Suggest</a></span>
                                                </div>
                                                <p class="report-block"></p>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                    <div class="author-text text-center" >
                                        <br>
                                            <p class="text-danger">
                                                    <strong> No reports against "{{ $subindustry->subindustry }}"  </strong>

                                            </p>
                                    </div>
                                    @endif

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
