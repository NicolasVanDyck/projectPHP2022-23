<x-templatelayout>
    <x-slot name="title">Deelname groep</x-slot>
    <x-slot name="description">Op deze pagina kan je aanduiden bij welke geplande ritten je aanwezig zal zijn!</x-slot>




    <div>
        @livewire('deelname-filters')
    </div>

    <livewire:grouptour-member/>
</x-templatelayout>
