<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') &mdash; {{ config('app.name') }}</title>

    <link rel="icon" href="{{ asset('assets/icon.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/icon.jpg') }}">

    <!-- Scripts -->
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script> --}}
</head>
