<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Solutech') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm ">
        <div class="container">

            <a class="navbar-brand" href="{{ action('HomeController@index') }}">
                <img src="https://solutechsystem.co/wp-content/uploads/2019/05/logo-web-nuevo-ok.png" data-at2x="https://solutechsystem.co/wp-content/uploads/2019/05/logo-web-nuevo-big.png" alt="Solutech System | Soporte Técnico Integral" class="logo-mobile" style="max-width: 80px;">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            @include('layouts.topbar')
        </div>
    </nav>

    <main class="py-3">
        <div class="container">
            @include('layouts.messages.messages')
            @yield('content')
        </div>
    </main>
</div>

</body>
</html>
