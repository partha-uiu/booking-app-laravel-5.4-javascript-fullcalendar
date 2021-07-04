<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - {{ config('app.name') }}</title>
        <link rel="apple-touch-icon" sizes="57x57" href="{{ url('images/favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ url('images/favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ url('images/favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ url('images/favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ url('images/favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ url('images/favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ url('images/favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ url('images/favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ url('images/favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ url('images/favicons/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url('images/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ url('images/favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('images/favicons/favicon-16x16.png') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ url('images/favicons/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        @yield('styles')

    </head>
    <body data-spy="scroll" data-target=".inner-link" data-offset="60">
        <main>
            @include('common.preloader')
            @include('common.top-nav')
            @include('common.page-header')
            @yield('content')
            @include('common.footer')
        </main>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        @yield('scripts')

    </body>
</html>