@props(['active' => false])

@php
$classes = 'border-2 border-gray-800 text-center rounded-full';
if ($active) {
    $classes .= ' text-blue-700 font-bold bg-gray-200 ';
}
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
