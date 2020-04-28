@extends('layouts.frontend')

@section('content')   

<div class="content-wrapper">

    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $latest_post->featured }}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{ $latest_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{ route('post.single', ['slug' => $latest_post->slug ]) }}">{{ str_limit($latest_post->title, 30) }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $latest_post->created_at->toFormatteddatestring() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="fa fa-th"></i>
                                            <a href="{{ route('category.single', ['slug' => $latest_post->category->slug]) }}">{{ $latest_post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                                            {{ $latest_post->created_at->diffForHumans() }}
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $second_post->featured }}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{ $second_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{ route('post.single', ['slug' => $second_post->slug ]) }}">{{ str_limit($second_post->title, 20) }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $second_post->created_at->toFormatteddatestring() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="fa fa-th"></i>
                                            <a href="{{ route('category.single', ['slug' => $second_post->category->slug]) }}">{{ $second_post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                                            {{ $second_post->created_at->diffForHumans() }}
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $third_post->featured }}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{ $third_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{ route('post.single', ['slug' => $third_post->slug ]) }}">{{ str_limit($third_post->title, 25) }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $third_post->created_at->toFormatteddatestring() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="fa fa-th"></i>
                                            <a href="{{ route('category.single', ['slug' => $third_post->category->slug]) }}">{{ $third_post->category->name }}</a>
                                        </span>


                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                                            {{ $third_post->created_at->diffForHumans() }}
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $latest_category->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
            @foreach($latest_category->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                        <div class="case-item-wrap">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured }}" alt="Image">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('post.single', ['slug' => $post->slug ]) }}">{{ $post->title }}</a></h6>
                                </div>
                            </div>

                        </div>
            @endforeach
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $second_category->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
            @foreach($second_category->posts()->orderBy('created_at', 'desc')->take(3)->get() as $post)
                        <div class="case-item-wrap">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured }}" alt="Image">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('post.single', ['slug' => $post->slug ]) }}">{{ $post->title }}</a></h6>
                                </div>
                            </div>
                        </div>
            @endforeach
                    </div>
                </div>
                <div class="padded-50"></div>
                
            </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('styletoast')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
@stop

@section('scripttoast')
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}")  
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")  
        @endif
    </script>

@stop


