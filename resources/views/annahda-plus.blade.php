<x-public-layout>

    <main class="w-full py-8">
        <div class="w-full p-8 container mx-auto">
            <div class="w-full flex flex-col md:flex-row items-center justify-center gap-6">
                <div class="w-full max-w-md text-right">
                    @auth
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
                        
                        <a href="{{ route('checkout', 'Annahda Plus') }}">
                            <button class="w-full mt-4 text-white bg-primary-600 hover:bg-primary-700 focus:bg-primary-800 font-medium text-center text-xl px-5 py-2.5 focus:outline-none cursor-pointer">ترقية مقابل 150₹ شهريًا</button>
                        </a>
                        <p class="text-sm mt-2 text-gray-700">استمتع بسنتك الأولى لمدة 150₹ فقط. يجدد في 300₹. ألغي في أي وقت. من خلال الاشتراك، فإنك توافق على شروط الاستخدام الخاصة بنا. سيتم تحصيل رسوم متكررة من طريقة الدفع الخاصة بك، ما لم تقرر الإلغاء. لم يتم إلغاء أي مبالغ مستردة للعضوية بين دورات الفوترة.</p>
                    </div>  
                    @endauth
                    @guest
                    <div class="w-full p-6 border border-gray-300 bg-gray-50">
                        <h2 class="text-2xl font-bold">أولاً، انضم إلى النهضة</h2>
                        <p class="text-base mt-2 font-medium text-gray-900">للترقية <span class="text-primary-500">النهضة+</span>، يجب أن يكون لديك حساب. انضم أو قم بتسجيل الدخول للمتابعة.</p>

                        <a href="{{ route('auth.login', ['redirect' => 'annahda-plus']) }}"><button class="w-full mt-4 text-white bg-black hover:bg-white hover:text-black focus:bg-black focus:text-white border border-black font-medium  text-center text-base px-5 py-2.5 focus:outline-none cursor-pointer">انضم إلى النهضة</button></a>
                        <p class="mt-2 text-gray-800">هل لديك حساب النهضة؟ <a href="{{route('auth.register', ['redirect' => 'annahda-plus'])}}" class="font-bold text-black">تسجيل</a></p>
                    </div>
                    @endguest
                </div>

                <div class="w-full flex-1 text-right" dir="rtl">
                    <h1 class="text-5xl font-bold">تقديم <span class="text-primary-500">النهضة+</span></h1>
                    <p class="text-xl mt-4">عندما تصبح عضوًا في النهضة، ستساعدنا في بناء ميزات وخدمات جديدة من شأنها أن تعود بالنفع على مجتمع النهضة.</p>
                </div>
            </div>
        </div>
    </main>

    <section class="w-full py-8 bg-gray-100">
        <div class="w-full p-8 max-w-6xl mx-auto text-right" dir="rtl">
            <h2 class="text-3xl font-bold">وهنا ما تم تضمينه</h2>
            <p class="text-base mt-4 font-normal">يتلقى الأعضاء رسائل إخبارية خاصة وشارة + وأولوية الوصول إلى الميزات الجديدة.
            </p>
            <p class="text-base mt-2 font-normal">ستكون أول من يحصل على المزايا التالية:</p>

            <div class="w-full mt-6 relative overflow-x-auto">
                <table class="w-full text-base text-right text-gray-700">
                    <thead class="text-lg text-black uppercase bg-transparent">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                الفوائد
                            </th>
                            <th scope="col" class="px-6 py-3">
                                النهضة
                            </th>
                            <th scope="col" class="px-6 py-3 text-primary-500">
                                النهضة+
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-transparent border border-gray-500">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-500">
                                الوصول إلى أرشيف النهضة
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                            </td>
                        </tr>
                        <tr class="bg-transparent border border-gray-500">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-500">
                                شارة النهضة +
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                            </td>
                        </tr>
                        <tr class="bg-transparent border border-gray-500">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-500">
                                الوصول المبكر إلى الميزة الجديدة
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                            </td>
                        </tr>
                        <tr class="bg-transparent border border-gray-500">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-500">
                                اشترك في قنوات المبدعين المفضلين لديك
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                            </td>
                        </tr>
                        <tr class="bg-transparent border border-gray-500">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-500">
                                يتلقى رسائل إخبارية خاصة
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="w-full mt-8 relative overflow-x-auto">
                <table class="w-full text-base text-right text-gray-700">
                    <thead class="text-lg text-black uppercase bg-transparent">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                الفوائد
                            </th>
                            <th scope="col" class="px-6 py-3">
                                النهضة
                            </th>
                            <th scope="col" class="px-6 py-3 text-primary-500">
                                النهضة+
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-transparent border border-gray-500">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap border border-gray-500">
                                الوصول إلى نسخة موقع النهضة للأطفال
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                            </td>
                            <td class="px-6 py-4 border border-gray-500">
                                <svg class="w-7 h-7 fill-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="mt-2 text-base">شكلت تعليقات المنشئ هذه الميزات بشكل كبير. إذا كنت ترغب في اقتراح ميزة جديدة، فيرجى الاتصال بنا.</p>
            </div>
        </div>
    </section>

</x-public-layout>