<section class="w-full mt-6 bg-primary-50">
    <div class="w-full p-6 lg:p-[5%] container mx-auto">
        {{-- title --}}
        <div class="w-full flex justify-between items-center gap-6 mb-8">
            <a href="#" class="w-fit text-black bg-transparent hover:bg-primary-500 hover:text-white focus:bg-white focus:text-black border border-black font-medium text-base px-4 py-1 focus:outline-none cursor-pointer inline-flex items-center gap-2 group">
                <svg class="w-5 h-5 fill-black group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
                المزيد
            </a>
            
            <h2 class="font-extrabold text-3xl text-right" lang="ar">سجلات النهضة</h2>
        </div>

        <div class="w-full text-right flex flex-col md:flex-row items-center justify-center gap-6" dir="rtl">
            <div class="w-full max-w-md">
                <a href="#">
                    <img src="{{$magazine->cover_image()}}" alt="Annahda Magazine Cover Image" class="w-full">
                </a>
            </div>
            <div class="w-full lg:px-6 py-8">
                <h3 class="text-3xl font-semibold text-black">{{ date("F", mktime(0, 0, 0, $magazine->start_month, 10)) }} - {{ date("F", mktime(0, 0, 0, $magazine->end_month, 10)) }}</h3>

                <div class="w-full mt-8 grid lg:grid-cols-3 gap-6">
                    @foreach ($magazine->articles->take(3)->all() as $article)
                    <a href="{{route('article.show', ['category' => $article->category->slug, 'slug'=> $article->slug])}}" class="relative w-full h-[210px]">
                        <img src="{{env('IMAGEKIT_ENDPOINT') . '/' . $article->thumbnail}}" alt="Background Image" class="w-full h-full object-cover">
                
                        <!-- Overlay -->
                        <div class="p-4 absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-between">
                            <div class="w-full flex justify-end">
                                @if ($article->premium)
                                <svg class="h-5 fill-yellow-500 rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 2h-4v4.059a8.946 8.946 0 0 1 4 1.459V2zm-6 0H7v5.518a8.946 8.946 0 0 1 4-1.459V2zm1 20a7 7 0 1 0 0-14 7 7 0 0 0 0 14zm-1.225-8.519L12 11l1.225 2.481 2.738.397-1.981 1.932.468 2.727L12 17.25l-2.449 1.287.468-2.727-1.981-1.932 2.737-.397z"></path></svg>
                                @endif
                            </div>

                            <div class="w-full text-lg font-medium text-white">
                                {{$article->title}}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <ul class="w-fit mt-8 text-xl font-semibold text-black divide-y-2 divide-black">
                    @foreach ($magazine->articles->skip(3)->take(3)->all() as $article)
                    <li class="py-2 hover:text-primary-600">
                        <a href="{{route('article.show', ['category' => $article->category->slug, 'slug'=> $article->slug])}}" class="w-full md:flex items-end gap-4">
                            {{ $article->title }}

                            @if ($article->premium)
                            <svg class="h-6 fill-yellow-500 rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 2h-4v4.059a8.946 8.946 0 0 1 4 1.459V2zm-6 0H7v5.518a8.946 8.946 0 0 1 4-1.459V2zm1 20a7 7 0 1 0 0-14 7 7 0 0 0 0 14zm-1.225-8.519L12 11l1.225 2.481 2.738.397-1.981 1.932.468 2.727L12 17.25l-2.449 1.287.468-2.727-1.981-1.932 2.737-.397z"></path></svg>
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>

                <div class="w-full mt-6 flex items-center justify-between gap-8">
                    <div class="w-fit flex items-center gap-4">
                        <a href="{{route('printed_magazine')}}" type="button" class="text-black bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:ring-blue-300 font-medium text-lg px-6 py-2.5 focus:outline-none">Subscribe</a>
                        <a href="{{route('login')}}" type="button" class="text-black bg-gray-300 hover:bg-gray-400 focus:ring-4 focus:ring-blue-300 font-medium text-lg px-5 py-2.5 focus:outline-none">Sign In</a>
                    </div>

                    <a href="#">
                        <svg class="w-10 h-10 fill-black hover:fill-primary-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>