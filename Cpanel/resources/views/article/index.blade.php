@extends('layout.master')
@section('title', 'All Articles')
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
                        <span> Category Articles </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="latest spad">
    <div class="container">
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
            @foreach ($financialmarkets as $financialmarket )
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg"
                    data-setbg="{{asset('storage/app/public/data/reports/'.$financialmarket->photo) }}"></div>
                    <div class="blog__item__text">
                        <span>
                                <img src="{{asset('public/frontEnd/img/calendar.png')}}" alt="">
                                    {{ \Carbon\Carbon::parse($financialmarket->created_at)->format('D-m-Y') }}
                               </span>
                        <h5>  {{   $financialmarket->title }}  </h5>
                        <a href="{{ route('article.detail',$financialmarket->id)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-md-12 cate-title-blk">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cat-blk-title">
                    <h2> Chemicals and Materials </h2>
                </div>
            </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="tags pull-right finan-more-btn">

                <a href="{{ route('article.type','chemicalsandmaterials')}}">View More</a>
                </div>
            </div>
            </div>
            @foreach ($chemicalsandmaterials as $financialmarket )
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg"
                    data-setbg="{{asset('storage/app/public/data/reports/'.$financialmarket->photo) }}"></div>
                    <div class="blog__item__text">
                        <span>
                                <img src="{{asset('public/frontEnd/img/calendar.png')}}" alt="">
                                    {{ \Carbon\Carbon::parse($financialmarket->created_at)->format('D-m-Y') }}
                               </span>
                        <h5>  {{   $financialmarket->title }}  </h5>
                        <a href="{{ route('article.detail',$financialmarket->id)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-md-12 cate-title-blk">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cat-blk-title">
                    <h2> Agriculture Food and Beverages </h2>
                </div>
            </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="tags pull-right finan-more-btn">
                    <a href="{{ route('article.type','energynaturalresources')}}">View More</a>
                </div>
            </div>
            </div>
            @foreach ($energynaturalresources as $energynaturalresource )
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg"
                    data-setbg="{{asset('storage/app/public/data/reports/'.$energynaturalresource->photo) }}"></div>
                    <div class="blog__item__text">
                        <span>
                                <img src="{{asset('public/frontEnd/img/calendar.png')}}" alt="">
                                    {{ \Carbon\Carbon::parse($energynaturalresource->created_at)->format('D-m-Y') }}
                               </span>
                        <h5>  {{   $energynaturalresource->title }}  </h5>
                        <a href="{{ route('article.detail',$financialmarket->id)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-md-12 cate-title-blk">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cat-blk-title">
                    <h2> Energy & Natural Resources </h2>
                </div>
            </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="tags pull-right finan-more-btn">
                     <a href="{{ route('article.type','agriculturefoodandbeverages')}}">View More</a>
                </div>
            </div>
            </div>
            @foreach ($agriculturefoodandbeverages as $agriculturefoodandbeverage )
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg"
                    data-setbg="{{asset('storage/app/public/data/reports/'.$agriculturefoodandbeverage->photo) }}"></div>
                    <div class="blog__item__text">
                        <span>
                                <img src="{{asset('public/frontEnd/img/calendar.png')}}" alt="">
                                    {{ \Carbon\Carbon::parse($agriculturefoodandbeverage->created_at)->format('D-m-Y') }}
                               </span>
                        <h5>  {{   $agriculturefoodandbeverage->title }}  </h5>
                        <a href="{{ route('article.detail',$financialmarket->id)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
