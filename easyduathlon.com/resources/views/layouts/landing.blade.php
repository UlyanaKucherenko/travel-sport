<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'easyduathlon') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/main.css?ver={{filemtime('css/main.css')}}" async>
</head>
<body>

<div id="app">
    @include('layouts.menu-landing', [
        "isLogin" => $isLogin,
        "routes" => $routes,
        "locale" => $locale,
    ])

    @yield('content')

    @include('layouts.footer')
</div>

    <script src="/js/app.js?ver={{filemtime('js/app.js')}}"></script>

</body>
</html>
