@extends('layout.master')
@section('title', 'All By Type')
@section('customStyle')
    <style>
        .logo-title a:hover {
            color: #000;
        }

        #fbcomment {
            background: #fff;
            border: 1px solid #dddfe2;
            border-radius: 3px;
            color: #4b4f56;
            padding: 50px;
        }

        .header_comment {
            font-size: 14px;
            overflow: hidden;
            border-bottom: 1px solid #e9ebee;
            line-height: 25px;
            margin-bottom: 24px;
            padding: 10px 0;
        }

        .sort_title {
            color: #4b4f56;
        }

        .sort_by {
            background-color: #f5f6f7;
            color: #4b4f56;
            line-height: 22px;
            cursor: pointer;
            vertical-align: top;
            font-size: 12px;
            font-weight: bold;
            vertical-align: middle;
            padding: 4px;
            justify-content: center;
            border-radius: 2px;
            border: 1px solid #ccd0d5;
        }

        .count_comment {
            font-weight: 600;
        }

        .body_comment {
            padding: 0 8px;
            font-size: 14px;
            display: block;
            line-height: 25px;
            word-break: break-word;
        }

        .avatar_comment {
            display: block;
        }

        .avatar_comment img {
            height: 48px;
            width: 48px;
        }

        .box_comment {
            display: block;
            position: relative;
            line-height: 1.358;
            word-break: break-word;
            border: 1px solid #d3d6db;
            word-wrap: break-word;
            background: #fff;
            box-sizing: border-box;
            cursor: text;
            font-family: Helvetica, Arial, sans-serif;
            font-size: 16px;
            padding: 0;
        }

        .box_comment textarea {
            min-height: 40px;
            padding: 12px 8px;
            width: 100%;
            border: none;
            resize: none;
        }

        .box_comment textarea:focus {
            outline: none !important;
        }

        .box_comment .box_post {
            border-top: 1px solid #d3d6db;
            background: #f5f6f7;
            padding: 8px;
            display: block;
            overflow: hidden;
        }

        .box_comment label {
            display: inline-block;
            vertical-align: middle;
            font-size: 11px;
            color: #90949c;
            line-height: 22px;
        }

        .box_comment button {
            margin-left: 8px;
            background-color: #4267b2;
            border: 1px solid #4267b2;
            color: #fff;
            text-decoration: none;
            line-height: 22px;
            border-radius: 2px;
            font-size: 14px;
            font-weight: bold;
            position: relative;
            text-align: center;
        }

        .box_comment button:hover {
            background-color: #29487d;
            border-color: #29487d;
        }

        .box_comment .cancel {
            margin-left: 8px;
            background-color: #f5f6f7;
            color: #4b4f56;
            text-decoration: none;
            line-height: 22px;
            border-radius: 2px;
            font-size: 14px;
            font-weight: bold;
            position: relative;
            text-align: center;
            border-color: #ccd0d5;
        }

        .box_comment .cancel:hover {
            background-color: #d0d0d0;
            border-color: #ccd0d5;
        }

        .box_comment img {
            height: 16px;
            width: 16px;
        }

        .box_result {
            margin-top: 24px;
        }

        .box_result .result_comment h4 {
            font-weight: 600;
            white-space: nowrap;
            color: #365899;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            line-height: 1.358;
            margin: 0;
        }

        .box_result .result_comment {
            display: block;
            overflow: hidden;
            padding: 0;
        }

        .child_replay {
            border-left: 1px dotted #d3d6db;
            margin-top: 12px;
            list-style: none;
            padding: 0 0 0 8px
        }

        .reply_comment {
            margin: 12px 0;
        }

        .box_result .result_comment p {
            margin: 4px 0;
            text-align: justify;
        }

        .box_result .result_comment .tools_comment {
            font-size: 12px;
            line-height: 1.358;
        }

        .box_result .result_comment .tools_comment a {
            color: #4267b2;
            cursor: pointer;
            text-decoration: none;
        }

        .box_result .result_comment .tools_comment span {
            color: #90949c;
        }

        .body_comment .show_more {
            background: #3578e5;
            border: none;
            box-sizing: border-box;
            color: #fff;
            font-size: 14px;
            margin-top: 24px;
            padding: 12px;
            text-shadow: none;
            width: 100%;
            font-weight: bold;
            position: relative;
            text-align: center;
            vertical-align: middle;
            border-radius: 2px;
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
                            <span> Article Details </span>
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
                <div class="col-lg-9 content-wrap content-reponsive">
                    <div class="content-main pdbtm-none">
                        <div class="blog__hero__text">
                            <h2> {{ $article->title }} </h2>
                            <ul>
                                <li> By {{ $article->author }} </li>
                                <li> {{ \Carbon\Carbon::parse($article->created_at)->format('D-m-Y') }} </li>
                                
                            </ul>
                        </div>
                        <div class="blog__hero__text">
                            <ul>
                              <li>
                                <a href="{{ route('articles') }}" class="text-primary" >  Articles </a> 
                              </li>
                              <li>
                                {{ $article->category->title }}
                              </li>
                              <li>
                                {{ $article->title }}
                              </li>
                            </ul>
                        </div>
                        <div class="clear row marginbtm30">
                            <div class="col-sm-12 col-md-12 hidden-xs catg-icon-img">
                                <img class="img-responsive catg-icon"
                                    src="{{ $article->getFirstMediaUrl('article_main_photo', 'thumb') }}" alt="">

                                <p class="adv-para">
                                    {!! substr($article->long_description,0,300)  !!} <small>  <a href="" class="text-primary"> Read More </a> </small>
                                </p>

                                <p>
                                    <button class="btn btn-info btn-sm">
                                        PURCHASE PACKAGE TO CONTINUE TO READ
                                    </button>
                                </p>
                            </div>
                            <div class="clear row marginbtm30">
                                <div class="col-xs-6 col-sm-6 col-md-6 previous-btn">
                                    <a href="" class="blog__details__btns__item">
                                        <p><span class="arrow_left"></span> Previous</p>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 next-btn">
                                    <a href="" class="blog__details__btns__item blog__details__btns__item--next">
                                        <p>Next <span class="arrow_right"></span></p>
                                    </a>
                                </div>
                            </div>

                            <!-- Comments Box -->
                            <div class="col-md-12" id="fbcomment">

                                <div class="header_comment">
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <h3>User Comments</h3>
                                        </div>

                                    </div>
                                </div>

                                <div class="body_comment">
                                    <div class="row">
                                        <div class="avatar_comment col-md-1">
                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg"
                                                alt="avatar">
                                        </div>
                                        <div class="box_comment col-md-11">
                                            <textarea class="commentar" placeholder="Add a comment..."></textarea>
                                            <div class="box_post">
                                                <div class="pull-right">
                                                    <button onclick="submit_comment()" type="button"
                                                        value="1">Post</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <ul id="list_comment" class="col-md-12">
                                            <!-- Start List Comment 1 -->
                                            <li class="box_result row">
                                                <div class="avatar_comment col-md-1">
                                                    <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg"
                                                        alt="avatar">
                                                </div>
                                                <div class="result_comment col-md-11">
                                                    <h4>Nath Ryuzaki</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's.</p>
                                                    <div class="tools_comment">
                                                        <a class="replay" href="#">Reply</a>

                                                    </div>
                                                    <ul class="child_replay">
                                                        <li class="box_reply row">
                                                            <div class="avatar_comment col-md-1">
                                                                <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg"
                                                                    alt="avatar">
                                                            </div>
                                                            <div class="result_comment col-md-11">
                                                                <h4>Sugito</h4>
                                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                                    typesetting industry. Lorem Ipsum has been the
                                                                    industry's.</p>
                                                                <div class="tools_comment">

                                                                    <a class="replay" href="#">Reply</a>

                                                                </div>
                                                                <ul class="child_replay"></ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <!-- Start List Comment 2 -->
                                            <li class="box_result row">
                                                <div class="avatar_comment col-md-1">
                                                    <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg"
                                                        alt="avatar">
                                                </div>
                                                <div class="result_comment col-md-11">
                                                    <h4>Gung Wah</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's.</p>
                                                    <div class="tools_comment">
                                                        <a class="replay" href="#">Reply</a>

                                                    </div>
                                                    <ul class="child_replay"></ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <button class="show_more" type="button">Load 10 more comments</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Comments end here -->
                            <div class="blog__details__share">
                                <span>share</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-3 col-sm4 col-md-3 pdltrt-xs-none">
                    <div class="view-more-block">
                        <h5 class="view-text">Latest Trade News</h5>
                        <ul class="art-links">
                            <li><a href="#">Technical Articles</a></li>
                            <li><a href="#">Market Forecasts</a></li>
                            <li><a href="#">Upcomming Research</a></li>
                            <li><a href="#">Working Papers</a></li>
                            <li><a href="#">Industry Insights</a></li>
                        </ul>
                    </div>
                </div>
                </div>

            </div>
    </section>


@endsection
