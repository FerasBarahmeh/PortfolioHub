<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- Facebook and Twitter integration  --}}
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <title>{{ config('app.name', 'FerasBarahmeh') }}</title>

    <link rel="icon" href="{{ asset('guest/images/my-avatar.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">


    {{-- css --}}
    @include('layouts.guest.css-links')
    @stack('style')


{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
{{--    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>--}}
</head>

    <body id="body">
        {{ $slot }}

        @include('layouts.guest.js-scripts')
    </body>
</html>
