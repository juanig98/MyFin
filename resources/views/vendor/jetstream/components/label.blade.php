@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md text-yellow-500']) }}>
    {{ $value ?? $slot }}
</label>
