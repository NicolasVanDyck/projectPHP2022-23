<x-dialog-modal id="showInfoModal"
                wire:model="showInfoModal">
    <x-slot name="title">
        <h2 class="text-lg ml-4">Bestellingen bekijken</h2>
    </x-slot>

    <x-slot name="content">
        <div class="relative flex-auto p-4 text-md">
            <p>
                Op deze pagina kunt u de bestellingen raadplegen en een overzicht downloaden naar een excel file. Bestellingen op de website
                kunnen enkel worden aangepast door de leden zelf. Wenst u deze functionaliteit aan te passen, dan kunt u
                contact opnemen met MaMiToNi.
            </p>
        </div>

        <div class="relative flex-auto p-4 text-md">
            <p>
                Leden kunnen bestellingen plaatsen tot de einddatum die hier kan worden aangepast. De einddatum zal zichtbaar zijn op de pagina om kleding te bestellen.
            </p>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-button
            wire:click="showInfoModal()"
            wire:loading.attr="disabled"
            class="ml-2">Verder
        </x-button>
    </x-slot>

</x-dialog-modal>
