<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Article') }}
        </h2>

        <div>
            <a href="{{route('app.blog.index')}}" class="w-fit justify-center rounded-md bg-gray-600 px-4 py-2 text-sm/6 font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Go Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white px-6 py-8 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:app.blog.create-article />
            </div>
        </div>
    </div>
</x-app-layout>