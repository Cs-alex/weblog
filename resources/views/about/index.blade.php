@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ secure_asset('css/about.css') }}">
    </head>
    <body class="{{ session('scheme') == null ? 'body-scheme-0' : 'body-'.session('scheme') }}">
        <div class="container-fluid text-center">
            @include('header')
            <main>
                <div class="row">
                    <div class="col-12">
                        <article class="{{ session('scheme') == null ? 'scheme-0' : session('scheme') }}">
                            <div class="row">
                                <div class="col-12 title {{ session('scheme') == null ? 'text-large-scheme-0' : 'text-large-'.session('scheme') }}">@lang('about.name')</div>
                            </div>
                            <div class="row">
                                <div class="col-12 profession {{ session('scheme') == null ? 'text-small-scheme-0' : 'text-small-'.session('scheme') }}">@lang('about.profession')</div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="poem {{ session('scheme') == null ? 'text-small-scheme-0' : 'text-small-'.session('scheme') }}">
                                        <p><i class="fas fa-quote-left mr-2"></i>@lang('about.poem_1')</p>
                                        <p>@lang('about.poem_2')</p>
                                        <p>@lang('about.poem_3')</p>
                                        <p>@lang('about.poem_4')<i class="fas fa-quote-right ml-2"></i></p>
                                    </div>
                                </div>
                                <img src="{{ asset('public/img/divider-'.(session('scheme') == null ? 'scheme-0' : session('scheme')).'.png') }}" class="divider mx-auto mt-4 mb-2">
                            </div>
                            <div class="row">
                                <div class="col-12 {{ session('scheme') == null ? 'text-small-scheme-0' : 'text-small-'.session('scheme') }}">
                                    <h2 class="about display-4 mb-4">Rólam</h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="intro-text">@lang('about.text_1')</p>
                                            <p class="intro-text">@lang('about.text_2')</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </main>
        </div>
        @include('footer')
@endsection