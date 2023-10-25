
<x-slot name="header">
    <h2 class="text-xl text-gray-800 leading-tight font-semibold">
        {{ __('Product Images Gellery') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form wire:submit="create" enctype="multipart/form-data" class="flex items-end p-6">
                <div class="w-full mr-3">
                    <x-input-label for="images" :value="__('Multiple Images')" />
                    <x-file id="images" class="block mt-1 w-full" type="file" wire:model="images" accept="images/*" :value="old('images')" multiple required />
                    <x-input-error :messages="$errors->get('images')" class="mt-2" />
                </div>
                
                <div class="w-fit">
                    <x-input-label for="images" :value="__('Product')" />
                    <x-select name="product" class="w-fit" wire:model="product">
                        <option value="" selected>--Select the product--</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->short_name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('product')" class="mt-2" />
                </div>
                
                <x-primary-button class="ml-3">
                    {{ __('Upload') }}
                </x-primary-button>
            
            </form>
            @if (count($gellery))
                <table class="w-full">
                    <tr class="text-sm text-white bg-gray-800">
                        <th class="p-2 text-start">Image</th>
                        <th class="text-start">Product</th>
                        <th class="text-start">IsActive</th>
                        <th class="p-2 text-end">SignedUp</th>
                    </tr>
                    @foreach ($gellery as $item)
                        <tr class="text-sm odd:bg-gray-100">
                            <td class="p-2 text-start"><a href="{{ asset('/storage/'.$item->url) }}" target="_blank"><img data-src="{{ asset('/storage/'.$item->url) }}" class="lazyload" loading="lazy" width="60"></a></td>
                            <td class="text-start">{{ $item->product->short_name }}</td>
                            <td class="text-end p-2">
                                @if ($item->is_active == true)
                                    <span wire:click="updateStatus({{ $item->id }}, false)" class="bg-green-600/10 cursor-pointer rounded-full border-green-600 border p-1 font-semibold px-4 text-green-600">Active</span>
                                @elseif($item->is_active == false)
                                    <span wire:click="updateStatus({{ $item->id }}, true)" class="bg-red-600/10 cursor-pointer rounded-full border-red-600 border p-1 font-semibold px-4 text-red-600">InActive</span>
                                @endif
                            </td>
                            <td class="p-2 text-end">{{ $item->created_at->format('D d-M-Y H:i:s A') }}</td>
                        </tr>
                    @endforeach
                </table>
                @if ($gellery->hasPages())
                    <div class="py-3">
                        {{ $gellery->links() }}
                    </div>
                @endif
            @else
                <p class="py-3 text-center">No image data exist in gellery!</p>
            @endif
        </div>
    </div>
</div>