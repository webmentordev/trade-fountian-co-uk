<section class="w-full">
    <header class="py-12 px-4 w-full h-[200px] flex items-center relative justify-center bg-center bg-cover" style="background-image: url({{ asset('assets/header-image.jpg') }})">
        <div class="absolute top-0 left-0 h-full w-full bg-black/50 backdrop-blur-sm"></div>
        <h1 class="title text-4xl text-white relative z-10">Product Details / Buy Now</h1>
    </header>
    <div class="max-w-7xl py-12 relative px-4 w-full grid grid-cols-2 gap-12 980px:grid-cols-1 980px:max-w-xl m-auto" x-data="{ images: [
        @if (count($product->images))
            @foreach ($product->images as $item)
                '{{ asset('/storage/'. $item->url) }}',
            @endforeach
        @endif
    ], active: null}" x-init="active = images[0]">
        <div class="w-full">
            <div class="h-[500px] bg-gray-100 flex items-center justify-center">
                {{-- bg-{{ rand(1, 8) }} --}}
                <img :src="active" alt="{{ $product->name }} Image" class="w-[70%] 490px:w-[90%]">
            </div>
            @if (count($product->images))
                <div class="grid grid-cols-6 gap-3 py-3 w-full 490px:grid-cols-3">
                    <template x-for="image in images">
                        <img :src="image" width="150px" class="mr-2 rounded-lg h-full object-cover" :class="{ 'border-4 border-blue-300': active == image }" x-on:mouseenter="active = image">
                    </template>
                </div>
            @endif
        </div>
        @if (session('success'))
            <x-alerts.success :message="session('success')" />
        @endif
        <div wire:loading wire:target="add_to_cart">
            <x-alerts.loading message="Adding to cart..." />
        </div>
        <div class="w-full flex flex-col py-6">
            <h2 class="font-semibold text-3xl mb-6">{{ $product->name }}</h2>
            @if ($quantity && $quantity > 0)
                <span class="text-red-500 text-4xl font-semibold price mb-3">£{{ $product->price * $quantity }}</span>
            @else
                <span class="text-red-500 text-4xl font-semibold price mb-3">£{{ $product->price }}</span>
            @endif
            <h3 class="mb-2 text-3xl title">About This Item</h3>
            {!! $product->description !!}
            <div class="flex items-center mt-6 490px:flex-col">
                <div class="w-full mb-3">
                    <x-text-input id="quantity" autocomplete="off" min="0" wire:model="quantity" placeholder="Quantity" class="block mt-1 w-full" type="number" required />
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>
                <button wire:click="add_to_cart" class="py-2 mb-3 group items-center px-4 rounded-lg text-black border border-black h-fit w-full ml-3 490px:ml-0 hover:bg-black hover:text-white transition-all">
                    <div class="flex items-center justify-center">
                        <img src="https://api.iconify.design/solar:cart-large-broken.svg?color=%23000" class="mr-2 group-hover:hidden" alt="Cart Icon" width="23">
                        <img src="https://api.iconify.design/solar:cart-large-broken.svg?color=%23fff" class="mr-2 hidden group-hover:block" alt="Cart Icon" width="23"> Add to Cart
                    </div>
                </button>
                <a href="{{ route('cart') }}" class="py-2 mb-3 items-center px-4 bg-black rounded-lg text-white h-fit w-full ml-3 490px:ml-0 text-center font-semibold">Checkout</a>
            </div>
            <div class="flex justify-between items-center w-full py-3 410px:flex-col">
                <img class="w-[200px]" src="{{ asset('assets/payment_cards.png') }}" alt="Stripe Payment Methods">
                <img class="w-[150px]" src="{{ asset('assets/stripe.png') }}" alt="Stripe Logo">
            </div>
        </div>
    </div>

    <div class="max-w-4xl m-auto py-12 px-4">
        <h3 class="mb-3 text-4xl font-semibold price">Product Description</h3>
        <main class="main-body">
            {!! $product->body !!}
            <img src="{{ asset('assets/slides/slide_1.jpg') }}" class="rounded-lg shadow-lg mb-3" alt="Trade Fountain Image">
            <img src="{{ asset('assets/slides/slide_2.jpg') }}" class="rounded-lg shadow-lg mb-3" alt="Trade Fountain Image">
            <img src="{{ asset('assets/slides/slide_3.jpg') }}" class="rounded-lg shadow-lg mb-3" alt="Trade Fountain Image">
            <img src="{{ asset('assets/slides/slide_4.jpg') }}" class="rounded-lg shadow-lg mb-3" alt="Trade Fountain Image">
        </main>
    </div>
</section>