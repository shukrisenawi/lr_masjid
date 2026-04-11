@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-sm font-semibold text-green-600']) }}>
        {{ $status }}
    </div>
@endif
