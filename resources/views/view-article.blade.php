<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="og:site_name" content="Annahdha">
    <title>{{ $article->meta_title ? $article->meta_title : "Annahda"}}</title>
    <meta name="og:title" content="{{ $article->og_title ? $article->og_title : $article->meta_title}}">
    <meta name="og:description" content="{{ $article->og_description ? $article->og_description : $article->meta_description}}">
    <meta name="description" content="{{ $article->meta_description ? $article->meta_description : "Annahda"}}">
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
            <h2 class="text-xl lg:text-2xl xl:text-3xl font-bold article-heading-font" lang="ar">{{$article->title}}</h2>

            <div class="w-full mt-6">
                <img src="{{ $article->thumbnail_url }}" alt="{{$article->title}}" class="rounded-2xl">
            </div>

            {{-- date and category --}}
            <div class="mt-6 inline-flex items-center gap-4">
                <p class="text-xl text-primary-500 font-medium">{{ $article->category->name }}</p>
                <p class="text-base text-slate-700 font-semibold">{{ $article->updated_at->format("d/m/Y") }}</p>
            </div>
            
            {{-- author --}}
            <p class="mt-2 text-base text-primary-500 font-medium">{{ $article->author->name }}</p>
            {{-- content --}}
            <div class="mt-2 text-base lg:text-lg"  lang="ar">
                {!! str($article->content)->sanitizeHtml() !!}
            </div>
        </div>
    </section>

    <x-footer />
</body>
</html>