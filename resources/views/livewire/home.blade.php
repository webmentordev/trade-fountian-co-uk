<section class="w-full h-[70vh]">
    <div class="max-w-[90%] m-auto py-2 px-4 h-full bg-gray-100 flex items-center justify-center">
        <div class="max-w-[75%] 1260px:max-w-[95%] w-full flex items-center 815px:flex-col justify-between">
            <div class="970:mb-12">
                <h1 class="text-[50px] 440px:text-4xl title leading-[60px]"><span class="text-[110px] 970:text-[80px] 440px:text-5xl">Welcome to</span> <br> Trade fountain <span class="text-3xl">.co.uk</span></h1>
                <p class="text-gray-600 mb-3">100% pure cotton fabric towels & Kitchen Napkins</p>
                <a href="#products" class="py-2 px-5 border border-gray-600 inline-block rounded-full transition-all hover:bg-transparent hover:text-black font-semibold bg-black text-white">Shop Now</a>
            </div>
            <img src="{{ asset('assets/napkin_image.png') }}" class="w-[45%] 815px:w-[60%] 440px:w-[80%]" alt="Trade Fountain Black Napkin Image">
        </div>
    </div>
</section>
<x-about />

<section class="w-full">
    <div class="max-w-6xl m-auto py-12 px-4 w-full" id="products">
        <h2 class="text-5xl title mb-4">New Arrivals</h2>
        @if (count($products))
            <div class="grid grid-cols-4 gap-6 970:grid-cols-3 785px:grid-cols-2 460px:grid-cols-1">
                @foreach ($products as $product)
                    <a href="{{ route('single.product', $product->slug) }}" class="w-full flex flex-col group">
                        <div class="flex items-center justify-center bg-gray-100 h-[300px] mb-3">
                            {{-- bg-{{ rand(1, 8) }} --}}
                            <img data-src="{{ asset('/storage/'. $product->image) }}" class="w-[70%] 460px:w-[50%] lazyload" alt="{{ $product->name }} Image">
                        </div>
                        <h3>{{ $product->short_name }}</h3>
                        <span class="price font-semibold text-gray-500 transition-all group-hover:translate-y-10 group-hover:opacity-0 group-hover:hidden">€{{ $product->price }}</span>
                        <div class="py-3 items-center px-4 mt-3 bg-black rounded-lg text-white hidden transition-all group-hover:translate-y-0 group-hover:opacity-1 group-hover:block">
                            <div class="flex items-center justify-center">
                                <img src="https://api.iconify.design/material-symbols:expand-circle-right.svg?color=%23fff" class="mr-2" alt="Cart Icon" width="23"> Read More
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="py-6 text-center">We don't have any product available at the moment! Please come later 🙂</p>
        @endif
    </div>
</section>