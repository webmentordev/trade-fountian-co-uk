<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-6 text-gray-900 flex items-center justify-between">
            <h1 class="text-5xl title">Welcome to Client Area, <span class="text-orange-400">{{ auth()->user()->name }}</span> 👋</h1>  
        </div>
        @if (count($orders))
            <div class="flex flex-col">
                @foreach ($orders as $order)
                    <div class="bg-gray-100 mb-6 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 flex items-center justify-between">
                            <div class="flex items-center">
                                <img data-src="{{ asset('/storage/'. $order->product->image) }}" width="50px" class="lazyload" alt="{{ $order->product->short_name }} Image">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <b class="ml-3 font-semibold mr-3">{{ $order->product->short_name }}</b>
                                        (<span class="ml-1 text-orange-500">x {{ $order->quantity }}</span>)
                                    </div>
                                    @if ($order->order_id)
                                        <p class="ml-3"><b class="mr-2">OrderID:</b>{{ $order->order_id }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center">
                                @if ($order->status == 'pending')
                                    <span class="py-2 mr-2 flex items-center px-4 rounded-xl bg-yellow-400/20 text-black"><i class="h-[10px] w-[10px] rounded-full bg-yellow-400 mr-2"></i> Pending</span>
                                @elseif ($order->status == 'completed')
                                    <span class="py-2 mr-2 flex items-center px-4 rounded-xl bg-green-400/20 text-black"><i class="h-[10px] w-[10px] rounded-full bg-green-400 mr-2"></i> Completed</span>
                                    @elseif ($order->status == 'cancelled')
                                    <span class="py-2 mr-2 flex items-center px-4 rounded-xl bg-red-400/20 text-black"><i class="h-[10px] w-[10px] rounded-full bg-red-400 mr-2"></i> Cancelled</span>
                                @endif
                                <h4 class="text-3xl ml-3 font-semibold price">${{ number_format($order->product->price * $order->quantity, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="bg-black mb-3 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white flex items-center justify-between">
                        <h3 class="text-2xl font-semibold">Total Paid: <i class="font-normal text-gray-100">${{ $completed }}</i></h3>
                        <h3 class="text-2xl font-semibold">Total Pending: <i class="font-normal text-gray-100">${{ $pending }}</i></h3>
                        <h3 class="text-2xl font-semibold">Total Cancelled: <i class="font-normal text-gray-100">${{ $cancelled }}</i></h3>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You do not have any purchased products!") }}
                </div>
            </div>
        @endif
    </div>
</div>