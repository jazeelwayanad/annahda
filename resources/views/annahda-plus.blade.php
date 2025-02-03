<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="og:site_name" content="Annahdha">
    <title>Annahda Plus Membership</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-full">
    <x-header />

    <main class="w-full py-8">
        <div class="w-full p-8 container mx-auto">
            <div class="w-full flex flex-col md:flex-row items-center justify-center gap-6">
                <div class="w-full max-w-md text-right">
                    @if (auth()->check())
                    <div class="w-full p-6 border border-gray-300 bg-gray-50">
                        <h2 class="text-3xl font-bold" dir="rtl">الترقية إلى <span class="text-primary-500">النهضة+</span></h2>
                        <p class="text-base mt-4 font-medium">كعضو في النهضة+ تحصل على ما يلي:</p>

                        <ul class="w-full mt-4" dir="rtl">
                            <li class="w-full text-base inline-flex items-center gap-2">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                الوصول إلى أرشيف النهضة
                            </li>
                            <li class="w-full text-base inline-flex items-center gap-2">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                شارة النهضة +
                            </li>
                            <li class="w-full text-base inline-flex items-center gap-2">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                الوصول المبكر إلى الميزة الجديدة
                            </li>
                            <li class="w-full text-base inline-flex items-center gap-2">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                اشترك في قنوات المبدعين المفضلين لديك
                            </li>
                            <li class="w-full text-base inline-flex items-center gap-2">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                يتلقى رسائل إخبارية خاصة
                            </li>
                        </ul>

                        <button class="w-full mt-4 text-white bg-primary-600 hover:bg-primary-700 focus:bg-primary-800 font-medium text-center text-xl px-5 py-2.5 focus:outline-none cursor-pointer">ترقية مقابل 150₹ شهريًا</button>
                        <p class="text-sm mt-2 text-gray-700">استمتع بسنتك الأولى لمدة 150₹ فقط. يجدد في 300₹. ألغي في أي وقت. من خلال الاشتراك، فإنك توافق على شروط الاستخدام الخاصة بنا. سيتم تحصيل رسوم متكررة من طريقة الدفع الخاصة بك، ما لم تقرر الإلغاء. لم يتم إلغاء أي مبالغ مستردة للعضوية بين دورات الفوترة.</p>
                    </div>  
                    @else
                    <div class="w-full p-6 border border-gray-300 bg-gray-50">
                        <h2 class="text-2xl font-bold">أولاً، انضم إلى النهضة</h2>
                        <p class="text-base mt-2 font-medium text-gray-900">للترقية <span class="text-primary-500">النهضة+</span>، يجب أن يكون لديك حساب. انضم أو قم بتسجيل الدخول للمتابعة.</p>

                        <button class="w-full mt-4 text-white bg-black hover:bg-white hover:text-black focus:bg-black focus:text-white border border-black font-medium  text-center text-base px-5 py-2.5 focus:outline-none cursor-pointer">انضم إلى النهضة</button>
                        <p class="mt-2 text-gray-800">هل لديك حساب النهضة؟ <a href="{{route('auth.register')}}" class="font-bold text-black">تسجيل</a></p>
                    </div>
                    @endif
                </div>

                <div class="w-full flex-1 text-right" dir="rtl">
                    <h1 class="text-5xl font-bold">تقديم <span class="text-primary-500">النهضة+</span></h1>
                    <p class="text-xl mt-4">عندما تصبح عضوًا في النهضة، ستساعدنا في بناء ميزات وخدمات جديدة من شأنها أن تعود بالنفع على مجتمع النهضة.</p>
                </div>
            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>