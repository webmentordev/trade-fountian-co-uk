<section class="w-full min-h-[700px] bg-gray-100 splide" id="image-carousel">
    <div class="splide__track bg-cover bg-center " style="background-image: url({{ asset('assets/26669.png') }})">
        <div class="splide__list min-h-[700px] flex items-center">
            <div class="py-2 splide__slide px-4 h-full flex items-center justify-center">
                <div class="max-w-[1000px] 1260px:max-w-[95%] 815px:flex-col w-full flex items-center justify-between">
                    <div class="970:mb-12">
                        <h1 class="text-8xl 555:text-4xl title leading-[70px] 870px:text-6xl">Buy 100% Pure <br> <span class="text-6xl">Cotton Napkins</span></h1>
                        <p class="text-gray-600 mb-3">Now available in UK with 3 Days Delivery</p>
                        <div class="flex">
                            <a href="#products" class="py-2 px-5 border border-gray-600 inline-block rounded-full transition-all hover:bg-transparent hover:text-black font-semibold bg-black text-white">Shop Now</a>
                            <a href="https://www.amazon.co.uk/stores/Trade+Fountain/page/96B0053E-A35A-4B24-A7AF-D325AF739606?ref_=ast_bln" class="py-2 px-5 border border-gray-600 ml-3 rounded-full transition-all hover:bg-black/70 font-semibold bg-black text-white flex items-center"><img src="https://api.iconify.design/mdi:amazon.svg?color=%23ffffff" class="mr-1" title="TradeFountain Amazon Store" width="25px" alt="Amazon"> Amazon</a>
                        </div>
                    </div>
                    <img src="{{ asset('assets/napkin_image.png') }}" class="max-w-[450px] 440px:w-[80%]" alt="Trade Fountain Black Napkin Image">
                </div>
            </div>
            <div class="py-2 splide__slide px-4 h-full flex items-center justify-center">
                <div class="max-w-[900px] 1260px:max-w-[95%] 815px:flex-col w-full flex items-center justify-between">
                    <div class="970:mb-12">
                        <h1 class="text-8xl 555:text-4xl title leading-[70px] 870px:text-6xl">Buy 100% Pure <br> <span class="text-6xl">Cotton Napkins</span></h1>
                        <p class="text-gray-600 mb-3">Now available in UK with 3 Days Delivery</p>
                        <div class="flex">
                            <a href="#products" class="py-2 px-5 border border-gray-600 inline-block rounded-full transition-all hover:bg-transparent hover:text-black font-semibold bg-black text-white">Shop Now</a>
                            <a href="https://www.amazon.co.uk/stores/Trade+Fountain/page/96B0053E-A35A-4B24-A7AF-D325AF739606?ref_=ast_bln" class="py-2 px-5 border border-gray-600 ml-3 rounded-full transition-all hover:bg-black/70 font-semibold bg-black text-white flex items-center"><img src="https://api.iconify.design/mdi:amazon.svg?color=%23ffffff" class="mr-1" title="TradeFountain Amazon Store" width="25px" alt="Amazon"> Amazon</a>
                        </div>
                    </div>
                    <img src="{{ asset('assets/kitchen_towels.png') }}" class="max-w-[450px] 870px:max-w-[300px]" alt="Trade Fountain Black Napkin Image">
                </div>
            </div>
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
        <div class="grid grid-cols-2 gap-6 780:grid-cols-1">
            <img class="rounded-lg w-full" src="{{ asset('assets/quanlity.jpg') }}" title="Multi color cotton napkins set" alt="Trade Fountain Napkins">
            <div class="h-fit px-6 py-4 410px:px-0">
                <h3 class="text-3xl mb-3 font-semibold">Multi Colour Napkins</h3>
                <p class="text-lg">The Multi Color 100% Cotton Napkins offer a vibrant and practical addition to any dining experience. Crafted from high-quality, pure cotton material, these napkins not only provide a soft and luxurious feel but also ensure durability and easy maintenance. The multi-color design adds a visually appealing touch, making them versatile for various occasions, from casual family meals to festive gatherings.</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="max-w-6xl m-auto py-12 px-4 w-full">
        <div class="grid grid-cols-2 gap-6 780:grid-cols-1 mb-12">
            <div class="h-fit pr-6 py-4 410px:px-0 780:order-2">
                <h3 class="text-3xl mb-3 font-semibold">Multi Purpose Napkins & Towels</h3>
                <p class="text-lg">Multi Purpose Napkins & Towels are so useful in many situations. They are like magic helpers in the kitchen and around the house. These towels, usually made from strong materials like cotton or microfiber, are great for cleaning up spills, wiping surfaces, or just making things tidy. You can use them during cooking to keep things clean, or put them on the dining table to make it look nice. The best part is how fast they dry things and how absorbent they are. It's like having a friend that's always ready to help with any mess or task</p>
            </div>
            <img class="rounded-lg 780:order-1 w-full" src="{{ asset('assets/pure.jpg') }}" title="Multi purpose cotton napkins set" alt="Trade Fountain Napkins">
        </div>
        <img class="rounded-lg w-full" src="{{ asset('assets/multi.jpg') }}" title="Multi Purpose Napkins & Towels" alt="Trade Fountain Napkins">
    </div>
</section>

<script>
    document.addEventListener( 'DOMContentLoaded', function () {
      new Splide( '#image-carousel', {
            autoStart: true,
            rewind: true
        }).mount();
    } );
  </script>