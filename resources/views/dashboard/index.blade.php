@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ secure_asset('css/dashboard.css') }}">
        <script type="text/javascript" src="{{ secure_asset('js/dashboard.js') }}"></script>
    </head>
    <body class="{{ $data['scheme']->color_scheme == null ? 'body-scheme-0' : 'body-'.$data['scheme']->color_scheme }}">
        <div class="container-fluid text-center">
            @include('header')
            <main>
                <div class="col-12">
                    @if (empty($data['article']))
                        <h1 class="{{ $data['scheme']->color_scheme == null ? 'text-large-scheme-0' : 'text-large-'.$data['scheme']->color_scheme }}">@lang('dashboard.not_found')</h1>
                    @else
                        <div id="select" class="row {{ $data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme }}">
                            <div class="select-items {{ $data['scheme']->color_scheme == null ? 'search-scheme-0' : 'search-'.$data['scheme']->color_scheme }}">
                                <span>@lang('dashboard.newest')</span>
                                <i class="fas fa-angle-down select-arrow"></i>
                            </div>
                            <div id="options" class="hidden">
                                <a href="<?php echo URL::to('/'); ?>/{{ $data['lang'] }}/newest" class="option {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}" data-option="newest">@lang('dashboard.newest')</a>
                                <a href="<?php echo URL::to('/'); ?>/{{ $data['lang'] }}/favorite" class="option  {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}" data-option="favorite">@lang('dashboard.favorite')</a>
                                <a href="<?php echo URL::to('/'); ?>/{{ $data['lang'] }}/most-viewed" class="option {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}" data-option="most-viewed">@lang('dashboard.most_viewed')</a>
                            </div>
                        </div>
                        @foreach ($data['article'] as $article)
                            <article class="row {{ $data['scheme']->color_scheme == null ? 'scheme-0' : $data['scheme']->color_scheme }}">
                                <div class="col-4 article-small-img">
                                    <img src="<?php echo URL::to('/').'/'; ?>{{ $article->img }}">
                                </div>
                                <div class="col-8 article-wrapper text-left">
                                    <div>
                                        <a href="<?php echo URL::to('/').'/'; ?>{{ $data['lang'] }}/article/{{ $data['lang'] == 'hu' ? $article->seo_hu : $article->seo_en }}" class="title {{ $data['scheme']->color_scheme == null ? 'text-large-scheme-0' : 'text-large-'.$data['scheme']->color_scheme }}">{{ $data['lang'] == 'hu' ? $article->title_hu : $article->title_en }}</a>
                                    </div>
                                    <p>{{ $article->txt }}</p>
                                    <div>
                                        <div class="article-buttons-left">
                                            <span class="text-small {{ $data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme }}">{{ str_replace('-', '.', $article->created_at) }}</span>
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
                                                <span class="disqus-comment-count" data-disqus-url="http://localhost/WeBlog/articles/article/{{ $article->seo_hu }}"></span>
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