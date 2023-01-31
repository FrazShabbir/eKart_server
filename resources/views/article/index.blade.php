@extends('layout.master')
@section('title', 'All Articles')
@section('customStyle')
    <style>
        .logo-title a:hover {
            color: #000;
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
            @foreach ($article_categories as $article)
                <div class="row">
                    <div class="col-md-12 cate-title-blk">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="cat-blk-title">
                                <h2> {{ ucfirst($article->title) }} </h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="tags pull-right finan-more-btn">
                                <a href="{{ route('article.type', [$article->title,$article->id]) }}">View More</a>
                            </div>
                        </div>
                    </div>
                    @foreach ($article->articles as $my_article)
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="blog__item">
                                <div class="blog__item__pic set-bg" 
                                data-setbg="{{ $my_article->getFirstMediaUrl('article_main_photo', 'thumb') }}" 
                                style="background-image: url('{{ $my_article->getFirstMediaUrl('article_main_photo', 'thumb') }}');"></div>
                                <div class="blog__item__text">
                                    <span>
                                            <img src="http://ekart22.com/byreddy/public/frontEnd/img/calendar.png" alt="">
                                               {{ $my_article->created_at }}
                                        </span>
                                    <h5> {{ $my_article->title }} </h5>
                                    <a href="{{ route('article.detail',$my_article->id) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach


        </div>
    </section>

@endsection
