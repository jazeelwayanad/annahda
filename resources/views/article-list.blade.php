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
    <meta name="og:url" content="{{env('APP_URL')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <x-header />
    
    {{-- featured post --}}
    @if ($articles->where('slug', 'adb-almkaom-alflstyny-kht-aldfaaa-omht-alabdaaa')->first())
    <section class="w-full mt-6 bg-white">
        <div class="w-full container mx-auto p-6">
            @php
                $article = $articles->where('slug', 'adb-almkaom-alflstyny-kht-aldfaaa-omht-alabdaaa')->first();
            @endphp
            <div class="w-full flex flex-col md:flex-row items-start justify-center gap-6">
                <div class="w-full max-w-md xl:max-w-lg">
                    <img src="{{ env('IMAGEKIT_ENDPOINT') .'/'. $article->thumbnail }}" alt="{{$article->title}}" alt="" class="rounded-2xl">
                </div>
                <div dir="rtl" class="w-full text-right article-content-font" lang="ar">
                    {{-- date and category --}}
                    <div class="inline-flex items-center gap-4">
                        <p class="text-xl text-primary-500 font-medium">{{ $article->category->name }}</p>
                        <p class="text-base text-slate-700 font-semibold" lang="en">{{ $article->updated_at->format("d/m/Y") }}</p>
                    </div>
                    {{-- title --}}
                    <a href="{{route('view-article', ['category' => $article->category->name, 'slug' => $article->slug])}}">
                        <h2 class="mt-2 text-xl lg:text-2xl xl:text-3xl font-bold article-heading-font">{{$article->title}}</h2>
                    </a>
                    {{-- author --}}
                    <p class="mt-2 text-base text-primary-500 font-medium">{{ $article->author->name }}</p>
                    {{-- content --}}
                    <div class="mt-2 text-base lg:text-lg line-clamp-6">{!! str($article->content)->sanitizeHtml() !!}</div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if (count($articles))
    <section dir="rtl" class="w-full py-8 my-2 bg-white">
        <div class="w-full container mx-auto p-6">
            <h1 class="font-extrabold text-5xl my-6 text-center lg:text-start article-heading-font" lang="ar">{{$articles[0]->category->name}}</h1>
            <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($articles as $article)
                <div class="w-full max-w-md article-content-font" lang="ar">
                    <img src="{{ env('IMAGEKIT_ENDPOINT') .'/'. $article->thumbnail }}" alt="{{$article->title}}" class="w-full rounded-xl my-2" />
                    <div dir="rtl" class="text-right space-y-1">
                        <a href="{{route('view-article', ['category' => $article->category->name, 'slug' => $article->slug])}}">
                            <h1 class="font-extrabold text-xl article-heading-font" lang="ar">{{$article->title}}</h1>
                        </a>
                        <p class="font-bold text-amber-500">{{$article->author->name}}</p>
                        <p class="text-base line-clamp-4">{{$article->meta_description}}<p>
                    </div>
                </div>
                @endforeach                
            </div>
            <div class="mt-6">
                {{ $articles->links() }}
            </div>
        </div>
        
    </section>
    @endif
    
    <x-footer />

</body>
</html>
