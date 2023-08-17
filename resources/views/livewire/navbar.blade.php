<nav class="w-full top-0 left-0 bg-white">
    <div class="max-w-[90%] m-auto py-3 px-4 flex items-center justify-between">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.jpg') }}" width="200" alt="Trade Fountain Logo">
        </a>
        <ul class="font-semibold">
            <a class="mx-4 py-1 hover:underline transition-all" href="#">Home</a>
            <a class="mx-4 py-1 hover:underline transition-all" href="#">Products</a>
            <a class="mx-4 py-1 hover:underline transition-all" href="#">Cart</a>
            <a class="mx-4 py-1 hover:underline transition-all" href="#">Contact</a>
            <a class="mx-4 py-1 hover:underline transition-all" href="#">About</a>
        </ul>
        
        <div x-data="{ open: false }">
            <div x-on:click="open = !open" class="p-2 bg-gray-100 rounded-full flex items-center cursor-pointer">
                <img src="https://api.iconify.design/solar:cart-large-broken.svg?color=%232f322f" alt="Cart Icon" width="35">
                <span class="bg-black text-white py-1 px-2 rounded-full text-sm">{{ 2 }}</span>
            </div>
        </div>
    </div>
</nav>