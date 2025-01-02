<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @filamentStyles
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <x-app.header />

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-6">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @filamentScripts
        @vite('resources/js/app.js')
        <script type="module">
            $(document).ready(function(){
                $('#sidebar-button').on('click', function(){
                    $('#sidebar-multi-level-sidebar').addClass('translate-x-0');
                });
    
                $('#user-menu-button').on('click', function(){
                    $('#user-dropdown').toggleClass('hidden');
                });
                $('#notifications-button').on('click', function(){
                    $('#notifications-dropdown').toggleClass('hidden');
                });
                $(document).click(function(event) {
                    if (!$(event.target).closest('#sidebar-button, #sidebar-multi-level-sidebar').length) {
                        $('#sidebar-multi-level-sidebar').removeClass('translate-x-0');
                    }
                    if (!$(event.target).closest('#user-menu-button, #user-dropdown').length) {
                        $('#user-dropdown').addClass('hidden');
                    }
                    if (!$(event.target).closest('#notifications-button, #notifications-dropdown').length) {
                        $('#notifications-dropdown').addClass('hidden');
                    }
                });
            })
        </script>
    </body>
</html>
