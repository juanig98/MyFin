@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-black bg-gray-200 border-gray-300 focus:border-yellow-200 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
