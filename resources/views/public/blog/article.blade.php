<x-public-layout>

<section class="w-full">
    <div dir="rtl" class="w-full max-w-5xl mx-auto px-6 text-right article-content-font">
        {{-- title --}}
        <h2 class="text-xl lg:text-2xl xl:text-3xl font-bold article-heading-font" lang="ar">{{$article->title}}</h2>
        <p class="mt-4 font-normal text-gray-700 dark:text-gray-400">{{$article->category->name}} | {{ $article->author->name }}</p>

        <div class="w-full mt-6">
            <img src="{{ env('IMAGEKIT_ENDPOINT') . '/' . $article->thumbnail }}" alt="{{$article->title}}" class="w-full">
        </div>

        {{-- date and category --}}
        {{-- <div class="mt-6 inline-flex items-center gap-4">
            <p class="text-xl text-primary-500 font-medium">{{ $article->category->name }}</p>
            <p class="text-base text-slate-700 font-semibold">{{ $article->updated_at->format("d/m/Y") }}</p>
        </div> --}}
        
        {{-- author --}}
        {{-- <p class="mt-2 text-base text-primary-500 font-medium">{{ $article->author->name }}</p> --}}
        {{-- content --}}
        <div class="w-full max-w-4xl mx-auto mt-6 text-base lg:text-lg text-justify" lang="ar">
            @if ($article->premium)
            {!! str(Str::limit($article->content, Str::length($article->content) / 2))->sanitizeHtml() !!}
            @else
            {!! str($article->content)->sanitizeHtml() !!}
            @endif
        </div>

        {{-- premium  --}}
        @if ($article->premium)
        <div class="w-full min-h-72 bg-primary-50 mt-6 flex flex-col items-center justify-center px-6" dir="ltr">
            {{-- <hr class="w-52 bg-gray-700 mx-auto" style="height: 2px;"> --}}

            <a href="{{ route('annahda_plus') }}"><button class="w-full max-w-fit mt-8 text-white bg-rose-900 hover:bg-black focus:bg-black focus:text-white font-medium text-center text-base px-6 py-2.5 focus:outline-none cursor-pointer">BECOME PLUS MEMBER TO READ FULL ARTICLE</button></a>

            @guest
            <div class="mt-8 flex flex-col items-center justify-center">
                <p class="text-base font-medium text-gray-800">Already a Plus Member?</p>
                <a href="{{ route('auth.login', ['redirect' => request()->path()]) }}"><button class="w-full max-w-fit mt-4 text-white bg-black hover:bg-gray-900 focus:bg-black focus:text-white font-medium text-center text-base px-6 py-2.5 focus:outline-none cursor-pointer">Login</button></a>
            </div>
            @endguest
        </div>
        @endif
    </div>
</section>


@if (count($related_articles))
<section class="w-full mt-10">
    <div class="w-full max-w-5xl mx-auto px-6">
        {{-- title --}}
        <div class="w-full flex justify-between items-center gap-6">
            <a href="{{ route('category.articles', $article->category->slug) }}" class="w-fit text-black bg-white hover:bg-black hover:text-white focus:bg-white focus:text-black border border-black font-medium text-base px-4 py-1 focus:outline-none cursor-pointer inline-flex items-center gap-2 group">
                <svg class="w-5 h-5 fill-black group-hover:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
                المزيد
            </a>

            <h1 class="font-extrabold text-3xl text-right" lang="ar">محتويات الأخيرة </h1>
        </div>

        <div class="w-full mt-8 text-right grid grid-cols-1 lg:grid-cols-2 gap-6" dir="rtl">
            @foreach ($related_articles as $article)
            <a href="{{route('article.show', ['category' => $article->category->slug, 'slug'=> $article->slug])}}" class="flex flex-col items-center bg-gray-100 border-0 border-gray-200 shadow-sm md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 group">
                <img class="object-cover w-full h-96 md:h-auto md:w-48" src="{{ env('IMAGEKIT_ENDPOINT') . '/tr:w-750,h-650/' . $article->thumbnail }}" alt="{{$article->title}}">
                <div class="w-full max-w-md flex flex-col justify-between py-4 px-6 leading-normal">
                    <h5 class="text-2xl font-bold tracking-tight text-black dark:text-white group-hover:text-primary-500">{{$article->title}}</h5>
                    <p class="mt-6 font-normal text-gray-700 dark:text-gray-400">{{$article->category->name}} | {{ $article->author->name }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

</x-public-layout>