@extends('layout.master')
@section('title', 'Home')

@section('content')

    <section class="hero">
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="banner-text">
                        <h2> {{ $home->head1 }} </h2>
                        <p class="para-text"> {{ $home->subhead1 }} </p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="tile" id="tile-1">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <div class="slider"></div>
                            <li class="nav-item tabslider">
                                <a class="nav-link active" id="news-tab" data-toggle="tab" href="#news" role="tab"
                                    aria-controls="home" aria-selected="true"> News</a>
                            </li>
                            <li class="nav-item tabslider">
                                <a class="nav-link" id="insights-tab" data-toggle="tab" href="#insights" role="tab"
                                    aria-controls="profile" aria-selected="false"> Insights</a>
                            </li>
                            <li class="nav-item tabslider">
                                <a class="nav-link" id="markets-tab" data-toggle="tab" href="#markets" role="tab"
                                    aria-controls="contact" aria-selected="false"> Markets</a>
                            </li>
                        </ul>


                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="news-tab">
                                <div class="blog_content">
                                    <div class="owl-carousel owl-theme">
                                        @foreach ($news as $new )
                                        <div class="blog_item">
                                            <div class="blog_image">
                                                <img class="img-responsive img-fluid"
                            
                                                src="{{ $new->getFirstMediaUrl('article_main_photo', 'thumb')  }}" alt="images">
                                            </div>
                                            <div class="blog_details">
                                                <div class="blog_title">
                                                    <h5><a href="#"> {{ $new->title }}</a></h5>
                                                </div>
                                                <p class="news-text">
                                                    <a href="{{ route('article.detail',$new->id) }}" style="color:#000">

                                                        {!! Str::limit($new->description,40) !!}


                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tags pull-right tab-btmbutn">
                                    {{-- <a href="{{ route('article.type','financialmarkets')}}">View More</a> --}}
                                    <a href="{{ route('articles') }}">View More</a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="insights" role="tabpanel" aria-labelledby="insights-tab">
                                <div class="blog_content">
                                    <div class="owl-carousel owl-theme">
                                        @foreach ($insights as $insight)

                                        <div class="blog_item">
                                            <div class="blog_image">
                                                <img class="img-responsive img-fluid"
                                                src="{{ $insight->getFirstMediaUrl('article_main_photo', 'thumb')  }}" alt="images">
                                            </div>
                                            <div class="blog_details">
                                                <div class="blog_title">
                                                    <h5><a href="#"> {{ $insight->title }}</a></h5>
                                                </div>
                                                <p class="news-text">
                                                    <a href="{{ route('article.detail',$insight->id) }}">
                                                        {!! Str::limit($insight->description, 40) !!}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>
                                </div>
                                <div class="tags pull-right tab-btmbutn">
                                    <a href="{{ route('articles') }}">View More</a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="markets" role="tabpanel" aria-labelledby="markets-tab">
                                <div class="blog_content">
                                    <div class="owl-carousel owl-theme">
                                        @foreach ($markets as $market )
                                        <div class="blog_item">
                                            <div class="blog_image">
                                                <img class="img-responsive img-fluid"
                                                src="{{ $market->getFirstMediaUrl('article_main_photo', 'thumb')  }}" alt="images">
                                            </div>
                                            <div class="blog_details">
                                                <div class="blog_title">
                                                    <h5><a href="#"> {{ $market->title }}</a></h5>
                                                </div>
                                                <p class="news-text">
                                                    <a href="{{ route('article.detail',$market->id) }}" style="color:#000">
                                                        {!! Str::limit($market->description, 40) !!}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tags pull-right tab-btmbutn">
                                    <a href="{{ route('articles') }}">View More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2> {{ $home->head2 }} </h2>
                        <p>
                            {{ $home->subhead2 }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 serv-part">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <img src="{{asset('storage/data/'.$home->head1img)}}" class="img-responsive service-img" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 serv-part-1">
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark service-heading"> The Services We Offers </a>
                            <p class="card-text">
                                {{ $home->serviceContent }}
                            </p>
                            <div class="tags">
                                <span class="share-links read-btn">
                                     <a href="{{ route('services.index') }}"> Read More</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 serv-part1">
                    <div class="col-lg-9 col-md-9 col-sm-9 serv-part-2">
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark service-heading">
                                The Industries We Offer Our Services To

                            </a>
                            <p class="card-text">
                                {{ $home->industiryContent }}
                            </p>
                            <div class="tags">
                                <span class="share-links read-btn1"> 
                                    <a href="{{ route('industry.template') }}"> Read More</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <img src="{{asset('storage/data/'.$home->head2img)}}" class="img-responsive service-img1" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 serv-part">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <img src="{{asset('storage/data/'.$home->head3img)}}" class="img-responsive service-img" alt="">
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 serv-part-1">
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark service-heading">
                                Our Insights / Articles Across Various Topics
                            </a>
                            <p class="card-text">
                                {{ $home->insightsContent }}
                            </p>
                            <div class="tags">
                                <span class="share-links read-btn">
                                    <a href="{{ route('industry.template') }}"> Read More</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 serv-part1">
                    <div class="col-lg-9 col-md-9 col-sm-9 serv-part-2">
                        <div class="card-body">
                            <a href="#" class="h2 text-decoration-none text-dark service-heading">
                                Our Analysis On Financial Markets and Companies
                            </a>
                            <p class="card-text">
                                {{ $home->analysisContent }}
                            </p>
                            <div class="tags">
                                <span class="share-links read-btn1">  
                                    <a href="{{ route('industry.template') }}"> Read More</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <img src="{{asset('storage/data/'.$home->head4img)}}" class="img-responsive service-img1" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title"> 
                        <h2> {{ $home->head3 }} </h2>
                        <p>
                            {{ $home->subhead3 }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($lastReport != '')  
                <div class="col-12 col-md-12 mb-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="col-md-12 as-min">
                                <div class="col-sm-9 col-md-9 as-mi">

                                    <a href="{{ route('report-details',$lastReport->id ) }}" class="h2 text-decoration-none text-dark asteroid-mining">
                                        {{ $lastReport->title }}
                                    </a>
                                    <p class="card-text">
                                        @if($lastReport->overview)
                                            {!! Str::limit($lastReport->overview->overview, 600) !!}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-sm-3 col-md-3 hidden-xs as-mi1">
                                    <img src="{{asset('storage/data/reports/'.$lastReport->photo)}}"
                                    class="img-reponsive mining-img">
                                </div>
                            </div>
                            <div class="author-text">
                                <p><strong>Authors:</strong> {{ $lastReport->author }} <strong>Publish Date:</strong>   {{ $lastReport->created_at }} </p>
                            </div>
                            <div class="tags">
                                <a href="#">Overview</a> <a href="#">Contents</a>
                                <a href="#">Project Code</a> <a href="#">Downloads</a>
                                <span class="share-links"> <a href="#"> Share</a> / <a href="#">Follow</a> / <a href="#">Recommends</a> / <a href="#">Suggest</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Featured Product -->
    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2> {{ $home->head4 }} </h2>
                        <p>
                            {{ $home->subhead4 }}
                        </p>
                    </div>
                </div>
            </div>
            @if($financialmarkets->count() > 0)
                <div class="row">
                    <div class="col-md-12 cate-title-blk">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="cat-blk-title">
                                <h2>Financial Markets</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="tags pull-right finan-more-btn">
                                <a href="{{ route('article.type','financialmarkets')}}">View More</a>
                            </div>
                        </div>
                    </div>
                    @foreach ($financialmarkets as $market )
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="blog__item">
                                <div class="blog__item__pic set-bg"
                                data-setbg="{{asset('storage/app/public/data/reports/'.$market->photo) }}"></div>
                                <div class="blog__item__text">
                                    <span><img src="{{asset('public/frontEnd/img/calendar.png')}}" alt="">   {{ \Carbon\Carbon::parse($market->created_at)->format('D-m-Y') }}  </span>
                                    <h5>  {{   $market->title }}  </h5>
                                    <a href="{{ route('article.detail',$market->id) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="cat-blk-title">
                        <h5> Coming Soon </h5>
                    </div>
                </div>
            </div>
            @endif
            @if($chemicalsandmaterials->count() > 0)
                <div class="row">
                    <div class="col-md-12 cate-title-blk">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="cat-blk-title">
                                <h2>Chemicals and Materials</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="tags pull-right finan-more-btn">
                                <a href="{{ route('article.type','chemicalsandmaterials')}}">View More</a>
                            </div>
                        </div>
                    </div>
                    @foreach ($chemicalsandmaterials as $market )
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="blog__item">
                                <div class="blog__item__pic set-bg"
                                data-setbg="{{asset('storage/app/public/data/reports/'.$market->photo) }}"></div>
                                <div class="blog__item__text">
                                    <span><img src="{{asset('public/frontEnd/img/calendar.png')}}" alt="">
                                        {{ \Carbon\Carbon::parse($market->created_at)->format('D-m-Y') }}

                                        </span>
                                    <h5>  {{   $market->title }}  </h5>
                                    <a href="{{ route('article.detail',$market->id) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="cat-blk-title">
                        <h5> Coming Soon </h5>
                    </div>
                </div>
            </div>
            <br>
            @endif

            <div class="col-md-12 more-article-blk">
                <div class="article-more-btn">
                    <a href="{{ route('articles') }}"> View All Articles </a>

                </div>
            </div>
        </div>
    </section>
@endsection
