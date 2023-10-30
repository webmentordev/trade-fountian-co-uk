<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Update Products') }}
            </h2>
            <a href="{{ route('products.listing') }}" class="py-2 px-4 rounded-md bg-indigo-600 text-white font-semibold">Go Back</a>
        </div>
    </x-slot>
    <section class="w-full">
        <div class="w-full max-w-2xl m-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
            <form action="{{ route('update.product', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @if (session('success'))
                    <x-alerts.success :message="session('success')" />
                @endif
                <div class="grid grid-cols-2 gap-4 mb-3">
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Product Name')" />
                        <x-text-input id="name" value="{{ $product->name }}" autocomplete="off" name="name" class="block mt-1 w-full" type="text" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
    
                    <div class="w-full">
                        <x-input-label for="short" :value="__('Short Name')" />
                        <x-text-input id="short" value="{{ $product->short_name }}" autocomplete="off" name="short" class="block mt-1 w-full" type="text" required />
                        <x-input-error :messages="$errors->get('short')" class="mt-2" />
                    </div>
        
                    <div class="w-full">
                        <x-input-label for="price" :value="__('Product Price')" />
                        <x-text-input id="price" value="{{ $product->price }}" autocomplete="off" name="price" class="block mt-1 w-full" type="number" step="0.01" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="slug" :value="__('Product Slug')" />
                        <x-text-input id="slug" value="{{ $product->slug }}" autocomplete="off" name="slug" class="block mt-1 w-full" type="text" required />
                        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="seo" :value="__('Product SEO')" />
                        <x-text-input id="seo" value="{{ $product->seo }}" autocomplete="off" name="seo" class="block mt-1 w-full" type="text" required />
                        <x-input-error :messages="$errors->get('seo')" class="mt-2" />
                    </div>
    
                    <div class="w-full">
                        <x-input-label for="description" :value="__('Product Description')" />
                        <x-text-input id="description" value="{{ $product->description }}" autocomplete="off" name="description" class="block mt-1 w-full" type="text" required />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
    
                    <div class="w-full col-span-2">
                        <x-input-label for="image" :value="__('Product Image')" />
                        <x-file id="image" autocomplete="off" name="image" class="block mt-1 w-full" type="file" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
    
                    <div class="w-full col-span-2">
                        <x-input-label for="body" :value="__('Product Body')" />
                        <textarea id="editor" name="body">{{ $product->body }}</textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
</x-app-layout>