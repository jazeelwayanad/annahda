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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <style>
        .splide__slide img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <x-header />

    <section id="hero-carousel" class="splide w-full container mx-auto mt-4 relative" aria-label="Beautiful Images">
        <div class="w-full py-6 splide__track relative">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src="https://placehold.co/2000x1000/black/black/webp" alt="">
                </li>
                <li class="splide__slide">
                    <img src="https://images.unsplash.com/photo-1735822081075-2afd7a7e7ba1?q=80&w=2070&h=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </li>
                <li class="splide__slide">
                    <img src="https://images.unsplash.com/photo-1738831920727-73e17adc5b87?q=80&w=2070&h=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </li>
            </ul>
        </div>
    </section>

    <section class="w-full mt-6">
        <div class="w-full py-6 container mx-auto">
            {{-- title --}}
            <div class="w-full flex justify-between items-center gap-6">
                <a href="#" class="w-fit text-black bg-white hover:bg-black hover:text-white focus:bg-white focus:text-black border border-black font-medium text-base px-4 py-1 focus:outline-none cursor-pointer inline-flex items-center gap-2">
                    <svg class="w-5 h-5 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
                    المزيد
                </a>

                <h1 class="font-extrabold text-3xl text-right" lang="ar">إختيارات المحررين</h1>
            </div>

            <div class="splide" id="popular-carousel">
                <div class="w-full py-6 splide__track relative">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img src="https://placehold.co/250x600/black/black/webp" alt="">
                        </li>
                        <li class="splide__slide">
                            <img src="https://placehold.co/250x600/black/black/webp" alt="">
                        </li>
                        <li class="splide__slide">
                            <img src="https://placehold.co/250x600/black/black/webp" alt="">
                        </li>
                        <li class="splide__slide">
                            <img src="https://placehold.co/250x600/black/black/webp" alt="">
                        </li>
                        <li class="splide__slide">
                            <img src="https://placehold.co/250x600/black/black/webp" alt="">
                        </li>
                        <li class="splide__slide">
                            <img src="https://placehold.co/250x600/black/black/webp" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full mt-6 bg-primary-100">
        <div class="w-full p-6 lg:px-0 lg:py-[5%] container mx-auto">
            {{-- title --}}
            <div class="w-full flex justify-between items-center gap-6">
                <a href="#" class="w-fit text-black bg-white hover:bg-black hover:text-white focus:bg-white focus:text-black border border-black font-medium text-base px-4 py-1 focus:outline-none cursor-pointer inline-flex items-center gap-2 group">
                    <svg class="w-5 h-5 fill-black group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
                    المزيد
                </a>

                <h1 class="font-extrabold text-3xl text-right" lang="ar">محتوى متميز</h1>
            </div>

            <div class="w-full mt-8 text-right grid grid-cols-1 lg:grid-cols-3 gap-6" dir="rtl">
                <a href="#" class="flex flex-col items-center bg-white border-0 border-gray-200 shadow-sm hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 lg:w-auto" src="https://placehold.co/750x500/gray/black/webp" alt="">
                    <div class="w-full max-w-md flex flex-col justify-between py-6 px-6 leading-normal">
                        <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white">أدب المقاومة الفلسطينية:خط الدفاع ومحطة الإبداع</h5>
                        <p class="mt-6 font-normal text-gray-700 dark:text-gray-400"> المقاومة | محطة الإبداع</p>
                    </div>
                </a>
                <a href="#" class="flex flex-col items-center bg-white border-0 border-gray-200 shadow-sm hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 lg:w-auto" src="https://placehold.co/750x500/gray/black/webp" alt="">
                    <div class="w-full max-w-md flex flex-col justify-between py-6 px-6 leading-normal">
                        <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white">أدب المقاومة الفلسطينية:خط الدفاع ومحطة الإبداع</h5>
                        <p class="mt-6 font-normal text-gray-700 dark:text-gray-400"> المقاومة | محطة الإبداع</p>
                    </div>
                </a>
                <a href="#" class="flex flex-col items-center bg-white border-0 border-gray-200 shadow-sm hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 lg:w-auto" src="https://placehold.co/750x500/gray/black/webp" alt="">
                    <div class="w-full max-w-md flex flex-col justify-between py-6 px-6 leading-normal">
                        <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white">أدب المقاومة الفلسطينية:خط الدفاع ومحطة الإبداع</h5>
                        <p class="mt-6 font-normal text-gray-700 dark:text-gray-400"> المقاومة | محطة الإبداع</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="w-full mt-6 mb-8">
        <div class="w-full p-6 container mx-auto">
            {{-- title --}}
            <div class="w-full flex justify-between items-center gap-6">
                <a href="#" class="w-fit text-black bg-white hover:bg-black hover:text-white focus:bg-white focus:text-black border border-black font-medium text-base px-4 py-1 focus:outline-none cursor-pointer inline-flex items-center gap-2 group">
                    <svg class="w-5 h-5 fill-black group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
                    المزيد
                </a>

                <h1 class="font-extrabold text-3xl text-right" lang="ar">محتويات الأخيرة </h1>
            </div>

            <div class="w-full mt-8 text-right grid grid-cols-1 lg:grid-cols-2 gap-6" dir="rtl">
                <a href="#" class="flex flex-col items-center bg-gray-100 border-0 border-gray-200 shadow-sm md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 lg:w-auto lg:max-w-xs" src="https://placehold.co/750x700/gray/black/webp" alt="">
                    <div class="w-full max-w-md flex flex-col justify-between py-4 px-6 leading-normal">
                        <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white">أدب المقاومة الفلسطينية:خط الدفاع ومحطة الإبداع</h5>
                        <p class="mt-6 font-normal text-gray-700 dark:text-gray-400"> المقاومة | محطة الإبداع</p>
                    </div>
                </a>
                <a href="#" class="flex flex-col items-center bg-gray-100 border-0 border-gray-200 shadow-sm md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 lg:w-auto lg:max-w-xs" src="https://placehold.co/750x700/gray/black/webp" alt="">
                    <div class="w-full max-w-md flex flex-col justify-between py-4 px-6 leading-normal">
                        <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white">أدب المقاومة الفلسطينية:خط الدفاع ومحطة الإبداع</h5>
                        <p class="mt-6 font-normal text-gray-700 dark:text-gray-400"> المقاومة | محطة الإبداع</p>
                    </div>
                </a>
                <a href="#" class="flex flex-col items-center bg-gray-100 border-0 border-gray-200 shadow-sm md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 lg:w-auto lg:max-w-xs" src="https://placehold.co/750x700/gray/black/webp" alt="">
                    <div class="w-full max-w-md flex flex-col justify-between py-4 px-6 leading-normal">
                        <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white">أدب المقاومة الفلسطينية:خط الدفاع ومحطة الإبداع</h5>
                        <p class="mt-6 font-normal text-gray-700 dark:text-gray-400"> المقاومة | محطة الإبداع</p>
                    </div>
                </a>
                <a href="#" class="flex flex-col items-center bg-gray-100 border-0 border-gray-200 shadow-sm md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 lg:w-auto lg:max-w-xs" src="https://placehold.co/750x700/gray/black/webp" alt="">
                    <div class="w-full max-w-md flex flex-col justify-between py-4 px-6 leading-normal">
                        <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white">أدب المقاومة الفلسطينية:خط الدفاع ومحطة الإبداع</h5>
                        <p class="mt-6 font-normal text-gray-700 dark:text-gray-400"> المقاومة | محطة الإبداع</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- featured post --}}
    @if ($articles->where('slug', 'adb-almkaom-alflstyny-kht-aldfaaa-omht-alabdaaa')->first())
        <section class="w-full mt-6 bg-white hidden">
            <div class="w-full container mx-auto p-6">
                @php
                    $article = $articles->where('slug', 'adb-almkaom-alflstyny-kht-aldfaaa-omht-alabdaaa')->first();
                @endphp
                <div class="w-full flex flex-col md:flex-row items-start justify-center gap-6">
                    <div class="w-full max-w-md xl:max-w-lg">
                        <img src="{{ env('IMAGEKIT_ENDPOINT') . '/' . $article->thumbnail }}"
                            alt="{{ $article->title }}" alt="" class="rounded-2xl">
                    </div>
                    <div dir="rtl" class="w-full text-right article-content-font" lang="ar">
                        {{-- date and category --}}
                        <div class="inline-flex items-center gap-4">
                            <p class="text-xl text-primary-500 font-medium">{{ $article->category->name }}</p>
                            <p class="text-base text-slate-700 font-semibold" lang="en">
                                {{ $article->updated_at->format('d/m/Y') }}</p>
                        </div>
                        {{-- title --}}
                        <a
                            href="{{ route('view-article', ['category' => $article->category->name, 'slug' => $article->slug]) }}">
                            <h2 class="mt-2 text-xl lg:text-2xl xl:text-3xl font-bold article-heading-font">
                                {{ $article->title }}</h2>
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
        <section dir="rtl" class="w-full py-8 my-2 bg-white hidden">
            <div class="w-full container mx-auto p-6">
                <h1 class="font-extrabold text-5xl my-6 text-center lg:text-start article-heading-font" lang="ar">
                    {{ $categories->first()->name }}</h1>
                <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach ($articles->where('category_id', 1)->take(4)->all() as $article)
                        <div class="w-full max-w-md article-content-font" lang="ar">
                            <img src="{{ env('IMAGEKIT_ENDPOINT') . '/' . $article->thumbnail }}"
                                alt="{{ $article->title }}" class="w-full rounded-xl my-2" />
                            <div dir="rtl" class="text-right space-y-1">
                                <p class="font-bold text-amber-500" lang="ar">{{ $article->category->name }}</p>
                                <a
                                    href="{{ route('view-article', ['category' => $article->category->name, 'slug' => $article->slug]) }}">
                                    <h1 class="font-extrabold text-xl article-heading-font" lang="ar">
                                        {{ $article->title }}</h1>
                                </a>
                                <p class="font-bold text-amber-500">{{ $article->author->name }}</p>
                                <p class="text-base line-clamp-4">{{ $article->meta_description }}
                                <p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($categories->skip(1)->first())
        <section class="w-full py-8 my-2 bg-white hidden">
            <div dir="rtl" class="w-full container mx-auto">
                <h1 class="font-extrabold text-5xl my-6 text-center lg:text-start article-heading-font" lang="ar">
                    {{ $categories->skip(1)->first()->name }}</h1>
                <div class="grid">
                    <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($articles->where('category_id', 2)->take(2)->all() as $article)
                            <div class="w-full p-6 article-content-font" lang="ar">
                                <img src="{{ env('IMAGEKIT_ENDPOINT') . '/' . $article->thumbnail }}"
                                    alt="{{ $article->title }}" class="w-full rounded-xl my-2" />
                                <div dir="rtl" class="text-right space-y-1">
                                    <p class="font-bold text-amber-500" lang="ar">{{ $article->category->name }}
                                    </p>
                                    <a
                                        href="{{ route('view-article', ['category' => $article->category->name, 'slug' => $article->slug]) }}">
                                        <h1 class="font-extrabold text-xl article-heading-font" lang="ar">
                                            {{ $article->title }}</h1>
                                    </a>
                                    <p class="font-bold text-amber-500">{{ $article->author->name }}</p>
                                    <p class="text-base line-clamp-4">{{ $article->meta_description }}
                                    <p>
                                </div>
                            </div>
                        @endforeach
                        <div class="w-full max-w-sm md:max-w-none p-6">
                            <div class="w-full bg-black text-white py-20 px-4 rounded-2xl">
                                <div class="w-full flex flex-col items-center gap-y-20">
                                    <img src="{{ asset('assets/annahdha-logo-white.png') }}" alt="Annahda Logo"
                                        class="h-10">

                                    <div class="flex flex-col justify-start items-center gap-3 mx-24 md:mx-24"
                                        lang="ar">
                                        <h2 class="font-extrabold text-4xl tracking-wide text-center  text-wrap article-heading-font"
                                            lang="ar">نشراتنا </h2>
                                        <h2 class="font-extrabold text-4xl tracking-wide text-center  text-wrap article-heading-font"
                                            lang="ar"> البريدية</h2>

                                        <button
                                            class="text-xl bg-primary-600 text-white font-bold py-4 px-14 rounded-md mt-5 article-heading-font">تسجيل</button>
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
        <section dir="rtl" class="w-full py-8 bg-primary-100 hidden">
            <div class="w-full container mx-auto p-6">
                <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach ($categories as $category)
                        <div class="w-full bg-neutral-900 rounded-lg overflow-hidden shadow-lg text-white">
                            <div class="w-full relative h-48">
                                <img src="{{ isset($category->image) ? env('IMAGEKIT_ENDPOINT') . '/' . $category->image : 'https://static.vecteezy.com/system/resources/previews/023/846/268/non_2x/islamic-seamless-pattern-minimalist-arabic-abstract-geometric-background-wallpaper-design-free-vector.jpg' }}"
                                    alt="Art Image" class="w-full h-full object-cover">
                                <div class="w-full h-full absolute top-0 left-0 right-0 bg-black/40"></div>
                                <h2 class="p-6 absolute bottom-0 right-0 font-bold text-2xl md:text-4xl">
                                    {{ $category->name }}</h2>
                            </div>
                            <div class="w-full px-6 py-4">
                                <p class="text-base md:text-lg mt-1 text-white" lang="ar">
                                    {{ $category->description }}</p>
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
                    <a href="{{ $popups->redirect_url }}" target="_blank"><img
                            src="{{ env('IMAGEKIT_ENDPOINT') . '/' . $popups->image }}" alt="Popup Image"
                            class="w-full rounded-lg mb-4"></a>
                </div>
            </div>
        </div>
    @endif

    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButton = document.getElementById('close-popup');
            const modal = document.getElementById('popup-modal');
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
            }
        });
    </script>
    <script>
        document.addEventListener( 'DOMContentLoaded', function() {
            new Splide('#hero-carousel').mount();
            new Splide('#popular-carousel', {
                direction: 'rtl',
                rewind    : true,
                perPage: 3,
                perMove: 1,
                gap: 15,
                fixedHeight: 400,
            }).mount();
        });
    </script>
</body>
</html>
