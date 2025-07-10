<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="og:site_name" content="Annahdha">
    <title>{{ $page->meta_title ? $page->meta_title : "Annahda"}}</title>
    <meta name="og:title" content="{{ $page->og_title ? $page->og_title : $page->meta_title}}">
    <meta name="og:description" content="{{ $page->og_description ? $page->og_description : $page->meta_description}}">
    <meta name="description" content="{{ $page->meta_description ? $page->meta_description : "Annahda"}}">
    <meta name="robots" content="index, follow" />
    <meta name="og:type" content="website" />
    <meta name="og:url" content="{{env('APP_URL')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <x-header />
    
    {{-- featured post --}}
    

    <x-footer />
</body>
</html>