@extends('app')

@section('content')
        <link rel="stylesheet" href="{{ asset('public/css/dashboard.css') }}">
        <script type="text/javascript" src="{{ asset('public/js/dashboard.js') }}"></script>
    </head>
    <body class="">
        <div class="container-fluid text-center">
		{{print_r($data)}}
            hello
        </div>
        @include('footer')
@endsection