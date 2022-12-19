<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.partials.head')
    @include('admin.partials.style')
</head>

<body>

<main>
    @yield('content')
</main>

@include('admin.partials.script')
@include('admin.partials.notif')
</body>

</html>
