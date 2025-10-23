<aside id="public-mobile-menu" class="fixed top-0 right-0 z-40 w-64 transition translate-x-full lg:translate-x-full delay-100 duration-500 ease-in-out shadow-xl" aria-label="Sidebar">
    <div class="w-full h-screen flex flex-col bg-white border-r-2 border-gray-200">
        <div class="w-full h-full">
            <div class="px-7 py-4 flex items-center">
                <button id="public-mobile-menu-close" class="w-fit h-fit block">
                    <svg class="w-7 fill-black hover:fill-primary-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                </button>
            </div>
        
            <div class="w-full h-[calc(100%-4rem)] px-4 pt-6 overflow-y-auto">
                <div class="w-full mb-8 space-y-8 divide divide-gray-200">
                    <ul class="w-full mt-2 space-y-2 text-right font-medium text-black hover:text-primary-500">
                        @isset($header_categories)
                        @foreach ($header_categories as $item)
                        <li>
                            <a href="{{route('category.articles', $item->slug)}}" class="w-full block px-3 py-2 text-gray-900 group rounded-lg {{ request()->path() == 'articles/' . $item->slug ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                <span class="ms-4 text-base {{ request()->path() == 'articles/' . $item->slug ? 'text-primary-600 font-bold' : '' }}">{{ $item->name }}</span>
                            </a>
                        </li>
                        @endforeach
                        @endisset
                        <li>
                            <a href="{{route('archive.index')}}" class="w-full block px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'archive.index' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                <span class="ms-4 text-base {{ Route::current()->getName() == 'archive.index' ? 'text-primary-600 font-bold' : '' }}">سجلات النهضة</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('printed_magazine')}}" class="w-full block px-3 py-2 text-gray-900 group rounded-lg {{ Route::current()->getName() == 'printed_magazine' ? 'bg-zinc-100' : 'hover:bg-gray-100' }}">
                                <span class="ms-4 text-base {{ Route::current()->getName() == 'printed_magazine' ? 'text-primary-600 font-bold' : '' }}">مجلة مطبوعة</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>