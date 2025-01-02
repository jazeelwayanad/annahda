<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Annahdha - {{$title ?? ""}}</title>
    <meta name="robots" content="noindex, nofollow" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="w-fulll min-h-screen bg-primary-200 flex items-center justify-center">
        <div class="w-full max-w-sm bg-white flex flex-col justify-center px-6 py-12 lg:px-8 rounded-xl shadow-lg">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="{{asset('assets/annahda-logo.svg')}}" alt="Annahda">
                <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-gray-900">{{ $title }}</h2>
            </div>
            @session('error')    
            <div class="p-4 mt-10 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Error!</span> {{session('error')}}
            </div>
            @endsession
            <div class="w-full max-w-sm mx-auto">
                {{$slot}}
            </div>
        </div>  
    </div>
</body>
</html>