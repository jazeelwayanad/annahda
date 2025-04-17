@inject('carbon', 'Carbon\Carbon')
<x-public-layout>
    
    <div class="w-full text-center mb-6">
        <h1 class="text-3xl font-bold text-black">سجلات النهضة</h1>
    </div>

    @foreach ($archive as $year => $data)
    <section class="w-full bg-primary-100 p-6 mb-6">
        {{-- title --}}
        <div class="w-full pb-4 border-b border-gray-500">
            <h2 class="text-right text-xl font-bold"> إصدارات {{ $year }}</h2>
        </div>

        {{-- magazines --}}
        <div class="w-full mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-x-8 lg:gap-y-6">
            @foreach ($data as $magazine)
            <a href="{{ route('archive.show', ['year' => $year, 'start' => $carbon::create()->day(1)->month((int)$magazine->start_month)->format('F'), 'end' => $carbon::create()->day(1)->month((int)$magazine->end_month)->format('F')]) }}" class="w-full block">
                <div class="w-full">
                    <h3 class="text-lg font-semibold text-center">{{ $carbon::create()->day(1)->month((int)$magazine->start_month)->format('M') }} - {{ $carbon::create()->day(1)->month((int)$magazine->end_month)->format('M') }}</h3>

                    <img src="{{ $magazine->cover_image() }}" alt="" class="mt-4 w-full">
                </div>
            </a>
            @endforeach
        </div>
    </section>
    @endforeach

</x-public-layout>