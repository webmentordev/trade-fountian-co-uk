<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('assets/trade-fountain-favicon.png') }}" type="image/x-icon">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" integrity="sha512-q583ppKrCRc7N5O0n2nzUiJ+suUv7Et1JGels4bXOaMFQcamPk9HjdUknZuuFjBNs7tsMuadge5k9RzdmO+1GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="
        https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
        "></script>
        <link href="
        https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
        " rel="stylesheet">
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-GGQ5790XJM"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-GGQ5790XJM');
        </script>
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="fixed z-50 bottom-3 right-3">
            <a href="https://wa.me/447481355474" class="flex items-center flex-col">
                <img src="{{ asset('assets/whatsapp_logo.png') }}" width="50" class="mb-2 500:mb-0" alt="Whatsapp Icon">
                <span class="font-semibold 500:hidden">Instant Support</span>
            </a>
        </div>
        <div class="min-h-screen bg-gray-100">
            @livewire('navbar')
            <!-- Page Content -->
            <main class="w-full">
                @yield('content')
            </main>
        </div>
        <x-service />
        <x-footer />
        @livewireScripts
    </body>
</html>