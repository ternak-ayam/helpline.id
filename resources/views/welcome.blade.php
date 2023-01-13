<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

        <title>{{ config('app.name') }}</title>
        <link rel="icon" href="{{ asset('assets/icon.jpg') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/icon.jpg') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        <div id="app"></div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
