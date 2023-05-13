@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-800 dark:text-gray-200 border-b-2 border-blue-500'
            : 'border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-blue-500 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
