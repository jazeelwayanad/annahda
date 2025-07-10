<main class="w-full py-16 flex flex-col justify-center items-center max-w-5xl mx-auto px-6 bg-white">
    <!-- search form -->
    <div class="w-full max-w-3xl mx-auto">
        <form action="" method="GET" class="w-full flex items-center gap-4">   
            <label for="voice-search" class="sr-only">Search</label>
            <button type="submit" class="p-0 text-black bg-white focus:outline-none hover:text-primary-600">
                <svg class="w-7 h-7 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </button>
            <input type="text" wire:model="query" name="query" id="voice-search" class="bg-white border-0 border-b-2 border-gray-800 text-gray-900 text-lg text-center rounded-none focus:outline-none focus:border-primary-500 block w-full ps-10 p-2.5 focus:ring-0" autofocus placeholder="ابحث هنا" required />
        </form>
    </div>

    {{-- search loading --}}
    <div class="w-full max-w-3xl mx-auto mt-2 py-8" wire:loading>
        <div class="flex items-center justify-center">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-primary-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
        <p class="mt-2 text-lg font-medium text-center text-gray-600">جاري البحث...</p>
    </div>

    <!-- articles grid -->
    <div class="w-full mt-8" wire.loading.remove>
        <div class="w-full grid md:grid-cols-3 gap-4 rtl text-right" dir="rtl">
            @forelse ($articles as $article)
            <a href="{{route('article.show', ['category' => $article->category->slug, 'slug'=> $article->slug])}}" class="w-full bg-white border border-gray-600 cursor-pointer block group">
                <img src="{{ $article->thumbnail_url }}" alt="thumbnail" class="w-full">

                <div class="w-full p-4">
                    <p class="text-xl font-bold text-black hover:text-primary-600 group-hover:text-primary-600">{{$article->title}}</p>
                    <p class="mt-2 text-base text-gray-700">{{$article->category->name}} | {{ $article->author->name }}</p>
                </div>
            </a>
            @empty
            <div class="w-full col-span-3">
                <p class="text-lg font-semibold text-gray-600 text-center" dir="ltr">No articles found!</p>
            </div>
            @endforelse
        </div>


        {{-- Pagination links --}}
        @if ($articles && $articles->count() > 3)
        <div class="mt-6">
            {{  $articles?->links() }}
        </div>
        @endif
    </div>
</main>