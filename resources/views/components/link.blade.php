@php
    $classes = "block text-sm text-gray-600 hover:text-gray-900 mt-5"
@endphp
    

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>