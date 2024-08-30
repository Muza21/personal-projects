@props(['active' => false])

@php
$classes = 'text-black ';
if ($active) {
    $classes .= ' border-b-2 pb-2 border-black font-extrabold';
}
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
