<nav class="w-full top-0 left-0 bg-white sticky z-50">
    <div class="max-w-[90%] m-auto py-3 px-4 flex items-center justify-between">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.png') }}" width="200" alt="Trade Fountain Logo">
        </a>
        <ul class="font-semibold">
            <a class="mx-4 py-1 hover:underline transition-all" href="#">Home</a>
            <a class="mx-4 py-1 hover:underline transition-all" href="{{ route('home') }}#products">Products</a>
            <a class="mx-4 py-1 hover:underline transition-all" href="{{ route('cart') }}">Cart</a>
            <a class="mx-4 py-1 hover:underline transition-all" href="#">Contact</a>
            <a class="mx-4 py-1 hover:underline transition-all" href="#">About</a>
        </ul>
        
        <div class="flex items-center">
            <ul class="font-semibold">
                @auth
                    @if (auth()->user()->is_admin)
                        <a class="pr-5 py-1 hover:underline transition-all border-r border-gray-100" href="{{ route('dashboard') }}">Dashboard</a>
                    @endif
                    <a class="mx-4 pr-4 py-1 hover:underline transition-all border-r border-gray-100" href="{{ route('client') }}">Client</a>
                @endauth
                @guest
                    <a class="pr-5 py-1 hover:underline transition-all border-r border-gray-100" href="{{ route('login') }}">Login</a>
                    <a class="mx-4 py-1 hover:underline transition-all" href="{{ route('register') }}">Signup</a>
                @endguest
            </ul>
            <div x-data="{ open: false }" class="ml-3">
                <div x-on:click="open = !open" class="p-2 bg-gray-100 rounded-full flex items-center cursor-pointer">
                    <img src="https://api.iconify.design/mingcute:shopping-bag-2-fill.svg?color=%232f322f" alt="Cart Icon" width="25">
                    {{-- <span class="bg-black text-white py-1 px-2 rounded-full text-sm">{{ 2 }}</span> --}}
                </div>
            </div>
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-black py-2 ml-3 px-5 text-white font-semibold">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>