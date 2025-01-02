<x-admin-layout>
<div class="w-full">
    <h2 class="text-xl font-bold text-gray-900">Dashboard</h2>

    <div class="w-full mt-4">
        <div class="w-full grid lg:grid-cols-5 gap-4">
            <div class="w-full p-6 bg-white border border-zinc-300 rounded-lg">
                <p class="text-xl font-black text-black">50</p>
                <p class="mt-1 text-sm text-gray-600 capitalize">Total Vists Today</p>
            </div>
            <div class="w-full p-6 bg-white border border-zinc-300 rounded-lg">
                <p class="text-xl font-black text-black">50</p>
                <p class="mt-1 text-sm text-gray-600 capitalize">Total Articles</p>
            </div>
            <div class="w-full p-6 bg-white border border-zinc-300 rounded-lg">
                <p class="text-xl font-black text-black">50</p>
                <p class="mt-1 text-sm text-gray-600 capitalize">Total Subscribers</p>
            </div>
            <div class="w-full p-6 bg-white border border-zinc-300 rounded-lg">
                <p class="text-xl font-black text-black">50</p>
                <p class="mt-1 text-sm text-gray-600 capitalize">Total Authors</p>
            </div>
            <div class="w-full p-6 bg-white border border-zinc-300 rounded-lg">
                <p class="text-xl font-black text-black">50</p>
                <p class="mt-1 text-sm text-gray-600 capitalize">Total Article Requests</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="module">
    $(document).ready(function(){
        //
    });
</script>
@endpush
</x-admin-layout>