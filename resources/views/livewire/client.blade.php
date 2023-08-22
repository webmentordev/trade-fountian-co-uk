<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
        <div class="py-6 text-gray-900 flex items-center justify-between 1140:flex-col 1140:justify-start">
            <h1 class="text-5xl title 1140:mb-3">Welcome to Client Area, <span class="text-orange-400">{{ auth()->user()->name }}</span> 👋</h1>
            <div class="flex items-center 490px:flex-wrap">
                <h3 class="title mr-2">Filters:</h3>
                <button class="py-1 m-2 text-sm flex items-center px-4 rounded-xl bg-green-400/20 text-black" wire:click="filter('completed')">Completed</button>
                <button class="py-1 m-2 text-sm flex items-center px-4 rounded-xl bg-red-400/20 text-black" wire:click="filter('cancelled')">Cancelled</button>
                <button class="py-1 m-2 text-sm flex items-center px-4 rounded-xl bg-yellow-400/20 text-black" wire:click="filter('pending')">Pending</button>
                <button class="py-1 m-2 text-sm flex items-center px-4 rounded-xl bg-blue-400/20 text-black" wire:click="filter('all')">All</button>
            </div>
        </div>
        
        <div class="flex items-center justify-center w-full" wire:loading wire:target='filter'>
            <div class="flex items-center m-auto w-fit">
                <img src="https://api.iconify.design/eos-icons:loading.svg?color=%2337d82c" alt="Check Icon" width="30">
                <p>Loading...</p>
            </div>
        </div>
        
        @if (count($orders))
            <div class="flex flex-col">
                @foreach ($orders as $order)
                    <div class="bg-gray-100 mb-6 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 flex items-center justify-between 870px:flex-col">
                            <div class="flex items-center 870px:justify-start 870px:w-full 440px:flex-col">
                                <img data-src="{{ asset('/storage/'. $order->product->image) }}" class="lazyload w-[50px]" alt="{{ $order->product->short_name }} Image">
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <b class="ml-3 font-semibold mr-3">{{ $order->product->short_name }}</b>
                                        (<span class="ml-1 text-orange-500">x {{ $order->quantity }}</span>)
                                    </div>
                                    @if ($order->order_id)
                                        <p class="ml-3"><b class="mr-2">OrderID:</b>{{ $order->order_id }}</p>
                                        <p class="ml-3"><b class="mr-2">Ordered:</b>{{ $order->created_at->diffForHumans() }} - {{ $order->created_at->format('D d/m/y H:s:i A') }} (UTC)</p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center 870px:justify-end 870px:w-full 870px:mt-5">
                                @if ($order->status == 'pending')
                                    <span class="py-2 mr-2 flex items-center px-4 rounded-xl bg-yellow-400/20 text-black"><i class="h-[10px] w-[10px] rounded-full bg-yellow-400 mr-2"></i> Pending</span>
                                @elseif ($order->status == 'completed')
                                    <span class="py-2 mr-2 flex items-center px-4 rounded-xl bg-green-400/20 text-black"><i class="h-[10px] w-[10px] rounded-full bg-green-400 mr-2"></i> Completed</span>
                                    @elseif ($order->status == 'cancelled')
                                    <span class="py-2 mr-2 flex items-center px-4 rounded-xl bg-red-400/20 text-black"><i class="h-[10px] w-[10px] rounded-full bg-red-400 mr-2"></i> Cancelled</span>
                                @endif
                                <h4 class="text-3xl ml-3 font-semibold price">€{{ number_format($order->product->price * $order->quantity, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="bg-black mb-3 overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6 text-white flex items-center justify-between 810px:flex-col">
                        <h3 class="text-2xl font-semibold">Total Paid: <i class="font-normal text-gray-100">€{{ $completed }}</i></h3>
                        <h3 class="text-2xl font-semibold">Total Pending: <i class="font-normal text-gray-100">€{{ $pending }}</i></h3>
                        <h3 class="text-2xl font-semibold">Total Cancelled: <i class="font-normal text-gray-100">€{{ $cancelled }}</i></h3>
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