<x-dialog-modal id="productModal"
                class="@container"
                wire:model="showModal">
    <x-slot name="title">
        <h2 class="text-lg">{{ is_null($newProduct['id']) ? 'Nieuw product aanmaken' : 'Gegevens van ' . $newProduct['name'] . ' aanpassen' }}</h2>
    </x-slot>
    <x-slot name="content">
        <div class="relative flex-auto p-4">
            @if($errors->any())
            @endif
            <div class="mt-2">
                <x-label for="newProduct.name" value="Naam"/>
                <x-input id="newProduct.name" type="text" name="name" placeholder="naam"
                         wire:model.defer="newProduct.name"
                         required
                         autofocus autocomplete="name" class="block mt-1 w-full text-xs @sm:text-sm @md:text-md"/>
                <x-input-error for="newProduct.name" class="mt-2"/>
            </div>
            <div class="mt-2">
                <x-label for="newProduct.price" value="Prijs in €"/>
                <x-input id="newProduct.price" type="text" name="prijs"
                         placeholder="prijs in €"
                         wire:model.defer="newProduct.price" required autofocus
                         autocomplete="price"
                         class="block mt-1 w-full text-xs @sm:text-sm @md:text-md"/>
                <x-input-error for="newProduct.price" class="mt-2"/>
            </div>
                <div class="mt-2">
                    @if (session()->has('message'))
                        <div class="bg-green-200 text-2xl">
                            {{ session('message') }}
                        </div>
                    @endif
                    <x-label for="size" value="Maat" wire:model="sizes"/>
                    @foreach ($sizes as $size)
                        <div class="flex items-center">
                            <input
                            value="{{ $size->id }}"
                            wire:model="selectedSizes"
                            type="checkbox"
                            autofocus
                            class="mr-2 text-xs @sm:text-sm @md:text-md"
                            />
                            <label for="{{ 'size_' . $size->id }}">{{ $size->size }}</label>
                        </div>
                    @endforeach
                    <x-input-error for="newProduct.size" class="mt-2" />
                </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        @if(is_null($newProduct['id']))
            <x-button
                wire:click="createNewProduct()"
                wire:loading.attr="disabled"
                class="ml-2 mr-2 text-xs @sm:text-sm @md:text-md h-full">Opslaan & verlaten
            </x-button>
        @else
            <x-button
                wire:click="updateProduct({{$newProduct['id']}})"
                wire:loading.attr="disabled"
                class="@sm:mb-2 p-2 text-white flex flex-row @sm:w-fit h-full mr-2 ml-1">
                <p class="text-xs @sm:text-sm @md:text-md h-full">Opslaan & verlaten</p>
            </x-button>
        @endif

        <x-button class="bg-gray-200 text-xs @sm:text-sm @md:text-md" @click="show = false" wire:loading.attr="disabled">
            <p class="text-black">Annuleren</p>
        </x-button>
    </x-slot>
</x-dialog-modal>
