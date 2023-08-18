<section class="w-full h-screen">
    <div class="max-w-7xl m-auto py-12 px-4 grid grid-cols-3 gap-12">
        <div class="w-full col-span-2">
            <h2 class="text-4xl pb-6 title">Shopping Cart.</h2>
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            <table class="w-full">
                <tr class="border-b border-gray-200">
                   <th class="text-start p-2">Product</th> 
                   <th class="text-start">Quantity</th> 
                   <th class="text-end">Price</th> 
                </tr>
                @foreach ($orders as $order)
                    <tr class="odd:bg-gray-100">
                        <td class="text-start p-2 flex items-center">
                            <img src="{{ asset('/storage/'. $order->product->image) }}" width="60" alt="{{ $order->product->name }} Image">
                            <span class="ml-2">{{ $order->product->short_name }}</span>
                        </td>
                        <td class="text-start">
                            <button class="p-2 px-3 rounded-full bg-gray-200" wire:click="decrement('{{ $order->product->slug }}')">-</button>
                            <span class="p-2 px-3 rounded-full bg-gray-200">{{ $order->quantity }}</span>
                            <button class="p-2 px-3 rounded-full bg-gray-200" wire:click="increment('{{ $order->product->slug }}')">+</button>
                        </td>
                        <td class="text-end price">${{ $order->total }}</td>
                        <td class="text-end p-2"></td>
                    </tr>
                @endforeach
            </table>
            <div class="flex justify-end mt-6 border-t py-4 border-gray-200">
                <div class="flex flex-col text-end justify-end">
                    <b class="text-3xl">Subtotal</b>
                    <span class="bg-gray-200 py-2 px-3 rounded-2xl">${{ number_format($total, 2) }}</span>
                </div>
            </div>
            <p class="p-6 rounded-lg bg-gray-900 text-white">We leverage Stripe as a secure payment gateway, ensuring your payment transactions are handled with the highest level of security. It's important to note that we never store your credit card information on our servers. Your payment details are processed directly through Stripe's robust and trusted infrastructure, maintaining the utmost privacy and protection for your sensitive data</p>
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
