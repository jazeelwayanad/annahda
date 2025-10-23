<div>
    <form wire:submit="create">
        {{ $this->form }}


        <button type="submit" class="mt-6 flex w-fit justify-center rounded-md bg-primary-600 px-4 py-2 text-sm/6 font-semibold text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Submit Article</button>
    </form>
    
    <x-filament-actions::modals />
</div>