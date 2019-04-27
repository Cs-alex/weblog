@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ secure_asset('css/dashboard.css') }}">
        <script type="text/javascript" src="{{ secure_asset('js/dashboard.js') }}"></script>
    </head>
    <body class="{{ session('scheme') == null ? 'body-scheme-0' : 'body-'.session('scheme') }}">
        <div class="container-fluid text-center">
            @include('header')
            <main>
                <div class="col-12">
                    @if (empty($data['article']))
                        <h1 class="{{ session('scheme') == null ? 'text-large-scheme-0' : 'text-large-'.session('scheme') }}">@lang('dashboard.not_found')</h1>
                    @else
                        <div id="select" class="row {{ session('scheme') == null ? 'text-small-scheme-0' : 'text-small-'.session('scheme') }}">
                            <div class="select-items {{ session('scheme') == null ? 'search-scheme-0' : 'search-'.session('scheme') }}">
                                <span>@lang('dashboard.newest')</span>
                                <i class="fas fa-angle-down select-arrow"></i>
                            </div>
                            <div id="options" class="hidden">
                                <a href="<?php echo URL::to('/'); ?>/{{ session('lang') }}/newest" class="option {{ session('scheme') == null ? 'menu-scheme-0' : 'menu-'.session('scheme') }}" data-option="newest">@lang('dashboard.newest')</a>
                                <a href="<?php echo URL::to('/'); ?>/{{ session('lang') }}/favorite" class="option  {{ session('scheme') == null ? 'menu-scheme-0' : 'menu-'.session('scheme') }}" data-option="favorite">@lang('dashboard.favorite')</a>
                                <a href="<?php echo URL::to('/'); ?>/{{ session('lang') }}/most-viewed" class="option {{ session('scheme') == null ? 'menu-scheme-0' : 'menu-'.session('scheme') }}" data-option="most-viewed">@lang('dashboard.most_viewed')</a>
                            </div>
                        </div>
                        @foreach ($data['article'] as $article)
                            <article class="row {{ session('scheme') == null ? 'scheme-0' : session('scheme') }}">
                                <div class="col-xl-3 col-lg-4 col-md-6 article-small-img">
                                    <img src="<?php echo URL::to('/').'/'; ?>{{ $article->img }}">
                                </div>
                                <div class="col-xl-9 col-lg-8 col-md-6 article-wrapper text-left">
                                    <div class="title-div">
                                        <a href="<?php echo URL::to('/').'/'; ?>{{ session('lang') }}/article/{{ session('lang') == 'hu' ? $article->seo_hu : $article->seo_en }}" class="title {{ Session::get('scheme') == null ? 'text-large-scheme-0' : 'text-large-'.Session::get('scheme') }}">{{ session('lang') == 'hu' ? $article->title_hu : $article->title_en }}</a>
                                    </div>
                                    <p class="article-text">{{ (strlen($article->txt) < 550 ? $article->txt : preg_replace('/\W\w+\s*(\W*)$/', '...', substr($article->txt, 0, 550))) }}</p>
                                    <div class="article-buttons d-flex">
                                        <div class="article-buttons-left">
                                            <span class="text-small {{ session('scheme') == null ? 'text-small-scheme-0' : 'text-small-'.session('scheme') }}">{{ str_replace('-', '.', $article->created_at) }}</span>
                                        </div>
                                        <div class="article-buttons-right">
                                            <div class="d-inline count">
                                                <i class="fas fa-thumbs-up"></i>
                                                <span>{{ (isset($article->upvote) ? $article->upvote : 0) }}</span>
                                            </div>
                                            <div class="d-inline count">
                                                <i class="fas fa-thumbs-down"></i>
                                                <span>{{ (isset($article->downvote) ? $article->downvote : 0) }}</span>
                                            </div>
                                            <div class="d-inline count">
                                                <i class="fas fa-comment-alt"></i>
                                                <span class="disqus-comment-count" data-disqus-url="https://csalex-weblog.herokuapp.com/hu/article/{{ session('lang') == 'hu' ? $article->seo_hu : $article->seo_en }}"></span>
                                            </div>
                                            <div class="d-inline count">
                                                <i class="fas fa-eye"></i>
                                                <span>{{ (isset($article->visitor) ? $article->visitor : 0) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif
                </div>
            </main>
        </div>
        @include('footer')
@endsection