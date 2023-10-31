<nav class="w-full top-0 left-0 bg-white sticky z-50">
    <div class="max-w-[90%] 1140:max-w-full m-auto py-3 px-4 flex items-center justify-between">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.png') }}" width="200" alt="Trade Fountain Logo">
        </a>
        <ul class="font-semibold 940:hidden">
            <a class="mx-4 py-1 hover:text-orange-400 transition-all" href="{{ route('home') }}">Home</a>
            <a class="mx-4 py-1 hover:text-orange-400 transition-all" href="{{ route('products') }}">Products</a>
            <a class="mx-4 py-1 hover:text-orange-400 transition-all" href="{{ route('cart') }}">Cart</a>
            <a class="mx-4 py-1 hover:text-orange-400 transition-all" href="{{ route('about') }}">About</a>
        </ul>
        
        <div class="flex items-center 940:hidden">
            <ul class="font-semibold">
                @auth
                    @if (auth()->user()->is_admin)
                        <a class="pr-5 py-1 hover:text-orange-400 transition-all border-r border-gray-100" href="{{ route('dashboard') }}">Dashboard</a>
                    @endif
                    <a class="mx-4 pr-4 py-1 hover:text-orange-400 transition-all border-r border-gray-100" href="{{ route('client') }}">Client</a>
                @endauth
                @guest
                    <a class="pr-5 py-1 hover:text-orange-400 transition-all border-r border-gray-100" href="{{ route('login') }}">Login</a>
                    <a class="mx-4 py-1 hover:text-orange-400 transition-all" href="{{ route('register') }}">Signup</a>
                @endguest
            </ul>
            <a href="{{ route('cart') }}" class="p-2 ml-3 bg-gray-100 rounded-full flex items-center cursor-pointer">
                <img src="https://api.iconify.design/mingcute:shopping-bag-2-fill.svg?color=%232f322f" alt="Cart Icon" width="25">
            </a>
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-black py-2 ml-3 px-5 text-white font-semibold">Logout</button>
                </form>
            @endauth
        </div>
        <div class="hidden 940:block p-2 ml-3 bg-gray-100 rounded-full items-center cursor-pointer relative" x-data="{ open: false }">
            <img x-on:click="open = !open" src="https://api.iconify.design/fluent:text-align-right-16-filled.svg?color=%231f1e1e" alt="Align Icon" width="25">
            <ul class="absolute w-[200px] text-start right-1 top-10 rounded-lg bg-black text-white flex flex-col bg-dark p-6 link" x-show="open" x-transition x-cloak>
                <a class="pb-3 border-b border-white/10" href="{{ route('home') }}">Home</a>
                <a class="py-3 border-b border-white/10" href="{{ route('products') }}">Products</a>
                <a class="py-3 border-b border-white/10" href="{{ route('cart') }}">Cart</a>
                <a class="py-3 border-b border-white/10" href="{{ route('about') }}">About</a>
                @auth
                    @if (auth()->user()->is_admin)
                        <a class="py-3 border-b border-white/10" href="{{ route('dashboard') }}">Dashboard</a>
                    @endif
                    <a class="py-3 border-b border-white/10" href="{{ route('client') }}">Client</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="mt-3 px-4 text-md link py-1 bg-white text-black font-semibold">Logout</button>
                    </form>
                @endauth
                @guest
                    <a class="py-3 border-b border-white/10" href="{{ route('login') }}">Login</a>
                    <a class="py-3" href="{{ route('register') }}">Register</a>
                @endguest
            </ul>
        </div>
    </div>
    
</nav>