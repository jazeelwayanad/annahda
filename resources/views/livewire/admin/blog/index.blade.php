<div class="w-full">
    <div class="w-full mb-6 flex items-center justify-between gap-6">
        <h2 class="text-xl font-bold text-gray-900">Articles</h2>
        
        <div>
            <a href="{{ route('admin.blog.create') }}" class="flex w-fit justify-center rounded-md bg-primary-600 px-4 py-2 text-sm/6 font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Create Article</a>
        </div>
    </div>

    {{$this->table}}
</div>