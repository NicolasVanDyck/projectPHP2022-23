<x-dialog-modal id="imageModal"
                wire:model="showModal">
    <x-slot name="title">
        <h2>{{ is_null($newImage['id']) ? 'Nieuwe afbeelding aanmaken' : 'Pas ' . $newImage['name'] . ' aan' }}</h2>
    </x-slot>
    <x-slot name="content">
        <div class="relative flex-auto p-4">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
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
                         autocomplete="description"
                         class="block mt-1 w-full"/>
                <x-input-error for="newImage.description" class="mt-2"/>
            </div>
                {{--                dropdown van maken          --}}
            <div>
                <x-label for="image_type_id" value="Type afbeelding"/>
                <select id="newImage.image_type_id" type="integer" name="image_type_id"
                        placeholder="Type afbeelding"
                        wire:model.defer="newImage.image_type_id" required autofocus
                        autocomplete="image_type_id"
                        class="block mt-1 w-full">
                    @foreach($imagetypes as $imagetype)
                        <option value="{{$imagetype->id}}">{{$imagetype->image_type}}</option>
                    @endforeach
                </select>
{{--                In principe triggert dit nooit, want je moet een keuze maken    --}}
                <x-input-error for="newImage.image_type_id" class="mt-2"/>
            </div>
                <div>
                    <x-label for="tour_id" value="Tour"/>
                    <select id="newImage.tour_id" type="integer" name="tour_id"
                            placeholder="Tour"
                            wire:model.defer="newImage.tour_id" required autofocus
                            autocomplete="tour_id"
                            class="block mt-1 w-full">
{{--                        Value of null???            --}}
                        <option value="{{null}}">Geen tour</option>
                        @foreach($tours as $tr)
                            <option value="{{$tr->id}}">{{$tr->tour_name}}</option>
                        @endforeach
                    </select>
                    {{--                In principe triggert dit nooit, want je moet een keuze maken    --}}
                    <x-input-error for="newImage.image_type_id" class="mt-2"/>
                </div>
                <div>
                    <x-label for="in_carousel" value="Tonen op homepagina?"/>
                    <x-checkbox id="newImage.in_carousel" type="checkbox"
                                wire:model="newImage.in_carousel"
                                autocomplete="off" class="block mt-1"/>
                    <x-input-error for="newImage.in_carousel" class="mt-2"/>
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
                    wire:click="updateImage('{{$newImage['id']}}')"
                    wire:loading.attr="disabled"
                    class="ml-2">Aanpassingen opslaan
            </x-button>
        @endif

        <x-button bgcolor="rood" @click="show = false">
            Verlaten</x-button>
    </x-slot>
</x-dialog-modal>