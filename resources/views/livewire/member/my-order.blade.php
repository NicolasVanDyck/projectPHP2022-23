<div>
    <x-slot name="title">Mijn bestelling</x-slot>
    <x-slot name="description">Hier kun je zien welke kleding je hebt besteld en eventueel aanpassen</x-slot>
    This is myorder page.

    @foreach($orders as $order)
        <div>
{{--            @dd($order)--}}
{{--            {{ $order}}--}}
        </div>
    @endforeach

    {{ $products }}
</div>
