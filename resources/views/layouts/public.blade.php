<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="og:site_name" content="Annahdha">
    <title>Annahda</title>
    <meta name="og:title" content="Annahdha">
    <meta name="og:description" content="Annahdha">
    <meta name="description" content="Annahdha">
    <meta name="robots" content="index, follow" />
    <meta name="og:type" content="website" />
    <meta name="og:url" content="{{ env('APP_URL') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')
    @yield('styles')
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="w-full max-w-7xl mx-auto">
        <x-header />

        <div class="w-full py-4">
            {{ $slot }}
        </div>

        <x-footer />
    </div>

    @vite('resources/js/app.js')
    @yield('scripts')
</body>
</html>