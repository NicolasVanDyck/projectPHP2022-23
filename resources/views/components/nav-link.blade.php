@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'text-gray-50 dark:text-gray-200 border-b-2 border-blue-400'
                : 'border-b-2 border-transparent text-gray-50 hover:text-gray-50 dark:hover:text-gray-200 hover:border-blue-400 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
