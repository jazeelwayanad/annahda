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

    @if(count($slides))
    <section id="hero-carousel" class="splide w-full container mx-auto relative" aria-label="Beautiful Images">
        <div class="w-full py-6 splide__track relative">
            <ul class="splide__list">
                @foreach ($slides as $slide)
                <li class="splide__slide group">
                    @if ($slide->type == "custom")
                    <a href="{{$slide->link}}">
                        <img src="{{ env('IMAGEKIT_ENDPOINT') . '/tr:w-1000,h-480/' . $slide->image }}" alt="slide" class="w-full">
                    </a>
                    @else
                    <a href="{{route('article.show', ['category' => $slide->article->category->slug, 'slug'=> $slide->article->slug])}}" class="relative w-full">
                        <img src="{{ env('IMAGEKIT_ENDPOINT') . '/tr:w-1000,h-800/' . $slide->article->thumbnail }}" alt="Background Image" class="w-full h-full object-cover md:hidden">
                        <img src="{{ env('IMAGEKIT_ENDPOINT') . '/tr:w-1000,h-480/' . $slide->article->thumbnail }}" alt="Background Image" class="w-full h-full object-cover hidden md:block">
                
                        <!-- Overlay -->
                        <div class="p-4 lg:p-[5%] absolute inset-0 bg-gradient-to-t from-black to-transparent bg-opacity-50 flex flex-col justify-between">
                            <div class="w-full flex justify-start">
                                @if ($slide->article->premium)
                                <svg class="h-10 fill-yellow-400 rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 2h-4v4.059a8.946 8.946 0 0 1 4 1.459V2zm-6 0H7v5.518a8.946 8.946 0 0 1 4-1.459V2zm1 20a7 7 0 1 0 0-14 7 7 0 0 0 0 14zm-1.225-8.519L12 11l1.225 2.481 2.738.397-1.981 1.932.468 2.727L12 17.25l-2.449 1.287.468-2.727-1.981-1.932 2.737-.397z"></path></svg>
                                @endif
                            </div>

                            <div class="w-full text-lg font-medium text-white text-center">
                                <p class="text-lg font-normal text-white"> المقاومة | محطة الإبداع</p>
                                <h5 class="mt-4 text-2xl md:text-3xl font-bold tracking-tight text-white group-hover:text-primary-500">أدب المقاومة الفلسطينية:خط الدفاع ومحطة الإبداع</h5>
                                <hr class="w-full h-[2px] mt-6 bg-white"/>
                                <a href="#" class="w-fit mt-4 md:mt-8 text-white hover:text-primary-500 focus:text-primary-700 font-medium text-base px-4 py-1 focus:outline-none cursor-pointer inline-flex items-center gap-2 group">
                                    <svg class="w-5 h-5 fill-white group-hover:fill-primary-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
                                    المزيد
                                </a>
                            </div>
                        </div>
                    </a>
                    @endif
                </li>
                @endforeach
                {{-- <li class="splide__slide group">
                    <a href="#" class="relative w-full">
                        <img src="https://images.unsplash.com/photo-1739005375704-fa5e6c68fc84?q=80&w=2070&h=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Background Image" class="w-full h-full object-cover">
                
                        <!-- Overlay -->
                        <div class="p-4 lg:p-[5%] absolute inset-0 bg-gradient-to-t from-black to-transparent bg-opacity-50 flex flex-col justify-between">
                            <div class="w-full flex justify-start">
                                <svg class="h-10 fill-yellow-400 rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 2h-4v4.059a8.946 8.946 0 0 1 4 1.459V2zm-6 0H7v5.518a8.946 8.946 0 0 1 4-1.459V2zm1 20a7 7 0 1 0 0-14 7 7 0 0 0 0 14zm-1.225-8.519L12 11l1.225 2.481 2.738.397-1.981 1.932.468 2.727L12 17.25l-2.449 1.287.468-2.727-1.981-1.932 2.737-.397z"></path></svg>
                            </div>

                            <div class="w-full text-lg font-medium text-white text-center">
                                <p class="text-lg font-normal text-white"> المقاومة | محطة الإبداع</p>
                                <h5 class="mt-4 text-3xl font-bold tracking-tight text-white group-hover:text-primary-500">أدب المقاومة الفلسطينية:خط الدفاع ومحطة الإبداع</h5>
                                <hr class="w-full h-[2px] mt-6 bg-white"/>
                                <a href="#" class="w-fit mt-8 text-white hover:text-primary-500 focus:text-primary-700 font-medium text-base px-4 py-1 focus:outline-none cursor-pointer inline-flex items-center gap-2 group">
                                    <svg class="w-5 h-5 fill-white group-hover:fill-primary-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
                                    المزيد
                                </a>
                            </div>
                        </div>
                    </a>
                </li> --}}
            </ul>
        </div>
    </section>
    @endif

    @if (count($popular_articles))
    <section class="w-full mt-6">
        <div class="w-full p-6 lg:px-0 lg:py-[5%] container mx-auto">
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
                        @foreach ($popular_articles as $article)
                        <li class="splide__slide">
                            <a href="{{route('article.show', ['category' => $article->category->slug, 'slug'=> $article->slug])}}" class=" w-full">
                                <img src="{{ env('IMAGEKIT_ENDPOINT') . '/tr:w-250,h-350/' . $article->thumbnail }}" alt="Background Image" class="w-full h-full object-cover">
                        
                                <!-- Overlay -->
                                <div class="p-4 lg:p-[5%] absolute inset-0 -mb-8 bg-gradient-to-t from-black to-transparent bg-opacity-50 flex flex-col justify-between">
                                    <div class="w-full flex justify-start">
                                        @if ($article->premium)
                                        <svg class="h-10 fill-yellow-400 rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 2h-4v4.059a8.946 8.946 0 0 1 4 1.459V2zm-6 0H7v5.518a8.946 8.946 0 0 1 4-1.459V2zm1 20a7 7 0 1 0 0-14 7 7 0 0 0 0 14zm-1.225-8.519L12 11l1.225 2.481 2.738.397-1.981 1.932.468 2.727L12 17.25l-2.449 1.287.468-2.727-1.981-1.932 2.737-.397z"></path></svg>
                                        @endif
                                    </div>

                                    <div class="w-full text-lg font-medium text-white text-right">
                                        <h5 class="text-2xl font-bold tracking-tight text-white group-hover:text-primary-500">{{$article->title}}</h5>
                                        <p class="mt-4 text-lg font-normal text-white">{{$article->category->name}} | {{ $article->author->name }}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if (count($premium_articles))
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
                @foreach ($premium_articles as $article)
                <a href="{{route('article.show', ['category' => $article->category->slug, 'slug'=> $article->slug])}}" class="flex flex-col items-center bg-white border-0 border-gray-200 shadow-sm hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 lg:w-auto" src="{{ env('IMAGEKIT_ENDPOINT') . '/tr:w-750,h-500,c-at_max_enlarge/' . $article->thumbnail }}" alt="">
                    <div class="w-full max-w-md flex flex-col justify-between py-6 px-6 leading-normal">
                        <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white">{{$article->title}}</h5>
                        <p class="mt-6 font-normal text-gray-700 dark:text-gray-400">{{$article->category->name}} | {{ $article->author->name }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if (count($latest_articles))
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
                @foreach ($latest_articles as $article)
                <a href="{{route('article.show', ['category' => $article->category->slug, 'slug'=> $article->slug])}}" class="flex flex-col items-center bg-gray-100 border-0 border-gray-200 shadow-sm md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 lg:w-auto lg:max-w-xs" src="{{ env('IMAGEKIT_ENDPOINT') . '/tr:w-750,h-700/' . $article->thumbnail }}" alt="{{$article->title}}">
                    <div class="w-full max-w-md flex flex-col justify-between py-4 px-6 leading-normal">
                        <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white">{{$article->title}}</h5>
                        <p class="mt-6 font-normal text-gray-700 dark:text-gray-400">{{$article->category->name}} | {{ $article->author->name }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if ($magazine)
    <x-home-magazine  :$magazine />
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
            var homeCarousel = document.getElementById("hero-carousel");
            if(homeCarousel){
                new Splide('#hero-carousel').mount();
            }

            const popularCarousel =  document.getElementById("popular-carousel");
            if(popularCarousel){
                new Splide('#popular-carousel', {
                    direction: 'rtl',
                    rewind    : true,
                    perPage: 3,
                    perMove: 1,
                    gap: 15,
                    fixedHeight: 400,
                    breakpoints: {
                        640: {
                            perPage: 1,
                        },
                    },
                }).mount();
            }
        });
    </script>
</body>
</html>
