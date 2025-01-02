<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Articles') }}
        </h2>

        <div>
            <a href="{{route('app.blog.create')}}" class="w-fit justify-center rounded-md bg-primary-600 px-4 py-2 text-sm/6 font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">New Article</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white px-6 py-8 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:app.blog.list-articles />
            </div>
        </div>
    </div>
</x-app-layout>