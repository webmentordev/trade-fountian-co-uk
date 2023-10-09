<section class="w-full h-[70vh]">
    <div class="max-w-[90%] m-auto py-2 px-4 h-full bg-gray-100 flex items-center justify-center">
        <div class="max-w-[75%] 1260px:max-w-[95%] w-full flex items-center 815px:flex-col justify-between">
            <div class="970:mb-12">
                <h1 class="text-[50px] 440px:text-4xl title leading-[60px]"><span class="text-[110px] 970:text-[80px] 440px:text-5xl">Welcome to</span> <br> Trade fountain <span class="text-3xl">.co.uk</span></h1>
                <p class="text-gray-600 mb-3">100% pure cotton fabric towels & Kitchen Napkins</p>
                <div class="flex">
                    <a href="#products" class="py-2 px-5 border border-gray-600 inline-block rounded-full transition-all hover:bg-transparent hover:text-black font-semibold bg-black text-white">Shop Now</a>
                    <a href="https://www.amazon.co.uk/stores/Trade+Fountain/page/96B0053E-A35A-4B24-A7AF-D325AF739606?ref_=ast_bln" class="py-2 px-5 border border-gray-600 ml-3 rounded-full transition-all hover:bg-black/70 font-semibold bg-black text-white flex items-center"><img src="https://api.iconify.design/mdi:amazon.svg?color=%23ffffff" class="mr-1" title="TradeFountain Amazon Store" width="25px" alt="Amazon"> Amazon</a>
                </div>
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
            <div class="grid grid-cols-3 gap-6 970:grid-cols-3 785px:grid-cols-2 460px:grid-cols-1">
                @foreach ($products as $product)
                    <a href="{{ route('single.product', $product->slug) }}" class="w-full flex flex-col group">
                        <div class="flex items-center justify-center bg-gray-100 h-[300px] mb-3">
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
        @else
            <p class="py-6 text-center">We don't have any product available at the moment! Please come later 🙂</p>
        @endif
    </div>
</section>

<section>
    <div class="max-w-6xl m-auto py-12 px-4 w-full">
        <div class="grid grid-cols-2 gap-6">
            <img src="{{ asset('assets/quanlity.jpg') }}" alt="Trade Fountain Napkins">
            <div class="h-fit px-6 py-4">
                <h3 class="text-2xl mb-3 font-semibold">Multi Colour Napkins</h3>
                <p>Our Table Napinks are available in multiple colors. It will</p>
            </div>
        </div>
    </div>
</section>