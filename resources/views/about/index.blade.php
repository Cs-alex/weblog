@extends('app')

@section('content')
        <link rel="stylesheet" href="{{asset('css/about.css')}}">
    </head>
    <body class="{{$data['scheme']->color_scheme == null ? 'body-scheme-0' : 'body-'.$data['scheme']->color_scheme}}">
        <div class="container-fluid text-center">
            @include('header')
            <main>
                <div class="row">
                    <div class="col-7">
                        <article class="{{$data['scheme']->color_scheme == null ? 'scheme-0' : $data['scheme']->color_scheme}}">
                            <div class="row">
                                <div class="col-12 title {{$data['scheme']->color_scheme == null ? 'text-large-scheme-0' : 'text-large-'.$data['scheme']->color_scheme}}">Csende Bálint Alex</div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-small {{$data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme}}">Programozó & Fejlesztő</div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="poem">
                                        <p class="text-small {{$data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme}}"><i class="fas fa-quote-left mr-2"></i>Adott, egy kezdet,</p>
                                        <p class="text-small {{$data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme}}">Karma, méltó s mostoha,</p>
                                        <p class="text-small {{$data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme}}">Hagyd, csak egyet tegyél!</p>
                                        <p class="text-small {{$data['scheme']->color_scheme == null ? 'text-small-scheme-0' : 'text-small-'.$data['scheme']->color_scheme}}">Küzdj, s bízva bízzál!<i class="fas fa-quote-right ml-2"></i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{asset('img/divider.png')}}" class="w-100 my-4 px-3">
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
                        </article>
                    </div>
                    <div class="col-5">
                        <article class="intro" id="self"></article>
                    </div>
                </div>
            </main>
        </div>
        @include('footer')
@endsection