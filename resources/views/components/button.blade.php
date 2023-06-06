@props([
    'type' => 'sky-blue',
])

@php



    $options = [
        'sky-blue' => 'bg-[#5e9ad7] border-blue-200 hover:bg-blue-400',
        'red' => 'bg-danger-500 border-red-200 hover:bg-danger-600',
        'gray' => 'bg-gray-500 border-gray-200 hover:bg-gray-600'
    ];

    $style = $options[$type] ?? $options['sky-blue'];

@endphp

<button {{ $attributes->merge(['class' => "$style w-32 text-center text-white py-1 rounded-lg font-bold shadow-black/25 shadow-lg
border-2 hover:scale-105"]) }}>
    {{ $slot }}
</button>
