@props([
    'bgcolor' => 'blauw',
])

@php

    $optionsbgcolor = [
        'blauw' => 'bg-blue-600 border-blue-600',
        'rood' => 'bg-red-600 border-red-600 active:bg-red-400',
    ];

    $style = $optionsbgcolor[$bgcolor] ?? $optionsbgcolor['blauw'];
    if($bgcolor == 'blauw')
        $active = 'focus:bg-blue-400';
    else
        $active = 'bg-red-400';


@endphp

<button {{ $attributes->merge(['class' => "$style $active w-32 text-center text-black py-1 mx-3 rounded-lg font-bold shadow-black/25 shadow-lg
border-2 hover:scale-105"]) }}>
    {{ $slot }}
</button>
