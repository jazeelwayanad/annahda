<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="og:site_name" content="Annahdha">
    <title>Subscribe to Printed Magazine - Annahda</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full">
    <x-header />
    
    <main class="w-full py-8">
        <div class="w-full p-8 container mx-auto">
            <h1 class="text-5xl font-bold text-center" dir="rtl">تقديم <span class="text-primary-500">النهضة+</span></h1>
            <p class="text-xl mt-6 font-medium text-center text-gray-800 max-w-xl mx-auto">عندما تصبح عضوًا في النهضة، ستساعدنا في بناء ميزات وخدمات جديدة من شأنها أن تعود بالنفع على مجتمع النهضة.</p>


            {{-- options --}}
            <div class="w-full mt-12 flex flex-col md:flex-row items-center justify-center gap-8">
                <div class="w-full min-h-96 px-6 py-8 max-w-md text-right bg-primary-50 shadow-lg rounded-md">
                    <div class="w-full flex flex-col items-center gap-6">
                        <img src="{{asset('assets/main-magazine-cover-mockup.png')}}" alt="Annahda main magazine cover mockup" class="h-28">
                        <h2 class="text-3xl font-bold" style="font-family: 'Readex Pro';">المجلة النهضة</h2>

                        <ul class="w-fit text-center mt-4" dir="rtl">
                            <li class="w-fit text-lg inline-flex items-center gap-2">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                اشتراك سنة في مجلة النهضة
                            </li>
                            <li class="w-fit text-lg inline-flex items-center gap-2">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                العضوية النهضة + لستة أشهر
                            </li>
                        </ul>

                        <div class="w-full text-center">
                            <P class="text-base">
                                <span class="bg-primary-200 px-2 py-1">SAVE 20%</span> <strike>₹520.00</strike>
                            </P>
                            <h3 class="mt-2 text-4xl font-bold">₹400.00/yr</h3>
                        </div>

                        <a href="{{ route('checkout', 'Main Magazine') }}" class="block w-full">
                            <button class="w-full text-white bg-black hover:bg-white hover:text-black focus:bg-black focus:text-white border border-black font-medium text-center text-2xl px-5 py-2.5 focus:outline-none cursor-pointer">إختار</button>
                        </a>
                    </div>
                </div>
                <div class="w-full min-h-96 px-6 py-8 max-w-md text-right bg-primary-50 shadow-lg rounded-md">
                    <div class="w-full flex flex-col items-center gap-6">
                        <img src="{{asset('assets/kids-magazine-cover-mockup.png')}}" alt="Annahda kids magazine cover mockup" class="h-28">
                        <h2 class="text-3xl font-bold" style="font-family: 'Readex Pro';">النهضة الصغيرة</h2>

                        <ul class="w-fit text-center mt-4" dir="rtl">
                            <li class="w-fit text-lg inline-flex items-center gap-2">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                اشتراك سنة في مجلة النهضة
                            </li>
                            <li class="w-fit text-lg inline-flex items-center gap-2">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                العضوية النهضة + لستة أشهر
                            </li>
                        </ul>

                        <div class="w-full text-center">
                            <P class="text-base">
                                <span class="bg-primary-200 px-2 py-1">SAVE 20%</span> <strike>₹480.00</strike>
                            </P>
                            <h3 class="mt-2 text-4xl font-bold">₹380.00/yr</h3>
                        </div>

                        <a href="{{ route('checkout', 'Kids Magazine') }}" class="block w-full">
                            <button class="w-full text-white bg-black hover:bg-white hover:text-black focus:bg-black focus:text-white border border-black font-medium text-center text-2xl px-5 py-2.5 focus:outline-none cursor-pointer">إختار</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>