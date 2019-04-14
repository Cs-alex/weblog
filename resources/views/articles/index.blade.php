@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ secure_asset('css/articles.css') }}">
        <script type="text/javascript" src="{{ secure_asset('js/articles.js') }}"></script>
    </head>
    <body class="{{ session('scheme') == null ? 'body-scheme-0' : 'body-'.session('scheme') }}">
        <div class="container-fluid text-center">
            @include('header')
            <main>
                <article class="{{ session('scheme') == null ? 'scheme-0' : session('scheme') }}">
                    <div class="row mb-3 mt-3">
                        <div class="col-12">
                            <h1 class="title {{ session('scheme') == null ? 'text-large-scheme-0' : 'text-large-'.session('scheme') }}">{{ session('lang') == 'hu' ? $data['article']->title_hu : $data['article']->title_en }}</h1>
                        </div>
                    </div>
                    @foreach ($data['article']->component as $components)
                        @if ($components->component_type == 'p')
                            <div class="row mb-3 mt-3">
                                <div class="col-12">
                                    <p class="article-text">{{ session('lang') == 'hu' ? $components->article_text_hu : $components->article_text_en }}</p>
                                </div>
                            </div>
                        @elseif ($components->component_type == 'img' && $components->article_order != 0)
                            <div class="row mb-3 mt-3">
                                <div class="article-img">
                                    <img src="<?php echo URL::to('/').'/'; ?>{{ $components->article_image }}">
                                    {!! (session('lang') == 'hu' ? $components->image_seo_hu : $components->image_seo_en) != null ? '<span class="text-small font-italic text-small-'.session('scheme').'">'.(session('lang') == 'hu' ? $components->image_seo_hu : $components->image_seo_en).'</span>' : '' !!}
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <div class="article-buttons">
                                <div class="article-buttons-left">
                                    <!-- Like -->
                                    <button class="article-btn upvote {{ $data['vote']->upvote == true ? 'upvoted' : '' }}">
                                        <i class="fas fa-arrow-up"></i>
                                    </button>
                                    <span class="upvote-count">{{ $data['upvote']->upvote == null ? 0 : $data['upvote']->upvote }}</span>
                                    <!-- Dislike -->
                                    <button class="article-btn downvote {{ $data['vote']->downvote == true ? 'downvoted' : '' }}">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <span class="downvote-count">{{ $data['downvote']->downvote == null ? 0 : $data['downvote']->downvote }}</span>
                                </div>
                                <div class="article-buttons-right">
                                    <!-- Comment -->
                                    <div class="article-btn comments" id="new-article-comment">
                                        <i class="fas fa-comment-alt"></i>
                                    </div>
                                    <span class="comment-count disqus-comment-count" data-disqus-url="http://localhost/weblog/article/{{ $data['article']->seo_hu }}"></span>
                                    <!-- Látogatók -->
                                    <div class="article-btn visitors">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <span class="visitor-count">{{ $data['visitor']->visitor }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12 date">
                            <span class="text-small {{ session('scheme') == null ? 'text-small-scheme-0' : 'text-small-'.session('scheme') }}">{{ str_replace('-', '.', $data['article']->created_at) }}</span>
                        </div>
                        <div class="w-100">
                            <img src="{{ asset('public/img/divider-'.(session('scheme') == null ? 'scheme-0' : session('scheme')).'.png') }}" class="divider">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="article-comment-wrapper"></div>
                        </div>
                    </div>
                    <div id="disqus_thread"></div>
                </article>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </main>
        </div>
        @include('footer')
@endsection