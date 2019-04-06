@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
    </head>
    <body class="{{ $data['scheme']->color_scheme == null ? 'body-scheme-0' : 'body-'.$data['scheme']->color_scheme }}">
        <div class="container-fluid text-center">
            @include('header')
            <main>
                <div class="col-12">
                    @if ($data['article']->isEmpty())
                        <h1 class="{{ $data['scheme']->color_scheme == null ? 'text-large-scheme-0' : 'text-large-'.$data['scheme']->color_scheme }}">Nincs találat</h1>
                    @else
                        <div id="select" class="row {{ $data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme }}">
                            <div class="select-items {{ $data['scheme']->color_scheme == null ? 'search-scheme-0' : 'search-'.$data['scheme']->color_scheme }}">
                                <span>Legújabb</span>
                                <i class="fas fa-angle-down select-arrow"></i>
                            </div>
                            <div id="options" class="hidden">
                                <a href="<?php echo URL::to('/'); ?>/newest" class="option {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}" data-option="newest">Legújabb</a>
                                <a href="<?php echo URL::to('/'); ?>/favorite" class="option  {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}" data-option="favorite">Legkedveltebb</a>
                                <a href="<?php echo URL::to('/'); ?>/most-viewed" class="option {{ $data['scheme']->color_scheme == null ? 'menu-scheme-0' : 'menu-'.$data['scheme']->color_scheme }}" data-option="most-viewed">Leglátogatottabb</a>
                            </div>
                        </div>
                        @foreach ($data['article'] as $article)
                            <article class="row {{ $data['scheme']->color_scheme == null ? 'scheme-0' : $data['scheme']->color_scheme }}">
                                <div class="col-4 article-small-img">
                                    <img src="<?php echo URL::to('/').'/'; ?>{{ $article->component[1]->article_image }}">
                                </div>
                                <div class="col-8 article-wrapper text-left">
                                    <div>
                                        <a href="<?php echo URL::to('/').'/'; ?>article/{{ $article->seo }}" class="title {{ $data['scheme']->color_scheme == null ? 'text-large-scheme-0' : 'text-large-'.$data['scheme']->color_scheme }}">{{ $article->title }}</a>
                                    </div>
                                    <p>{{ $article->component[0]->article_text }}</p>
                                    <div>
                                        <div class="article-buttons-left">
                                            <span class="text-small {{ $data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme }}">{{ str_replace('-', '.', $article->created_at) }}</span>
                                        </div>
                                        <div class="article-buttons-right">
                                            <div class="d-inline count">
                                                <i class="fas fa-thumbs-up"></i>
                                                <span>{{ $article->vote->where('upvote', '=', 1)->count('upvote') == null ? 0 : $article->vote->where('upvote', '=', 1)->count('upvote') }}</span>
                                            </div>
                                            <div class="d-inline count">
                                                <i class="fas fa-thumbs-down"></i>
                                                <span>{{ $article->vote->where('downvote', '=', 1)->count('downvote') == null ? 0 : $article->vote->where('downvote', '=', 1)->count('downvote') }}</span>
                                            </div>
                                            <div class="d-inline count">
                                                <i class="fas fa-comment-alt"></i>
                                                <span class="disqus-comment-count" data-disqus-url="http://localhost/WeBlog/articles/article/{{ $article->seo }}"></span>
                                            </div>
                                            <div class="d-inline count">
                                                <i class="fas fa-eye"></i>
                                                <span>{{ $article->visitor == null ? 0 : $article->visitor->count() }}</span>
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