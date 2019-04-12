<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>WeBlog</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/flags/flag-icon.css')}}">
        <link rel="stylesheet" href="{{asset('css/fontawesome/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('css/__base.css')}}">
        <link rel="icon" type="image/png" href="{{asset('img/smallicon.png')}}">
        <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/__base.js')}}"></script>
        @yield('content')
        <script id="dsq-count-scr" src="//http-localhost-weblog.disqus.com/count.js" async></script>
    </body>
</html>