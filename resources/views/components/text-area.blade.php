@props(['disabled' => false, "data" => ""])

<textarea cols="30" rows="8" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>{{ $data }}</textarea>