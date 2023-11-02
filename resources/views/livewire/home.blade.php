<section class="w-full min-h-[700px] bg-gray-100 splide py-[30px]" id="image-carousel">
    <div class="splide__track bg-cover bg-center " style="background-image: url({{ asset('assets/26669.png') }})">
        <div class="splide__list min-h-[700px] flex items-center">
            <div class="py-2 splide__slide px-4 h-full flex items-center justify-center">
                <div class="max-w-[1000px] 1260px:max-w-[95%] 815px:flex-col w-full flex items-center justify-between">
                    <img src="{{ asset('assets/free_shipping.png') }}" class="w-full" alt="Trade Fountain Black Napkin Image">
                </div>
            </div>
            <div class="py-2 splide__slide px-4 h-full flex items-center justify-center">
                <div class="max-w-[1000px] 1260px:max-w-[95%] 815px:flex-col w-full flex items-center justify-between">
                    <div class="970:mb-12">
                        <h1 class="text-8xl 555:text-4xl title leading-[70px] 870px:text-6xl">Buy 100% Pure <br> <span class="text-6xl">Cotton Napkins</span></h1>
                        <p class="text-gray-600 mb-3">Now available in UK with Next Day Delivery</p>
                        <div class="flex">
                            <a href="#products" class="py-2 px-5 border border-gray-600 inline-block rounded-full transition-all hover:bg-transparent hover:text-black font-semibold bg-black text-white">Shop Now</a>
                            <a rel="nofollow" href="https://www.amazon.co.uk/stores/Trade+Fountain/page/96B0053E-A35A-4B24-A7AF-D325AF739606?ref_=ast_bln" class="py-2 px-5 border border-gray-600 ml-3 rounded-full transition-all hover:bg-black/70 font-semibold bg-black text-white flex items-center"><img src="https://api.iconify.design/mdi:amazon.svg?color=%23ffffff" class="mr-1" title="TradeFountain Amazon Store" width="25px" alt="Amazon"> Amazon</a>
                        </div>
                    </div>
                    <img src="{{ asset('assets/napkin_image.png') }}" class="max-w-[450px] 440px:w-[80%]" alt="Trade Fountain Black Napkin Image">
                </div>
            </div>
            <div class="py-2 splide__slide px-4 h-full flex items-center justify-center">
                <div class="max-w-[900px] 1260px:max-w-[95%] 815px:flex-col w-full flex items-center justify-between">
                    <div class="970:mb-12">
                        <h1 class="text-8xl 555:text-4xl title leading-[70px] 870px:text-6xl">100% Pure <br> <span class="text-6xl">Tea Towels</span></h1>
                        <p class="text-gray-600 mb-3">Now available in UK with Next Day Delivery</p>
                        <div class="flex">
                            <a href="#products" class="py-2 px-5 border border-gray-600 inline-block rounded-full transition-all hover:bg-transparent hover:text-black font-semibold bg-black text-white">Shop Now</a>
                            <a href="https://www.amazon.co.uk/stores/Trade+Fountain/page/96B0053E-A35A-4B24-A7AF-D325AF739606?ref_=ast_bln" class="py-2 px-5 border border-gray-600 ml-3 rounded-full transition-all hover:bg-black/70 font-semibold bg-black text-white flex items-center" rel="nofollow"><img src="https://api.iconify.design/mdi:amazon.svg?color=%23ffffff" class="mr-1" title="TradeFountain Amazon Store" width="25px" alt="Amazon"> Amazon</a>
                        </div>
                    </div>
                    <img src="{{ asset('assets/kitchen_towels.png') }}" class="max-w-[450px] 870px:max-w-[300px]" alt="Trade Fountain Black Napkin Image">
                </div>
            </div>
        </div>
    </div>
</section>

<x-about />
@if (count($reviews))
    <section class="w-full">
        <div class="max-w-6xl m-auto py-12 px-4 w-full">
            <div class="m-auto w-fit">
                <div class="flex items-center justify-center">
                    <span class="font-semibold text-7xl price">4.7</span>
                    <div class="flex flex-col ml-2">
                        <ul class="flex">
                            <li><img width="25px" src="https://api.iconify.design/material-symbols:star.svg?color=%23FFA41C" alt="Review star"></li>
                            <li><img width="25px" src="https://api.iconify.design/material-symbols:star.svg?color=%23FFA41C" alt="Review star"></li>
                            <li><img width="25px" src="https://api.iconify.design/material-symbols:star.svg?color=%23FFA41C" alt="Review star"></li>
                            <li><img width="25px" src="https://api.iconify.design/material-symbols:star.svg?color=%23FFA41C" alt="Review star"></li>
                            <li><img width="25px" src="https://api.iconify.design/material-symbols:star-half.svg?color=%23FFA41C" alt="Review star"></li>
                        </ul>
                        <p class="text-gray-500">from <b>1500+</b> customers</p>
                    </div>
                </div>
                <h2 class="text-3xl mb-4 title">What our amazon customers think</h2>
            </div>
            <div class="grid grid-cols-2 gap-6 border-t border-gray-100 py-6 780:grid-cols-1">
                @foreach ($reviews as $review)
                    <x-review :review="$review" />
                @endforeach
            </div>
        </div>
    </section>
@endif

<section class="w-full">
    <div class="max-w-6xl m-auto py-12 px-4 w-full" id="products">
        <h2 class="text-5xl title mb-4">New Arrivals</h2>
        @if (count($napkins))
            <div class="grid grid-cols-3 gap-6 970:grid-cols-3 785px:grid-cols-2 460px:grid-cols-1">
                @foreach ($napkins as $napkin)
                    <a href="{{ route('single.product', $napkin->slug) }}" class="w-full flex flex-col group">
                        <div class="flex items-center justify-center bg-gray-100 h-[400px] mb-3">
                            {{-- bg-{{ rand(1, 8) }} --}}
                            <img data-src="{{ asset('/storage/'. $napkin->image) }}" class="w-[70%] 460px:w-[50%] lazyload" title="{{ $napkin->name }}" alt="{{ $napkin->name }} Image">
                        </div>
                        <h3>{{ $napkin->short_name }}</h3>
                        <span class="price font-semibold text-gray-500 transition-all">£{{ $napkin->price }} GBP</span>
                        <div class="py-3 items-center px-4 mt-3 bg-black rounded-lg text-white transition-all">
                            <div class="flex items-center justify-center">
                                <img src="https://api.iconify.design/material-symbols:expand-circle-right.svg?color=%23fff" class="mr-2" alt="Cart Icon" width="23"> Buy Now
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

        @if (count($towels))
            <div class="grid grid-cols-3 mt-6 gap-6 970:grid-cols-3 785px:grid-cols-2 460px:grid-cols-1">
                @foreach ($towels as $towel)
                    <a href="{{ route('single.product', $towel->slug) }}" class="w-full flex flex-col group">
                        <div class="flex items-center justify-center bg-gray-100 h-[400px] mb-3">
                            {{-- bg-{{ rand(1, 8) }} --}}
                            <img data-src="{{ asset('/storage/'. $towel->image) }}" class="w-[70%] 460px:w-[50%] lazyload" title="{{ $towel->name }}" alt="{{ $towel->name }} Image">
                        </div>
                        <h3>{{ $towel->short_name }}</h3>
                        <span class="price font-semibold text-gray-500 transition-all">£{{ $towel->price }} GBP</span>
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
                <h3 class="text-3xl mb-3 font-semibold">Multi Purpose Napkins</h3>
                <p class="text-lg">Multi Purpose Napkins & Towels are so useful in many situations. They are like magic helpers in the kitchen and around the house. These towels, usually made from strong materials like cotton or microfiber, are great for cleaning up spills, wiping surfaces, or just making things tidy. You can use them during cooking to keep things clean, or put them on the dining table to make it look nice. The best part is how fast they dry things and how absorbent they are. It's like having a friend that's always ready to help with any mess or task</p>
            </div>
            <img class="rounded-lg 780:order-1 w-full 940:max-w-[500px] m-auto" src="{{ asset('assets/pure.jpg') }}" title="Multi purpose cotton napkins set" alt="Trade Fountain Napkins">
        </div>
        <img class="rounded-lg w-full " src="{{ asset('assets/multi.jpg') }}" title="Trade Fountain Mutlipurpose Napkins" alt="Trade Fountain Mutlipurpose Napkins">
    </div>
</section>

<section>
    <div class="max-w-6xl m-auto py-12 px-4 w-full">
        <div class="grid grid-cols-2 gap-6 940:grid-cols-1">
            <img class="rounded-lg w-full 940:max-w-[500px] m-auto" src="{{ asset('assets/towels.jpg') }}" title="Multi color cotton towels" alt="Multi color cotton towels">
            <div class="h-fit px-6 py-4 940:px-0">
                <h3 class="text-3xl mb-3 font-semibold">Multi Colour Tea Towels</h3>
                <p class="text-lg mb-4">The Multi Color 100% Cotton Tea Towels are not just pretty but also super useful in the kitchen. Made from really good cotton, they feel soft and fancy, and they last a long time. You can use them for drying your hands or cleaning up spills because they soak up water really well.</p>
                <p class="text-lg mb-4">These tea towels are not only practical but also look great with their many colors. So, whether you're having a big dinner or just cooking for the family, these towels fit right in.</p>
                <p class="text-lg mb-4">They're big enough to cover a lot of space, making them perfect for any job in the kitchen. Plus, they're tough and won't fall apart, even if you use them a lot and wash them many times. The colors stay bright, and the edges stay strong.</p>
                <p class="text-lg">Make your kitchen better with the Multi Color 100% Cotton Tea Towels. They're not just nice to look at; they make cooking and cleaning up easier every day</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="max-w-6xl m-auto py-12 px-4 w-full">
        <div class="grid grid-cols-2 gap-6 940:grid-cols-1 mb-12">
            <div class="h-fit pr-6 py-4 940:px-0 940:order-2">
                <h3 class="text-3xl mb-3 font-semibold">Classy Towel Design</h3>
                <p class="text-lg mb-4">These kitchen towels are like helpers for your home or hotel. You can use them when you're cooking, cleaning, baking, or even when you want to make things look fancy, like during tea time. They have pretty patterns that can fit in anywhere, and they don't just look good—they're also really useful.</p>
                <p class="text-lg mb-4">In your house, these towels can be your go-to for lots of things. Wipe your hands, clean up messes, or use them to make your table look nice when you have guests. If you're in a hotel, these towels can be a special touch for your guests. They're good for making the place look classy and for practical stuff too</p>
                <p class="text-lg">The best part is, you don't have to choose between looking good and being useful. These towels do both. So, whether you're at home or in a hotel, these kitchen towels are like little helpers that make things easier and fancier</p>
            </div>
            <img class="rounded-lg 780:order-1 w-full 940:max-w-[500px] m-auto" src="{{ asset('assets/towel_design.jpg') }}" title="Classy Tea Towel Design" alt="Classy Tea Towel Design">
        </div>
    </div>
</section>

<section>
    <div class="max-w-6xl m-auto py-12 px-4 w-full">
        <div class="grid grid-cols-2 gap-6 940:grid-cols-1">
            <img class="rounded-lg w-full 940:max-w-[500px] m-auto" src="{{ asset('assets/multipurpose.jpg') }}" title="Multipurpose Tea Towel Napkins" alt="Multipurpose Tea Towel Napkins">
            <div class="h-fit px-6 py-4 940:px-0">
                <h3 class="text-3xl mb-3 font-semibold">Multi Purpose Towels</h3>
                <p class="text-lg mb-4">Get ready for the holidays with our special set of five unique dish towels! Each one comes with its own cool design — there's a checker, a center stripe, a vertical stripe, a window pane, and a herringbone pattern. You can choose from the classic colors of grey and white to match your kitchen perfectly</p>
                <p class="text-lg mb-4">These towels are not just for show; they're great helpers in the kitchen. Wipe your hands, clean up spills, or make your kitchen look festive during the holiday season. The grey and white shades make them a perfect match for any kitchen style.</p>
                <p class="text-lg mb-4">They're big enough to cover a lot of space, making them perfect for any job in the kitchen. Plus, they're tough and won't fall apart, even if you use them a lot and wash them many times. The colors stay bright, and the edges stay strong.</p>
                <p class="text-lg">Make your home feel a bit more special this holiday season with our unique dish towels. They're not just towels; they're a stylish addition to your kitchen that makes holiday chores a little more fun!</p>
            </div>
        </div>
        <img class="w-full rounded-lg" src="{{ asset('assets/footer_towels.jpg') }}" title="Pure Cotton Towels" alt="Pure Cotton Towels">
    </div>
</section>

<script>
    var splide = new Splide('.splide', {
        type: 'loop',
        autoplay: true,
        interval: 3000,
        arrows: true,
        pagination: false
    });
    splide.mount();
</script>