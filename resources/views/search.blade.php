<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="og:site_name" content="Annahdha">
    <title>Annahda</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full">
    <x-header />

    <main class="w-full py-16 h-[70dvh] flex flex-col justify-center items-center max-w-5xl mx-auto px-6 bg-white">
        <!-- search form -->
        <div class="w-full max-w-3xl mx-auto">
            <form class="w-full flex items-center gap-4">   
                <label for="voice-search" class="sr-only">Search</label>
                <button type="submit" class="p-0 text-black bg-white focus:outline-none hover:text-primary-600">
                    <svg class="w-7 h-7 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </button>
                <input type="text" id="voice-search" class="bg-white border-0 border-b-2 border-gray-800 text-gray-900 text-lg text-center rounded-none focus:outline-none focus:border-primary-500 block w-full ps-10 p-2.5 focus:ring-0" autofocus placeholder="ابحث هنا" required />
            </form>
        </div>

        <!-- articles grid -->
        <div class="w-full mt-8">
            <div class="w-full grid grid-cols-3 gap-4 rtl text-right" dir="rtl">
                <div class="w-full bg-white border border-gray-600 cursor-pointer">
                    <img src="./article-thumbnail.webp" alt="thumbnail" class="w-full">

                    <div class="w-full p-4">
                        <p class="text-xl font-bold text-black hover:text-primary-600">أدب المقاومة الفلسطينية:
                            خط الدفاع ومحطة الإبداع</p>
                        <p class="mt-2 text-base text-gray-700"> المقاومة | محطة الإبداع</p>
                    </div>
                </div>
                <div class="w-full bg-white border border-gray-600 cursor-pointer">
                    <img src="./article-thumbnail.webp" alt="thumbnail" class="w-full">

                    <div class="w-full p-4">
                        <p class="text-xl font-bold text-black hover:text-primary-600">أدب المقاومة الفلسطينية:
                            خط الدفاع ومحطة الإبداع</p>
                        <p class="mt-2 text-base text-gray-700"> المقاومة | محطة الإبداع</p>
                    </div>
                </div>
                <div class="w-full bg-white border border-gray-600 cursor-pointer">
                    <img src="./article-thumbnail.webp" alt="thumbnail" class="w-full">

                    <div class="w-full p-4">
                        <p class="text-xl font-bold text-black hover:text-primary-600">أدب المقاومة الفلسطينية:
                            خط الدفاع ومحطة الإبداع</p>
                        <p class="mt-2 text-base text-gray-700"> المقاومة | محطة الإبداع</p>
                    </div>
                </div>
            </div>

            <!-- view more button -->
            <button type="button" class="mt-6 inline-flex items-center gap-2 text-gray-900 hover:text-primary-600 fill-black hover:fill-primary-600 group bg-white focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
                <span class="underline">المزيد</span>
            </button>
        </div>
    </main>

    <x-footer />
</body>
</html>