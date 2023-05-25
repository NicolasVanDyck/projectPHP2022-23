@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-800 dark:text-gray-200 border-b-2 border-[#d53369]'
            : 'border-b-2 border-transparent text-gray-800 hover:text-gray-800 dark:hover:text-gray-200 hover:border-[#d53369] transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
