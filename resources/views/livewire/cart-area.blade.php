<section class="w-full min-h-[60vh]">
    <div class="max-w-7xl m-auto py-12 px-4 grid grid-cols-3 gap-12 1140:grid-cols-2 1140:max-w-3xl">
        <div class="w-full col-span-2">
            <div class="flex items-center pb-6 justify-between">
                <div wire:loading wire:target='checkout'>
                    <x-alerts.loading message="Processing..." />
                </div>
                <h2 class="text-4xl price font-bold">Shopping Cart.</h2>
                @if (count($products))
                    <button wire:click="empty_cart" class="flex items-center font-semibold bg-orange-600/10 py-1 px-3 rounded-sm text-orange-600">
                        <img src="https://api.iconify.design/ri:delete-bin-5-line.svg?color=%23e85617" class="mr-2" alt="Recycle Bin">
                        Empty
                    </button>
                @endif
            </div>
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            <div class="flex items-center justify-between py-2 555:hidden">
                <b class="text-lg">Product</b>
                <b class="text-lg">Price</b>
            </div>
            @if (count($products))
                @foreach ($products as $key => $order)
                    <div class="even:bg-orange-100/50 mb-3 flex justify-between 555:flex-col items-center even:border-y even:border-b even:border-orange-100">
                        <div class="text-start px-3 py-4 flex items-center">
                            <img src="{{ asset($order['image']) }}" width="40" alt="{{ $order['name'] }} Image">
                            <a href="{{ route('single.product', $order['slug']) }}" class="ml-2 underline text-gray-500">{{ $order['short'] }}</a>
                            <b class="ml-1">(<span class="text-orange-600">x{{ $order['quantity'] }}</span>)</b>
                            <div class="flex justify-center items-center ml-2">
                                <button class="py-2 mr-1 px-2 rounded-full bg-orange-600/10" wire:click="decrement('{{ $order['slug'] }}')"><img src="https://api.iconify.design/ic:baseline-minus.svg?color=%23e85617" alt="Bin Icon"></button>
                                <button class="py-2 px-2 rounded-full bg-orange-600/10" wire:click="increment('{{ $order['slug'] }}')"><img src="https://api.iconify.design/material-symbols:add.svg?color=%23e85617" alt="Bin Icon"></button>
                            </div>
                        </div>
                        <div class="flex items-center px-3">
                            <div class="text-end price">${{ $order['price'] * $order['quantity'] }}</div>
                            <button class="py-2 px-2 ml-2 rounded-full bg-orange-600/10" wire:click="remove('{{ $key }}')"><img src="https://api.iconify.design/solar:trash-bin-minimalistic-bold.svg?color=%23e85617" alt="Bin Icon"></button>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="mb-4 p-6 rounded-lg text-orange-600 bg-orange-600/20">No product exist in the cart! Check our collection <a href="{{ route('products') }}" class="underline font-semibold">products</a></p>
            @endif
            <div class="p-6 rounded-lg bg-gray-900 text-white">
                <img class="w-[140px] mb-4" src="{{ asset('assets/stripe.png') }}" alt="Stripe Logo">
                <p>We leverage Stripe as a secure payment gateway, ensuring your payment transactions are handled with the highest level of security. It's important to note that we never store your credit card information on our servers. Your payment details are processed directly through Stripe's robust and trusted infrastructure, maintaining the utmost privacy and protection for your sensitive data</p>
            </div>
            
        </div>

        <div class="w-full bg-gray-100 rounded-lg p-6 1140:col-span-2 h-fit">
            <h2 class="price text-3xl font-bold mb-4">Payment Info</h2>
            <form wire:submit.prevent='checkout' method="post">
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
                    <x-text-input id="number" wire:model="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" placeholder="+44 123 1234567" required />
                    <x-input-error :messages="$errors->get('number')" class="mt-2" />
                </div>
    
                <div class="w-full mb-3">
                    <x-input-label for="address" :value="__('Address')" />
                    <x-text-input id="address" wire:model="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div class="w-full mb-3">
                    <x-input-label for="address_2" :value="__('Address (optional)')" />
                    <x-text-input id="address_2" wire:model="address_2" class="block mt-1 w-full" type="text" name="address" :value="old('address_2')" required />
                    <x-input-error :messages="$errors->get('address_2')" class="mt-2" />
                </div>

                <div class="w-full mb-3">
                    <x-input-label for="city" :value="__('City')" />
                    <x-text-input id="city" wire:model="city" class="block mt-1 w-full" type="text" name="address" :value="old('city')" required />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="w-full mb-3">
                        <x-input-label for="county" :value="__('County')" />
                        <x-text-input id="county" wire:model="county" class="block mt-1 w-full" type="text" name="address" :value="old('county')" required />
                        <x-input-error :messages="$errors->get('county')" class="mt-2" />
                    </div>
    
                    <div class="w-full mb-3">
                        <x-input-label for="postal" :value="__('Postal Code')" />
                        <x-text-input id="postal" wire:model="postal" class="block mt-1 w-full" type="text" name="address" :value="old('postal')" required />
                        <x-input-error :messages="$errors->get('postal')" class="mt-2" />
                    </div>
                </div>
    
                @if (count($products))
                    <ul class="bg-white mb-3 rounded-lg">
                        <li class="flex justify-between py-2 px-3"><b>Shipping</b><span class="text-gray-500">$0.00</span></li>
                        <li class="flex justify-between py-2 px-3"><b>Tax</b><span class="text-gray-500">$0.00</span></li>
                        <li class="flex items-center justify-between py-2 px-3"><b>Subtotal (pay)</b><span class="text-xl font-bold price text-orange-500">${{ number_format($total_price, 2) }}</span></li>
                    </ul>
                @endif
                @if (count($products))
                    <x-primary-button class="mb-3">
                        {{ __('Checkout') }}
                    </x-primary-button>
                @endif
            </form>
            <div class="flex justify-between items-center w-full py-3">
                <img class="w-[180px]" src="{{ asset('assets/payment_cards.png') }}" alt="Stripe Payment Methods">
                <img class="w-[100px]" src="{{ asset('assets/stripe.png') }}" alt="Stripe Logo">
            </div>
        </div>
    </div>
</section>