<x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
        <a href="{{ route('products.create') }}" class="py-2 px-4 rounded-md bg-indigo-600 text-white font-semibold">Create Product</a>
    </div>
</x-slot>

<section class="w-full">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(count($products))
                        <table class="w-full text-sm rounded-lg overflow-hidden">
                            <tr class="bg-black text-gray-100">
                                <th class="text-start p-2">Image</th>
                                <th class="text-start p-2">Name</th>
                                <th class="text-start p-2">Price</th>
                                <th class="text-end  p-2">Status</th>
                                <th class="text-end  p-2">Created</th>
                                <th class="text-end  p-2">LastUpdated</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr class="odd:bg-gray-100">
                                    <td class="text-start p-2"><img src="{{ asset('/storage/'.$product->image) }}" alt="{{ $product->name }} Image" width="50"></td>
                                    <td class="text-start p-2">{{ $product->name }}</td>
                                    <td class="text-start p-2">${{ $product->price }}</td>
                                    <td class="text-end p-2">
                                        @if ($product->is_active)
                                            <span wire:click="updateStatus({{ $product->id }}, false)" class="bg-green-600/10 cursor-pointer rounded-full border-green-600 border p-1 font-semibold px-4 text-green-600">Active</span>
                                        @else
                                            <span wire:click="updateStatus({{ $product->id }}, true)" class="bg-red-600/10 cursor-pointer rounded-full border-red-600 border p-1 font-semibold px-4 text-red-600">InActive</span>
                                        @endif
                                    </td>
                                    <td class="text-end p-2">{{ $product->created_at->diffForHumans() }}</td>
                                    <td class="text-end p-2">{{ $product->updated_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </table>
                        @if ($products->hasPages())
                            <div class="p-3 bg-gray-50 rounded-lg">
                                {{ $products->links() }}
                            </div>
                        @endif
                    @else
                        <p class="py-3 text-center">Product do not exist!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>