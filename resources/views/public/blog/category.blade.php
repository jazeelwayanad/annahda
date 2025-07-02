<x-public-layout>

    <div class="w-full bg-gray-100 p-4">
        <h1 class="font-extrabold text-3xl text-center article-heading-font" lang="ar">{{$category->name}}</h1>
    </div>  

    @if (count($articles))
    <section dir="rtl" class="w-full mt-6 bg-white">
        <div class="w-full grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach($articles as $article)
            <div class="w-full max-w-sm bg-white border border-gray-500 shadow-sm dark:bg-gray-800 dark:border-gray-700 group">
                <a href="{{route('article.show', ['category' => $article->category->slug, 'slug'=> $article->slug])}}" class="w-full relative">
                    @if ($article->premium)
                    <div class="w-full flex justify-end absolute top-2 left-2">
                        <svg class="h-5 fill-yellow-500 rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 2h-4v4.059a8.946 8.946 0 0 1 4 1.459V2zm-6 0H7v5.518a8.946 8.946 0 0 1 4-1.459V2zm1 20a7 7 0 1 0 0-14 7 7 0 0 0 0 14zm-1.225-8.519L12 11l1.225 2.481 2.738.397-1.981 1.932.468 2.727L12 17.25l-2.449 1.287.468-2.727-1.981-1.932 2.737-.397z"></path></svg>
                    </div>
                    @endif
                    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->slug }}" class="w-full" />
                </a>
                <div class="p-5">
                    <a href="{{route('article.show', ['category' => $article->category->slug, 'slug'=> $article->slug])}}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-black dark:text-white group-hover:text-primary-500">{{$article->title}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $article->author->name }}</p>
                </div>
            </div>
            @endforeach                
        </div>
        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    </section>
    @else
    <div class="text-gray-700">No articles available</div>
    @endif
    
</x-public-layout>