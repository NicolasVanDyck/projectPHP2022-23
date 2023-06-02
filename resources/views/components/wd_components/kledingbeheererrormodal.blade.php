<x-dialog-modal id="showErrorModal"
                wire:model="errorModal">
    <x-slot name="title">
        <h2>Er is iets misgegaan</h2>
    </x-slot>

    <x-slot name="content">
        <div class="relative flex-auto p-4">
            <p>Dit product zit al in een bestelling en kan daardoor niet worden verwijderd.</p>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-button
            wire:click="closeErrorModal()"
            wire:loading.attr="disabled"
            class="ml-2">Verder
        </x-button>
    </x-slot>

</x-dialog-modal>
