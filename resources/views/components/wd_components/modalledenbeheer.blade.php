<x-dialog-modal id="userModal"
                wire:model="showModal">
    <x-slot name="title">
        <h2>{{ is_null($newUser['id']) ? 'Nieuwe gebruiker aanmaken' : 'Gegevens van ' . $newUser['name'] . ' aanpassen' }}</h2>
    </x-slot>
    <x-slot name="content">
        <div class="relative flex-auto p-4">
            @if($errors->any())
            @endif
            <div>
                <x-label for="newUser.name" value="Naam"/>
                <x-input id="newUser.name" type="text" name="name" placeholder="naam"
                         wire:model.defer="newUser.name"
                         required
                         autofocus autocomplete="name" class="block mt-1 w-full"/>
                <x-input-error for="newUser.name" class="mt-2"/>
            </div>
            <div>
                <x-label for="newUser.username" value="Gebruikersnaam"/>
                <x-input id="newUser.username" type="text" name="username"
                         placeholder="gebruikersnaam"
                         wire:model.defer="newUser.username" required autofocus
                         autocomplete="username"
                         class="block mt-1 w-full"/>
                <x-input-error for="newUser.username" class="mt-2"/>
            </div>
            <div>
                <x-label for="newUser.birthdate" value="Geboortedatum"/>
                <x-input id="newUser.birthdate" type="date" name="birthdate"
                         placeholder="geboortedatum"
                         wire:model.defer="newUser.birthdate" required autofocus
                         autocomplete="birthdate"
                         class="block mt-1 w-full"/>
                <x-input-error for="newUser.birthdate" class="mt-2"/>
            </div>
            <div>
                <x-label for="newUser.email" value="Email"/>
                <x-input id="newUser.email" type="email" name="email"
                         wire:model.defer="newUser.email" required autofocus
                         autocomplete="email" class="block mt-1 w-full"/>
                <x-input-error for="newUser.email" class="mt-2"/>
            </div>
            <div>
                <x-label for="newUser.postal_code" value="Postcode"/>
                <x-input id="newUser.postal_code" type="text" name="postal_code"
                         placeholder="postcode"
                         wire:model.defer="newUser.postal_code" required autofocus
                         autocomplete="zipcode"
                         class="block mt-1 w-full"/>
                <x-input-error for="newUser.postal_code" class="mt-2"/>
            </div>
            <div>
                <x-label for="newUser.city" value="Stad"/>
                <x-input id="newUser.city" type="text" name="city" placeholder="stad"
                         wire:model.defer="newUser.city"
                         required
                         autofocus autocomplete="city" class="block mt-1 w-full"/>
                <x-input-error for="newUser.city" class="mt-2"/>
            </div>
            <div>
                <x-label for="newUser.address" value="Adres"/>
                <x-input id="newUser.address" type="text" name="address" placeholder="adres"
                         wire:model.defer="newUser.address" required autofocus
                         autocomplete="address"
                         class="block mt-1 w-full"/>
                <x-input-error for="newUser.address" class="mt-2"/>
            </div>
            <div>
                <x-label for="newUser.phone_number" value="Telefoonnummer"/>
                <x-input id="newUser.phone_number" type="text" name="phone_number"
                         placeholder="telefoonnummer"
                         wire:model.defer="newUser.phone_number" autofocus
                         autocomplete="phone_number"
                         class="block mt-1 w-full"/>
                <x-input-error for="newUser.phone_number" class="mt-2"/>
            </div>
            <div>
                <x-label for="newUser.mobile_number" value="Mobiel nummer"/>
                <x-input id="newUser.mobile_number" type="text" name="mobile_number"
                         placeholder="mobiel nummer"
                         wire:model.defer="newUser.mobile_number" autofocus
                         autocomplete="mobile_number"
                         class="block mt-1 w-full"/>
                <x-input-error for="newUser.mobile_number" class="mt-2"/>
            </div>
            <div>
                <x-label for="newUser.is_admin" value="Administrator"/>
                <x-checkbox id="newUser.is_admin" type="checkbox"
                            wire:model="newUser.is_admin"
                            autocomplete="off" class="block mt-1"/>
                <x-input-error for="newUser.is_admin" class="mt-2"/>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        @if(is_null($newUser['id']))
            <x-button
                    wire:click="createUser()"
                    wire:loading.attr="disabled"
                    class="ml-2">Gegevens opslaan & verlaten
            </x-button>
            <x-button
                    wire:click="setNewUser()"
                    wire:loading.attr="disabled"
                    class="ml-2">Formulier resetten
            </x-button>
        @else
            <x-button
                    wire:click="updateUser({{$newUser['id']}})"
                    wire:loading.attr="disabled"
                    class="ml-2">Aanpassingen opslaan & verlaten
            </x-button>
        @endif

        <x-button type="red" @click="show = false">
            Annuleren </x-button>
    </x-slot>
</x-dialog-modal>