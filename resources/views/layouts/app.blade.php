<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Imports --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fl-bigmug-line.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="site-loader"></div>
    <div id="app site-wrap">
        
        @include('layouts.header')
        {{-- slider --}}
        @yield('content')
        @include('layouts.footer')
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/mediaelement-and-player.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>