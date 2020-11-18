<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Chocoloco')</title>

    <!-- Scripts -->

    <script src="{{ asset('/css/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('/css/styles/bootstrap-4.1.2/popper.js')}}"></script>
    <script src="{{ asset('/css/styles/bootstrap-4.1.2/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/css/plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{ asset('/css/plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{ asset('/css/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{ asset('/css/plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{ asset('/css/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{ asset('/css/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{ asset('/css/plugins/easing/easing.js')}}"></script>
    <script src="{{ asset('/css/plugins/progressbar/progressbar.min.js')}}"></script>
    <script src="{{ asset('/css/plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{ asset('/css/js/custom.js')}}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito" >

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles/bootstrap-4.1.2/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles/comun.css')}}">
    <style>
        html, body {
            background-color:white;
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.nav',['route'=>'news'])
        <main class="py-4" style="margin-top: 80px;margin-bottom: 80px;">
            @yield('content')
        </main>
    </div>
</body>
@include('layouts.footer')
</html>
