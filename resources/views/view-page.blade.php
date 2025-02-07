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
    <section class="w-full py-8 mt-6 bg-gradient-to-bl from-primary-50 to-white">
        <div dir="rtl" class="w-full max-w-2xl mx-auto p-6 text-right article-content-font">
            {{-- title --}}
            <h2 class="text-xl lg:text-2xl xl:text-3xl font-bold article-heading-font" lang="ar">{{$page->title}}</h2>

            <div class="w-full mt-6">
                <img src="{{ env('IMAGEKIT_ENDPOINT') . '/' . $page->thumbnail }}" alt="{{$page->title}}" class="rounded-2xl">
            </div>
            
            {{-- content --}}
            <div class="mt-2 text-base lg:text-lg"  lang="ar">
                {!! str($page->content)->sanitizeHtml() !!}
            </div>
        </div>
    </section>

    <x-footer />
</body>
</html>