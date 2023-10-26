@props(['review'])
<div class="flex flex-col h-fit w-full p-6 bg-white shadow-xl border border-gray-200 rounded-xl">
    <div class="flex items-center mb-1">
        <div class="w-[30px] h-[30px] rounded-full bg-center bg-cover" style="background-image: url('https://images-eu.ssl-images-amazon.com/images/S/amazon-avatars-global/default._CR0,0,1024,1024_SX48_.png')"></div>
        <span class="ml-3 text-sm text-slate-600">{{ $review->name }}</span>
    </div>
    <div class="flex items-center mb-1">
        <ul class="flex">
            <li><img width="20px" src="https://api.iconify.design/material-symbols:star.svg?color=%23FFA41C" alt="Review star"></li>
            <li><img width="20px" src="https://api.iconify.design/material-symbols:star.svg?color=%23FFA41C" alt="Review star"></li>
            <li><img width="20px" src="https://api.iconify.design/material-symbols:star.svg?color=%23FFA41C" alt="Review star"></li>
            <li><img width="20px" src="https://api.iconify.design/material-symbols:star.svg?color=%23FFA41C" alt="Review star"></li>
            <li><img width="20px" src="https://api.iconify.design/material-symbols:star.svg?color=%23FFA41C" alt="Review star"></li>
        </ul>
        <p class="text-[15px] ml-2 mt-1"><b>{{ $review->title }}</b></p>
    </div>
    <div class="flex items-center text-[14px] mb-1">
        <p class="text-slate-500">Colour Name: {{ $review->color }} | </p>
        <p class="text-[#c45500] ml-1"><b> Verified Purchase</b></p>
    </div>
    <p class="text-slate-700 text-[14px] mb-2">Reviewd in the {{ $review->location }} on {{ $review->date }}</p>
    <p class="text-[15px] mb-3">{{ $review->review }}</p>
    <a href="{{ $review->url }}" class="text-sm w-fit font-semibold inline-block py-2 px-5 rounded-lg bg-[#FFA41C]" target="_blank" rel="nofollow">Read</a>
</div>