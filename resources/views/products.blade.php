@extends('layouts.apps')
@section('content')
    <section class="w-full">
        <div class="max-w-6xl m-auto py-12 px-4 w-full" id="products">
            <div class="text-center mb-4">
                <h2 class="text-5xl title mb-2">Trade Fountain products</h2>
                <p>Here is the listing of all our products that wehave to offer</p>
            </div>
            @if (count($products))
                <div class="grid grid-cols-3 gap-6 970:grid-cols-3 785px:grid-cols-2 460px:grid-cols-1">
                    @foreach ($products as $product)
                        <a href="{{ route('single.product', $product->slug) }}" class="w-full flex flex-col group">
                            <div class="flex items-center justify-center bg-white rounded-lg overflow-hidden h-[400px] mb-3">
                                {{-- bg-{{ rand(1, 8) }} --}}
                                <img data-src="{{ asset('/storage/'. $product->image) }}" class="w-[70%] 460px:w-[50%] lazyload" title="{{ $product->name }}" alt="{{ $product->name }} Image">
                            </div>
                            <h3>{{ $product->short_name }}</h3>
                            <span class="price font-semibold text-gray-500 transition-all">£{{ $product->price }} GBP</span>
                            <div class="py-3 items-center px-4 mt-3 bg-black rounded-lg text-white transition-all">
                                <div class="flex items-center justify-center">
                                    <img src="https://api.iconify.design/material-symbols:expand-circle-right.svg?color=%23fff" class="mr-2" alt="Cart Icon" width="23"> Buy Now
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection