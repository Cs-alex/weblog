@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
        <script type="text/javascript" src="{{ asset('js/articles.js') }}"></script>
    </head>
    <body class="{{ $data['scheme']->color_scheme == null ? 'body-scheme-0' : 'body-'.$data['scheme']->color_scheme }}">
        <div class="container-fluid text-center">
            @include('header')
            <main>
                <article class="{{ $data['scheme']->color_scheme == null ? 'scheme-0' : $data['scheme']->color_scheme }}">
                    <div class="row mb-3 mt-3">
                        <div class="col-12">
                            <h1 class="title {{ $data['scheme']->color_scheme == null ? 'text-large-scheme-0' : 'text-large-'.$data['scheme']->color_scheme }}">{{ $data['article']->title }}</h1>
                        </div>
                    </div>
                    @foreach ($data['article']->component as $components)
                        @if ($components->component_type == 'p')
                            <div class="row mb-3 mt-3">
                                <div class="col-12">
                                    <p class="article-text">{{$components->article_text}}</p>
                                </div>
                            </div>
                        @elseif ($components->component_type == 'img' && $components->article_order != 0)
                            <div class="row mb-3 mt-3">
                                <div class="article-img">
                                    <img src="<?php echo URL::to('/').'/'; ?>{{ $components->article_image }}">
                                    {!! $components->image_seo != null ? '<span class="text-small font-italic text-small-'.$data['scheme']->color_scheme.'">'.$components->image_seo.'</span>' : '' !!}
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="row">
                        <div class="col-6">
                            <div class="article-buttons">
                                <div class="article-buttons-left">
                                    <!-- Like -->
                                    <button class="article-btn upvote {{ $data['vote']->upvote == true ? 'upvoted' : '' }}">
                                        <i class="fas fa-arrow-up"></i>
                                    </button>
                                    <span class="upvote-count">{{ $data['vote']->upvote == null ? 0 : $data['vote']->upvote }}</span>
                                    <!-- Dislike -->
                                    <button class="article-btn downvote {{ $data['vote']->downvote == true ? 'downvoted' : '' }}">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <span class="downvote-count">{{ $data['vote']->downvote == null ? 0 : $data['vote']->downvote }}</span>
                                    <!-- Comment -->
                                    <div class="article-btn comments" id="new-article-comment">
                                        <i class="fas fa-comment-alt"></i>
                                    </div>
                                    <span class="comment-count disqus-comment-count" data-disqus-url="http://localhost/WeBlog/articles/article/{{ $data['article']->seo }}"></span>
                                    <!-- Látogatók -->
                                    <div class="article-btn visitors">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <span class="visitor-count">{{ $data['visitor'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <span class="text-small {{ $data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme }}">{{ str_replace('-', '.', $data['article']->created_at) }}</span>
                        </div>
                        <div class="w-100">
                            <img src="{{ asset('img/divider.png') }}">
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