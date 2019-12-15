<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sigeef') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<body>
<div id="app">
    <main class="p-0">
        <div class="container-fluid shadow bg-image">
            @include('layouts.messages.messages')
            @yield('content')
        </div>
    </main>
    <footer class="bg-primary" style=" max-height: 45px; min-height: 38px;">
        <div class="row mr-0">
            <div class="col-md-12 bg-primary text-center shadow">
                <div class="text-white text-center ">Copyright © 2019 Sigeef | Medellín - Colombia.
                </div>
            </div>
        </div>
    </footer>
</div>

</body>
</html>