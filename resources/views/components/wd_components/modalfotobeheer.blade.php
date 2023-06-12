<x-dialog-modal id="imageModal"
                wire:model="showModal">
    <x-slot name="title">
        <h2>{{ 'Pas ' . $newImage['name'] . ' aan' }}</h2>
    </x-slot>
    <x-slot name="content">
        <div class="relative flex-auto p-4" x-data="{ image: '', tour: ''}">
            {{--            Aanpassen van info      --}}
            <div class="mb-2">
                <x-label for="newImage.name" value="Naam"/>
                <x-input id="newImage.name" type="text" name="name" placeholder="naam"
                         wire:model.defer="newImage.name"
                         required
                         autofocus autocomplete="name" class="block mt-1 w-full"/>
                <x-input-error for="newImage.name" class="mt-2"/>
            </div>
            <div class="mb-2">
                <x-label for="newImage.description" value="Omschrijving"/>
                <x-input id="newImage.description" type="text" name="description"
                         placeholder="Omschrijving"
                         wire:model.defer="newImage.description" required autofocus
                         autocomplete="description"
                         class="block mt-1 w-full"/>
                <x-input-error for="newImage.description" class="mt-2"/>
            </div>
            <div class="mb-2">
                <x-label for="newImage.image_type_id" value="Type afbeelding"/>
                <select id="newImage.image_type_id" type="integer" name="image_type_id"
                        placeholder="Type afbeelding"
                        wire:model.defer="newImage.image_type_id" required autofocus
                        autocomplete="image_type_id"
                        class="block mt-1 w-full"
                        x-model="image">
                    <option value="">Kies een type</option>
                    @foreach($imagetypes as $imagetype)
                        <option value="{{$imagetype->id}}">{{$imagetype->image_type}}</option>
                    @endforeach
                </select>
                {{--                In principe triggert dit nooit, want je moet een keuze maken    --}}
                <x-input-error for="newImage.image_type_id" class="mt-2"/>
            </div>

            <div class="mb-2" x-show="image == '1'" x-cloak>
                <x-label for="newImage.tour_id" value="Tour"/>
                <select id="newImage.tour_id" type="integer" name="tour_id"
                        placeholder="Tour"
                        wire:model.defer="newImage.tour_id" required autofocus
                        autocomplete="tour_id"
                        class="block mt-1 w-full"
                        x-model="tour">
                    <option value="">Kies een Tour</option>
                    <option value="0">Geen tour</option>
                    @foreach($tours as $tr)
                        <option value="{{$tr->id}}">{{$tr->tour_name}}</option>
                    @endforeach
                </select>
                {{--                In principe triggert dit nooit, want je moet een keuze maken    --}}
                <x-input-error for="newImage.tour_id" class="mt-2"/>
            </div>
            <div class="flex flex-row" x-show="image == '1' && tour != '0'" x-cloak>
                <x-label class="mr-2" for="newImage.in_carousel" value="Tonen op homepagina?"/>
                <x-checkbox id="newImage.in_carousel" type="checkbox"
                            wire:model="newImage.in_carousel"
                            autocomplete="off" class="block mt-1"/>
                <x-input-error for="newImage.in_carousel" class="mt-2"/>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-button
            wire:click="updateImage('{{$newImage['id']}}')"
            wire:loading.attr="disabled"
            class="mr-2">Aanpassingen opslaan
        </x-button>
        <x-button type="red" @click="show = false">
            Verlaten
        </x-button>
    </x-slot>
</x-dialog-modal>
