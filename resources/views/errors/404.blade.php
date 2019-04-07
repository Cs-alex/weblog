@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ asset('public/css/error.css') }}">
    </head>
    <!-- $data['scheme']->color_scheme == null ? 'body-scheme-0' : 'body-'.$data['scheme']->color_scheme -->
    <body class="">
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