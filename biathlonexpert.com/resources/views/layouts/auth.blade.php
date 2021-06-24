<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'biathlonexpert') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/main.css?ver={{filemtime('css/main.css')}}" async>
</head>
<body>
    @yield('content')

    @include('layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('libs/slick/slick.js') }}"></script>
    <script src="{{ asset('libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/select_plan.js') }}"></script>

</body>
</html>
