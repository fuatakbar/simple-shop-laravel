<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Simple Shop') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('components.navbar')
    <div class="logo text-center">
        <a href="{{url('/')}}">
            <img src="{{asset('logo.png')}}" alt="Simple Shop Logo" class="img-fluid">
        </a>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
    @include('components.footer')
</div>
</body>
</html>
