@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ secure_asset('css/about.css') }}">
    </head>
    <body class="{{ $data['scheme']->color_scheme == null ? 'body-scheme-0' : 'body-'.$data['scheme']->color_scheme }}">
        <div class="container-fluid text-center">
            @include('header')
            <main>
                <div class="row">
                    <div class="col-12">
                        <article class="{{ $data['scheme']->color_scheme == null ? 'scheme-0' : $data['scheme']->color_scheme }}">
                            <div class="row">
                                <div class="col-12 title {{ $data['scheme']->color_scheme == null ? 'text-large-scheme-0' : 'text-large-'.$data['scheme']->color_scheme }}">@lang('about.name')</div>
                            </div>
                            <div class="row">
                                <div class="col-12 profession {{ $data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme }}">@lang('about.profession')</div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="poem {{ $data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme }}">
                                        <p class=""><i class="fas fa-quote-left mr-2"></i>Adott, egy kezdet,</p>
                                        <p class="">Karma, méltó s mostoha,</p>
                                        <p class="">Hagyd, csak egyet tegyél!</p>
                                        <p class="">Küzdj, s bízva bízzál!<i class="fas fa-quote-right ml-2"></i></p>
                                    </div>
                                </div>
                                <img src="{{ asset('public/img/divider-'.$data['scheme']->color_scheme.'.png') }}" class="divider mx-auto mt-4 mb-2">
                            </div>
                            <div class="row">
                                <div class="col-12 {{ $data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme }}">
                                    <h2 class="about display-4 mb-4">Rólam</h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="intro-text">
                                                2016 óta programozással foglalkozom. Kezdetben ez csak egy hobbi volt számomra, de később elhatároztam hogy ebből is szeretnék megélni.
                                                Nem volt egyszerű. Munka mellett elvégeztem egy tanfolyamot, és szinte minden szabadidőmet arra fordítottam, hogy gyakoroljam azt,
                                                amit már tudtam, és közben tanuljak valami újat is. Ez ma sincs máshogy, ami nem baj, hisz mindannyian tudjuk: a jó pap is holtáig tanul.
                                            </p>
                                            <p class="intro-text">
                                                Ma már ott tartok, hogy képes voltam létrehozni ezt a blogot, és számos munkahelyem is volt mint webprogramozó. Mint fentebb említettem,
                                                nem volt könnyű. De elmoondhatom, megérte. A hobbim a munkám, s ezáltal szeretem a munkámat.
                                            </p>
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