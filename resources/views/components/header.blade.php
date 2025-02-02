<header class="w-full bg-white">
    <div class="w-full bg-white container mx-auto px-6 py-4">
        <div class="w-full pt-5 inline-flex justify-center">
            <a href="{{route('home')}}">
                <img src="{{asset('assets/annahda-logo.svg')}}" alt="Annahdha Logo" class="h-10 md:h-16">
            </a>
        </div>

        <div class="w-full mt-6 pb-4 flex items-center justify-between gap-6 border-b border-black">
            <div class="w-fit flex items-center gap-4">
                <a href="{{route('auth.login')}}" type="button" class="hidden md:block text-white bg-black hover:bg-white hover:text-black focus:bg-black focus:text-white border border-black font-medium text-sm px-5 py-1 focus:outline-none cursor-pointer">إنشاء </a>
                <a href="{{route('auth.register')}}" type="button" class="hidden md:block text-black bg-white hover:bg-black hover:text-white focus:bg-white focus:text-black border border-black font-medium text-sm px-5 py-1 focus:outline-none cursor-pointer">تسجيل</a>

                {{-- mobile only --}}
                <a href="{{ route('dashboard') }}" class="block md:hidden">
                    <svg class="w-6 h-6 fill-black hover:fill-primary-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z"></path></svg>
                </a>
            </div>

            <nav class="hidden flex-1 md:inline-flex w-full justify-center">
                <ul dir="rtl" class="w-fit flex items-center justify-center gap-6 font-bold text-base">
                    @isset($header_categories)
                    @foreach ($header_categories as $item)
                    <li>
                        <a href="{{route('category.article', ['category' => $item->id])}}" class="text-black hover:text-primary-500">{{$item->name}}</a>
                    </li>
                    @endforeach
                    @endisset
                </ul>
            </nav>

            <div class="w-fit inline-flex items-center gap-6">
                <a dir="rtl" type="button" class="block text-right text-black bg-gradient-to-t from-primary-500 to-primary-300 hover:bg-none hover:bg-primary-500 border border-primary-500 font-medium text-sm px-5 py-1 focus:outline-none cursor-pointer">النهضة+</a>

                <a href="{{route('search')}}" class="block cursor-pointer">
                    <svg class="w-7 h-7 {{Route::current()->getName() == 'search' ? 'fill-primary-500' : 'fill-black'}} hover:fill-primary-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg>
                </a>

                <button class="block md:hidden">
                    <svg class="w-7 fill-black hover:fill-primary-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
                </button>
            </div>
        </div>
    </div>
</header>