<x-dialog-modal id="myOrderInfoModal"
                wire:model="myOrderInfoModal">
    <x-slot name="title">
        <h2 class="p-4 font-semibold text-lg underline">Mijn bestellingen</h2>
    </x-slot>

    <x-slot name="content">
        <div class="relative flex-auto p-4">
            <p>
                Op deze pagina kun je je eigen bestellingen raadplegen en nakijken. Wil je bestelling aanpassen? Dat kan!
            </p>
            <ul class="list-inside mt-4 mb-2">
                <li class="list-disc">Verwijderen: druk op het vuilnisbakje. </li>
                <li class="list-disc">Aanpassen: ga terug naar de kledingpagina en geef het gewenste
                    product en aantal in. Je oude bestelling wordt automatisch aangepast.</li>
            </ul>
            <p class="mt-4">De bestellingen worden verwerkt na de getoonde afsluitdatum op de bestelpagina.</p>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-button
            wire:click="myOrderInfoModal()"
            wire:loading.attr="disabled"
            class="ml-2 p-2">Verder
        </x-button>
    </x-slot>

</x-dialog-modal>
