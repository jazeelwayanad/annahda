<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="og:site_name" content="Annahdha">
    <title>Annahdha</title>
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

    @if (count($categories))
    <section dir="rtl" class="w-full py-8 my-2 bg-white">
        <div class="w-full container mx-auto p-6">
            <h1 class="font-extrabold text-5xl my-6 text-center lg:text-start article-heading-font" lang="ar">{{$categories->first()->name}}</h1>
            <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($articles->where('category_id', 1)->take(4)->all() as $article)
                <div class="w-full max-w-md article-content-font" lang="ar">
                    <img src="{{ env('IMAGEKIT_ENDPOINT') .'/'. $article->thumbnail }}" alt="{{$article->title}}" class="w-full rounded-xl my-2" />
                    <div dir="rtl" class="text-right space-y-1">
                        <p class="font-bold text-amber-500" lang="ar">{{$article->category->name}}</p>
                        <a href="{{route('view-article', ['category' => $article->category->name, 'slug' => $article->slug])}}">
                            <h1 class="font-extrabold text-xl article-heading-font" lang="ar">{{$article->title}}</h1>
                        </a>
                        <p class="font-bold text-amber-500">{{$article->author->name}}</p>
                        <p class="text-base line-clamp-4">{{$article->meta_description}}<p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if ($categories->skip(1)->first())
    <section class="w-full py-8 my-2 bg-white">
        <div dir="rtl" class="w-full container mx-auto">
            <h1 class="font-extrabold text-5xl my-6 text-center lg:text-start article-heading-font" lang="ar">{{$categories->skip(1)->first()->name}}</h1>
            <div class="grid">
                <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($articles->where('category_id', 2)->take(2)->all() as $article)
                    <div class="w-full p-6 article-content-font" lang="ar">
                        <img src="{{ env('IMAGEKIT_ENDPOINT') .'/'. $article->thumbnail }}" alt="{{$article->title}}" class="w-full rounded-xl my-2" />
                        <div dir="rtl" class="text-right space-y-1">
                            <p class="font-bold text-amber-500" lang="ar">{{$article->category->name}}</p>
                            <a href="{{route('view-article', ['category' => $article->category->name, 'slug' => $article->slug])}}">
                                <h1 class="font-extrabold text-xl article-heading-font" lang="ar">{{$article->title}}</h1>
                            </a>
                            <p class="font-bold text-amber-500">{{$article->author->name}}</p>
                            <p class="text-base line-clamp-4">{{$article->meta_description}}<p>
                        </div>
                    </div>
                    @endforeach
                    <div class="w-full max-w-sm md:max-w-none p-6">
                        <div class="w-full bg-black text-white py-20 px-4 rounded-2xl">
                            <div class="w-full flex flex-col items-center gap-y-20">
                                <img src="{{asset('assets/annahdha-logo-white.png')}}" alt="Annahda Logo" class="h-10">
            
                                <div class="flex flex-col justify-start items-center gap-3 mx-24 md:mx-24" lang="ar">
                                    <h2 class="font-extrabold text-4xl tracking-wide text-center  text-wrap article-heading-font" lang="ar">نشراتنا </h2>
                                    <h2 class="font-extrabold text-4xl tracking-wide text-center  text-wrap article-heading-font" lang="ar"> البريدية</h2>
                            
                                    <button class="text-xl bg-primary-600 text-white font-bold py-4 px-14 rounded-md mt-5 article-heading-font">تسجيل</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if (isset($categories) && count($categories))
    <section dir="rtl" class="w-full py-8 bg-primary-100">
        <div class="w-full container mx-auto p-6">
            <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($categories as $category)
                <div class="w-full bg-neutral-900 rounded-lg overflow-hidden shadow-lg text-white">
                    <div class="w-full relative h-48">
                        <img src="{{isset($category->image) ? env('IMAGEKIT_ENDPOINT') . '/' . $category->image : "https://static.vecteezy.com/system/resources/previews/023/846/268/non_2x/islamic-seamless-pattern-minimalist-arabic-abstract-geometric-background-wallpaper-design-free-vector.jpg"}}" alt="Art Image" class="w-full h-full object-cover">
                        <div class="w-full h-full absolute top-0 left-0 right-0 bg-black/40"></div>
                        <h2 class="p-6 absolute bottom-0 right-0 font-bold text-2xl md:text-4xl">{{ $category->name }}</h2>
                    </div>
                    <div class="w-full px-6 py-4">
                        <p class="text-base md:text-lg mt-1 text-white" lang="ar">{{ $category->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if ($popups)
        <!-- Modal Container -->
        <div id="popup-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-lg shadow-lg w-4/5 max-w-4xl">
                <!-- Modal Header -->
                <div class="flex justify-end items-center p-4">
                    <button id="close-popup" class="text-gray-500 hover:text-gray-700">&times;</button>
                </div>
                <!-- Modal Content -->
                <div class="p-6">
                    <a href="{{ $popups->redirect_url }}" target="_blank"><img src="{{ env('IMAGEKIT_ENDPOINT') . '/' . $popups->image }}" alt="Popup Image"
                        class="w-full rounded-lg mb-4"></a>
                </div>
            </div>
        </div>
    @endif

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const closeButton = document.getElementById('close-popup');
            const modal = document.getElementById('popup-modal');
    
            closeButton.addEventListener('click', function () {
                modal.style.display = 'none'; // Hides the popup
            });
        });
    </script>
</body>
</html>
