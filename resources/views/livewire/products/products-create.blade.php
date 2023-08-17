<x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Products') }}
        </h2>
        <a href="{{ route('products.listing') }}" class="py-2 px-4 rounded-md bg-indigo-600 text-white font-semibold">Go Back</a>
    </div>
</x-slot>
<section class="w-full">
    <div class="w-full max-w-2xl m-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
        <form method="POST" wire:submit.prevent="create">
            @if (session('success'))
                <x-alerts.success :message="session('success')" />
            @endif
            
            <div wire:loading wire:target="create">
                <x-alerts.loading message="Posting..." />
            </div>
            
            @if ($image)
                Photo Preview:
                <img src="{{ $image->temporaryUrl() }}">
            @endif
            <div class="grid grid-cols-2 gap-4 mb-3">
                <div class="w-full">
                    <x-input-label for="name" :value="__('Product Name')" />
                    <x-text-input id="name" autocomplete="off" wire:model.debounce.1000ms="name" class="block mt-1 w-full" type="text" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="short" :value="__('Short Name')" />
                    <x-text-input id="short" autocomplete="off" wire:model.debounce.1000ms="short" class="block mt-1 w-full" type="text" required />
                    <x-input-error :messages="$errors->get('short')" class="mt-2" />
                </div>
    
                <div class="w-full">
                    <x-input-label for="price" :value="__('Product Price')" />
                    <x-text-input id="price" autocomplete="off" wire:model.debounce.1000ms="price" class="block mt-1 w-full" type="number" step="0.01" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="description" :value="__('Product Description')" />
                    <x-text-input id="description" autocomplete="off" wire:model.debounce.1000ms="description" class="block mt-1 w-full" type="text" required />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="w-full col-span-2">
                    <x-input-label for="image" :value="__('Product Image')" />
                    <x-file id="image" autocomplete="off" wire:model.debounce.1000ms="image" class="block mt-1 w-full" type="file" required />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="w-full col-span-2">
                    <x-input-label for="body" :value="__('Product Body')" />
                    <x-text-area id="body" autocomplete="off" wire:model.debounce.1000ms="body" class="block mt-1 w-full" type="text" required />
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</section>