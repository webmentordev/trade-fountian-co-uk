<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[95%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full orders">
                        <tr class="bg-gray-200">
                            <th class="p-2">OrderID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Product</th>
                            <th>Total</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Shipping</th>
                            <th>Details</th>
                        </tr>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="p-2"><b>#{{ $order->order_id }}</b></td>
                                <td>{{ $order->address->name }}</td>
                                <td>{{ $order->address->email }}</td>
                                <td>{{ $order->product->short_name }}</td>
                                <td>{{ $order->total }}</td>
                                <td>x{{ $order->quantity }}</td>
                                <td class="capitalize">
                                    @if ($order->status == "completed")
                                        @if ($order->shipping == "refunded")
                                            <span class="bg-red-600/10 rounded-full border-red-600 border p-1 font-semibold px-4 text-red-600">Refunded</span>
                                        @else
                                            <span class="bg-green-600/10 rounded-full border-green-600 border p-1 font-semibold px-4 text-green-600">Paid</span>
                                        @endif
                                    @elseif($order->status == "cancelled")
                                        <span class="bg-red-600/10 rounded-full border-red-600 border p-1 font-semibold px-4 text-red-600">Cancelled</span>
                                    @else
                                        <span class="bg-red-600/10 rounded-full border-yellow-600 border p-1 font-semibold px-4 text-yellow-600">Pending</span>
                                    @endif
                                </td>
                                <td class="py-1">
                                    @if ($order->shipping != 'cancelled' && $order->shipping != 'refunded')
                                        <form action="{{ route('update.shipping', $order->order_id) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" id="status" class="rounded-lg" onchange="this.form.submit()">
                                                <option value="{{ $order->shipping }}" selected class="capitalize">Current: {{ $order->shipping }}</option>
                                                <option value="processing">Processing</option>
                                                <option value="processed">Processed</option>
                                                <option value="transit">In Transit</option>
                                                <option value="completed">Completed</option>
                                                <option value="canceled">Canceled</option>
                                                <option value="refunding">Refunding</option>
                                                <option value="refunded">Refunded</option>
                                            </select>
                                        </form>
                                    @else
                                        @if ($order->shipping == 'refunded')
                                            <span class="bg-red-600/10 rounded-full border-red-600 border p-1 font-semibold px-4 text-red-600">Refunded</span>
                                        @else
                                            <span class="bg-red-600/10 rounded-full border-red-600 border p-1 font-semibold px-4 text-red-600">Cancelled</span>
                                        @endif
                                    @endif
                                </td>
                                <td class="flex justify-end items-center h-fit px-4" x-data="{ open: false}">
                                    <img x-on:click="open = !open" width="25" src="https://api.iconify.design/mdi:dots-vertical.svg?color=%23000000">
                                    <div x-show="open" x-cloak class="fixed bottom-3 right-3 bg-white max-w-[400px] w-full p-6 rounded-lg shadow-md">
                                        <h3 class="font-semibold">* Address</h3>
                                        <p>{{ $order->address->address }}</p>
                                        <h3 class="font-semibold">* Contact</h3>
                                        <p>{{ $order->address->number }}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
