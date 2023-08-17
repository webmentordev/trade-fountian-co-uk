@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 border focus:border-indigo-500 mt-1 focus:ring-indigo-500 p-1 rounded-md shadow-sm w-full']) !!}>