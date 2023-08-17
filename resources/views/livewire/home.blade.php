@livewire('navbar')
<section class="w-full h-[70vh]">
    <div class="max-w-[90%] m-auto py-2 px-4 h-full bg-gray-100 flex items-center justify-center">
        <div class="max-w-[70%] w-full flex items-center justify-between">
            <div>
                <h1 class="text-[50px] title leading-[60px]"><span class="text-[120px]">Welcome to</span> <br> Trade fountain <span class="text-3xl">.co.uk</span></h1>
                <p class="text-gray-600 mb-3">100% pure cotton fabric towels & Kitchen Napkins</p>
                <a href="#products" class="py-2 px-5 border border-gray-600 inline-block rounded-full transition-all hover:bg-transparent hover:text-black font-semibold bg-black text-white">Shop Now</a>
            </div>
            <img src="{{ asset('assets/napkin_image.png') }}" class="w-[50%]" alt="Trade Fountain Black Napkin Image">
        </div>
    </div>
</section>

<section class="w-full">
    <div class="max-w-6xl m-auto py-12 px-4 w-full" id="products">
        <h2 class="text-5xl title mb-4">New Arrivals</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div class="w-full flex flex-col group">
                <a href="#">
                    <div class="flex items-center justify-center bg-{{ rand(1, 8) }} h-[300px] mb-3">
                        <img src="{{ asset('/storage/'. $product->image) }}" class="w-[70%]" alt="{{ $product->name }} Image">
                    </div>
                    <h3>{{ $product->short_name }}</h3>
                    <span class="price font-semibold text-gray-500 transition-all group-hover:translate-y-10 group-hover:opacity-0 group-hover:hidden">${{ $product->price }}</span>
                </a>
                <button class="py-3 items-center px-4 mt-3 bg-black rounded-lg text-white hidden transition-all group-hover:translate-y-0 group-hover:opacity-1 group-hover:block">
                    <div class="flex items-center justify-center">
                        <img src="https://api.iconify.design/solar:cart-large-broken.svg?color=%23fff" class="mr-2" alt="Cart Icon" width="23"> Add to Cart
                    </div>
                </button>
            </div>
        @endforeach
        </div>
    </div>
</section>