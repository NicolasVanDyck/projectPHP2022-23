<x-dialog-modal id="imageModal"
                wire:model="showModal">
    <x-slot name="title">
        <h2>{{ is_null($newImage['id']) ? 'Nieuwe afbeelding aanmaken' : 'Afbeelding aanpassen' }}</h2>
    </x-slot>
    <x-slot name="content">
        <div class="relative flex-auto p-4">
            @if($errors->any())
            @endif
            <div>
                <x-label for="name" value="Naam"/>
                <x-input id="newImage.name" type="text" name="name" placeholder="naam"
                         wire:model.defer="newImage.name"
                         required
                         autofocus autocomplete="name" class="block mt-1 w-full"/>
                <x-input-error for="newImage.name" class="mt-2"/>
            </div>
            <div>
                <x-label for="description" value="Omschrijving"/>
                <x-input id="newImage.description" type="text" name="description"
                         placeholder="Omschrijving"
                         wire:model.defer="newImage.description" required autofocus
                         autocomplete="username"
                         class="block mt-1 w-full"/>
                <x-input-error for="newImage.description" class="mt-2"/>
            </div>
                {{--                dropdown van maken          --}}
            <div>
                <x-label for="image_type_id" value="Type afbeelding"/>
                <x-input id="newImage.image_type_id" type="integer" name="image_type_id"
                         placeholder="Type afbeelding"
                         wire:model.defer="newImage.image_type_id" required autofocus
                         autocomplete="image_type_id"
                         class="block mt-1 w-full"/>
                <x-input-error for="newImage.image_type_id" class="mt-2"/>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        @if(is_null($newImage['id']))
            <x-button
                    wire:click="createImage()"
                    wire:loading.attr="disabled"
                    class="ml-2">Gegevens opslaan
            </x-button>
            <x-button
                    wire:click="setNewImage()"
                    wire:loading.attr="disabled"
                    class="ml-2">Formulier resetten
            </x-button>
        @else
            <x-button
                    wire:click="updateImage({{$newImage['id']}})"
                    wire:loading.attr="disabled"
                    class="ml-2">Aanpassingen opslaan
            </x-button>
        @endif

        <x-button bgcolor="rood" @click="show = false">
            Verlaten</x-button>
    </x-slot>
</x-dialog-modal>