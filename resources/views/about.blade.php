@extends('layouts.apps')
@section('content')
    <section class="w-full">
        <div class="max-w-4xl m-auto py-12 w-full" id="products">
            <div class="text-center mb-4 px-4">
                <h1 class="text-5xl title mb-2">About Trade Fountain</h1>
                <p>Here is everyhting you need to know about Trade Fountain</p>
            </div>
            <div class="mt-6 p-6 rounded-lg bg-white">
                <h2 class="mb-2 font-bold text-3xl">DUJANA LTD / Trade Fountain</h2>
                <p class="mb-3">Trade Fountain / DUJANA LTD is a dynamic and customer-focused seller on Amazon, specializing in the provision of high-quality napkins and tea towels. Established on 23, March 2022, and registered in the UK under Company Number 11995691, Trade Fountain has rapidly gained a reputation for its commitment to excellence and dedication to customer satisfaction.</p>
                <p class="mb-3">At Trade Fountain, our mission is to enhance your daily living experiences by offering premium napkins and tea towels that seamlessly blend functionality, style, and durability. We believe in transforming ordinary moments into extraordinary memories through the simple, yet essential, elements of our products</p>
                <p class="mb-3">Trade Fountain takes pride in curating a diverse range of napkins and tea towels, designed to cater to various preferences and occasions. Our products are crafted with precision, using high-quality materials to ensure longevity and performance. From classic designs to modern aesthetics, our collection reflects our dedication to meeting the diverse needs of our valued customers.</p>
                <p class="mb-3">Visit our Amazon store to explore our comprehensive range of napkins and tea towels. Shop with confidence, knowing that each product is backed by Trade Fountain's unwavering commitment to quality and customer satisfaction.</p>
                <a href="https://www.amazon.co.uk/stores/Trade+Fountain/page/96B0053E-A35A-4B24-A7AF-D325AF739606?ref_=ast_bln" target="_blank" title="Trade Fountain Amazon Store Link" rel="nofollow" class="mb-3 inline-block rounded-lg py-2 px-3 bg-yellow-500 font-bold">Visit Our Amazon Store</a>
                <p class="mb-3">Choose Trade Fountain for premium napkins and tea towels that elevate your everyday moments. Experience the perfect blend of style, functionality, and durability with every purchase</p>
                <div class="p-3 bg-gray-50 rounded-lg mb-6">
                    <h3 class="font-semibold">Company number:</h3>
                    <p class="mb-3">13997451</p>
                    <h3 class="font-semibold">Registered Office Address:</h3>
                    <p class="mb-3">1500 MMR House 57 Cheetham Hill Road, Manchester, M4 4FS, United Kingdom</p>
                    <h3 class="font-semibold">Incorporated on:</h3>
                    <p class="mb-3">23 March 2022</p>
                </div>
                <h2 class="mb-3 text-3xl font-semibold">Trade Fountain Customer Reviews:</h2>
                <div class="grid grid-cols-2 gap-6 border-t border-gray-100 py-6 780:grid-cols-1">
                    @foreach ($reviews as $review)
                        <x-review :review="$review" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection