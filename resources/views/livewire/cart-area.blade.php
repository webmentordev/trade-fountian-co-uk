<section class="w-full h-screen">
    <div class="max-w-7xl m-auto py-12 px-4 grid grid-cols-3 gap-12">
        <div class="w-full col-span-2">
            <div class="flex items-center pb-6 justify-between">
                <h2 class="text-4xl title">Shopping Cart.</h2>
                @if (count($orders))
                    <button wire:click="empty_cart" class="flex items-center font-semibold bg-orange-600/20 py-1 px-3 rounded-sm text-orange-600">
                        <img src="https://api.iconify.design/ri:delete-bin-5-line.svg?color=%23e85617" class="mr-2" alt="Recycle Bin">
                        Empty
                    </button>
                @endif
            </div>
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            @if (count($orders))
                <table class="w-full mb-6">
                    <tr class="border-b border-gray-200">
                    <th class="text-start p-2">Product</th> 
                    <th class="text-center">Quantity</th> 
                    <th class="text-end">Price</th> 
                    <th class="text-end">Remove</th> 
                    </tr>
                    @foreach ($orders as $order)
                        <tr class="odd:bg-gray-100">
                            <td class="text-start p-2 flex items-center">
                                <img src="{{ asset('/storage/'. $order->product->image) }}" width="60" alt="{{ $order->product->name }} Image">
                                <span class="ml-2">{{ $order->product->short_name }}</span>
                            </td>
                            <td class="text-start">
                                <div class="flex justify-center items-center">
                                    <button class="py-2 px-2 rounded-full bg-orange-600/10" wire:click="decrement('{{ $order->product->slug }}')"><img src="https://api.iconify.design/ic:baseline-minus.svg?color=%23e85617" alt="Bin Icon"></button>
                                    <span class="p-1 px-3 mx-3 rounded-full bg-orange-200">{{ $order->quantity }}</span>
                                    <button class="py-2 px-2 rounded-full bg-orange-600/10" wire:click="increment('{{ $order->product->slug }}')"><img src="https://api.iconify.design/material-symbols:add.svg?color=%23e85617" alt="Bin Icon"></button>
                                </div>
                            </td>
                            <td class="text-end price">${{ $order->total }}</td>
                            <td class="text-end p-2"><button class="py-2 px-2 rounded-full bg-orange-600/10" wire:click="remove('{{ $order->product->slug }}')"><img src="https://api.iconify.design/solar:trash-bin-minimalistic-bold.svg?color=%23e85617" alt="Bin Icon"></button></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p class="mb-4 p-6 rounded-lg text-orange-600 bg-orange-600/20">No product exist in the cart! Check our collection <a href="{{ route('home') }}#products" class="underline font-semibold">products</a></p>
            @endif
            <div class="p-6 rounded-lg bg-gray-900 text-white">
                <img class="w-[140px] mb-4" src="{{ asset('assets/stripe.png') }}" alt="Stripe Logo">
                <p>We leverage Stripe as a secure payment gateway, ensuring your payment transactions are handled with the highest level of security. It's important to note that we never store your credit card information on our servers. Your payment details are processed directly through Stripe's robust and trusted infrastructure, maintaining the utmost privacy and protection for your sensitive data</p>
            </div>
            
        </div>

        <div class="w-full bg-gray-100 rounded-lg p-6">
            <h2 class="title text-3xl">Payment Info</h2>
            <div class="w-full mb-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" wire:model="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="w-full mb-3">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" wire:model="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="w-full mb-3">
                <x-input-label for="number" :value="__('Contact Number (shipping purpose)')" />
                <x-text-input id="number" wire:model="number" class="block mt-1 w-full" type="number" name="number" :value="old('number')" required />
                <x-input-error :messages="$errors->get('number')" class="mt-2" />
            </div>

            <div class="w-full mb-3">
                <x-input-label for="address" :value="__('Shipping Address')" />
                <x-text-input id="address" wire:model="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <ul class="bg-white mb-3 rounded-lg">
                <li class="flex justify-between py-2 px-3"><b>Shipping</b><span class="text-gray-500">$0.00</span></li>
                <li class="flex justify-between py-2 px-3"><b>Tax</b><span class="text-gray-500">$0.00</span></li>
                <li class="flex items-center justify-between py-2 px-3"><b>Subtotal (pay)</b><span class="text-xl font-bold price text-orange-500">${{ number_format($total, 2) }}</span></li>
            </ul>
            <x-primary-button class="mb-3">
                {{ __('Checkout') }}
            </x-primary-button>
            <div class="flex justify-between items-center w-full py-3">
                <img class="w-[180px]" src="{{ asset('assets/payment_cards.png') }}" alt="Stripe Payment Methods">
                <img class="w-[100px]" src="{{ asset('assets/stripe.png') }}" alt="Stripe Logo">
            </div>
        </div>
    </div>
</section>