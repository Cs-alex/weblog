@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ secure_asset('css/error.css') }}">
    </head>
    <body class="{{ Session::has('scheme') ? 'body-'.Session::get('scheme') : 'body-scheme-0' }}">
        <div class="container-fluid text-center">
            <main>
                <div class="error-wrapper">
                    <div class="poem">
                        <p class="text-small-scheme-0"><i class="fas fa-quote-left mr-4"></i>@lang('error.poem_row_1')</p>
                        <p class="text-small-scheme-0">@lang('error.poem_row_2')</p>
                        <p class="text-small-scheme-0">@lang('error.poem_row_3')</p>
                        <p class="text-small-scheme-0">@lang('error.poem_row_4')<i class="fas fa-quote-right ml-4"></i></p>
                    </div>
                    <h1>@lang('error.error_text')</h1>
                </div>
            </main>
        </div>
@endsection