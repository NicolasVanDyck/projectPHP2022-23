<x-dialog-modal id="productModal"
                wire:model="showModal">
    <x-slot name="title">
        <h2>{{ is_null($newProduct['id']) ? 'Nieuw product aanmaken' : 'Gegevens van ' . $newProduct['name'] . ' aanpassen' }}</h2>
    </x-slot>
    <x-slot name="content">
        <div class="relative flex-auto p-4">
            @if($errors->any())
            @endif
            <div>
                <x-label for="name" value="Naam"/>
                <x-input id="newProduct.name" type="text" name="name" placeholder="naam"
                         wire:model.defer="newProduct.name"
                         required
                         autofocus autocomplete="name" class="block mt-1 w-full"/>
                <x-input-error for="newProduct.name" class="mt-2"/>
            </div>
            <div>
                <x-label for="price" value="Prijs"/>
                <x-input id="newProduct.price" type="text" name="username"
                         placeholder="prijs in €"
                         wire:model.defer="newProduct.price" required autofocus
                         autocomplete="price"
                         class="block mt-1 w-full"/>
                <x-input-error for="newProduct.price" class="mt-2"/>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        @if(is_null($newProduct['id']))
            <x-button
                wire:click="createNewProduct()"
                wire:loading.attr="disabled"
                class="ml-2">Gegevens opslaan
            </x-button>
            <x-button
                wire:click="setNewProduct()"
                wire:loading.attr="disabled"
                class="ml-2">Formulier resetten
            </x-button>
        @else
            <x-button
                wire:click="updateProduct({{$newProduct['id']}})"
                wire:loading.attr="disabled"
                class="ml-2">Aanpassingen opslaan
            </x-button>
        @endif

        <x-button bgcolor="rood" @click="show = false" wire:loading.attr="disabled">
            Verlaten
        </x-button>
    </x-slot>
</x-dialog-modal>
