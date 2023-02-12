@extends('layout.master')
@section('title', 'Home')

@section('content')

    <section class="hero">
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="banner-text">
                        <h2> {{ $article_cat->title}} </h2>
               
                    </div>
                </div>
            </div>
        
        </div>
    </section>
    <!-- Hero Section End -->


 
    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
         
            @if($articles->count() > 0)
                <div class="row">
                    <div class="col-md-12 cate-title-blk">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="cat-blk-title">
                                <h2>{{ $article_cat->title}}</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="cat-blk-title text-right">
                                <h4>Total Articles: {{$articles->count()}}</h4>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="row">
                    @foreach ($articles as $market )
                        <div class="col-lg-2 col-md-2 col-sm-2">

                            <div class="card" style="width:400px">
                                <img class="card-img-top" src="{{asset($market->photo)}}" alt="{{ $market->title }}">
                                <div class="card-body">
                                  <h4 class="card-title">{{   $market->title }}</h4>
                                  {{-- <p class="card-text">Some example text.</p> --}}
                                  <a href="{{ route('article.detail',$market->id) }}" class="btn btn-primary btn-block">Read More</a>
                                 
                                </div>
                              </div>

                            {{-- <div class="blog__item">
                                <div class="blog__item__pic set-bg" data-setbg=""></div>
                                <div class="blog__item__text">
                                    <span><img src="{{asset('public/frontEnd/img/calendar.png')}}" alt="ss">   {{ \Carbon\Carbon::parse($market->created_at)->format('D-m-Y') }}  </span>
                                    <h5>    </h5>
                                    <a href="{{ route('article.detail',$market->id) }}">Read More</a>
                                </div>
                            </div> --}}
                        </div>
                    @endforeach
                </div>
                
            @else
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="cat-blk-title">
                        <h5> Coming Soons </h5>
                    </div>
                </div>
            </div>
            @endif
           

            {{-- <div class="col-md-12 more-article-blk">
                <div class="article-more-btn">
                    <a href="{{ route('articles') }}"> View All Articles </a>

                </div>
            </div> --}}
        </div>
    </section>
@endsection
