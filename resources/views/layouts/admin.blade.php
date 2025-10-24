<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO -->
    <meta name="og:site_name" content="Annahdha Admin Panel">
    <title>Annahdha Admin Panel</title>
    <meta name="og:title" content="Annahdha Admin Panel">
    <meta name="og:description" content="Annahdha Admin Panel">
    <meta name="description" content="Annahdha Admin Panel">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="og:type" content="website" />
    <meta name="og:url" content="{{env('APP_URL')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">

    <!-- styles & scripts -->
    @filamentStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
    @stack('styles')
    <script rel="prefetch" src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body class="font-dm-sans antialiased" data-mode="light">
    <div class="w-full min-h-screen bg-zinc-50">
        <x-admin.sidebar />

        <x-admin.header />
        
        <!-- Page Content -->
        <div class="px-2 sm:px-4 pt-4 pb-8 lg:ml-72">
            <div class="container mx-auto">
                <x-alert />

                <main class="w-full"> 
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @filamentScripts
    @stack('scripts')
</body>
</html>