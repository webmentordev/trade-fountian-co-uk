<footer class="w-full bg-gray-50">
    <div class="max-w-6xl m-auto py-[120px] px-4 w-full grid grid-cols-3 gap-12 780:grid-cols-2 555:flex 555:flex-col">
        <div class="w-full">
            <h3 class="mb-6 text-2xl title">Get In Touch</h3>
            <ul class="font-semibold text-gray-500">
                <li class="mb-1"><b class="text-black">Address:</b> 1500 MMR House 57 Cheetham Hill Road, Manchester, M4 4FS, United Kingdom</li>
                <li class="mb-1"><b class="text-black">Call:</b> <span class="ml-2">+44 (748) 1355474</span></li>
                <li class="mb-1"><b class="text-black">Contact:</b> <span class="ml-1">contact@tradefountain.co.uk</span></li>
                <li class="mb-1"><b class="text-black">Open:</b> <span class="ml-1">Monday - Friday, 8:00AM to 6:00PM</span></li>
            </ul>
        </div>

        <div class="w-full">
            <h3 class="mb-6 text-2xl title">Information</h3>
            <ul class="text-gray-500">
                <li class="mb-1 hover:ml-3 transition-all"><a href="{{ route('home') }}">Home</a></li>
                <li class="mb-1 hover:ml-3 transition-all"><a href="{{ route('home') }}#products">Products</a></li>
                <li class="mb-1 hover:ml-3 transition-all"><a rel="nofollow" href="{{ route('terms') }}">Terms Of Service</a></li>
                <li class="mb-1 hover:ml-3 transition-all"><a rel="nofollow" href="{{ route('policy') }}">Privacy Policy</a></li>
            </ul>
        </div>
    </div>
    <section class="w-full bg-black text-white py-6 px-4">
        <div class="max-w-6xl m-auto w-full flex items-center justify-between 660:flex-col">
            <p class="text-gray-300">Copyrights &copy; {{ date('Y') }} Trade Fountain - All rights reserved </p>
            <img src="{{ asset('assets/payment_cards.png') }}" width="200" alt="Stripe payment Cards">
        </div>
    </section>
</footer>