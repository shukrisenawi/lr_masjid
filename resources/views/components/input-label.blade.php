@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-base font-semibold text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
