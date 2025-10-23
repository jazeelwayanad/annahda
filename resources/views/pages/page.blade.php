<x-public-layout>

    <section class="w-full py-8 mt-6">
        <div dir="rtl" class="w-full max-w-2xl mx-auto p-6 text-right article-content-font">
            {{-- title --}}
            <h2 class="text-xl lg:text-2xl xl:text-3xl font-bold article-heading-font">{{$page->title}}</h2>

            <div class="w-full mt-6">
                <img src="{{ $page->thumbnail_url }}" alt="{{$page->title}}" class="rounded-2xl">
            </div>
            
            {{-- content --}}
            <div class="mt-2 text-base">
                {!! str($page->content)->sanitizeHtml() !!}
            </div>
        </div>
    </section>

</x-public-layout>