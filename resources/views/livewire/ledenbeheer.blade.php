<div>

    {{-- Detail section --}}
    <section class="mb-4 flex gap-2 justify-evenly">
        <x-button wire:click="setNewUser()">
            Clublid toevoegen
        </x-button>
        <div>{{$users->links()}}</div>
    </section>
    <x-dialog-modal id="userModal"
                    wire:model="showModal">
        <x-slot name="title">
            <h2>Nieuwe user aanmaken</h2>
        </x-slot>
        <x-slot name="content">
            <div class="relative flex-auto p-4">
                @if($errors->any())
                @endif
                <div>
                    <x-label for="name" value="Naam"/>
                    <x-input id="newUser.name" type="text" name="name" placeholder="naam"
                             wire:model.defer="newUser.name"
                             required
                             autofocus autocomplete="name" class="block mt-1 w-full"/>
                    <x-input-error for="newUser.name" class="mt-2"/>
                </div>
                <div>
                    <x-label for="username" value="Gebruikersnaam"/>
                    <x-input id="newUser.username" type="text" name="username"
                             placeholder="gebruikersnaam"
                             wire:model.defer="newUser.username" required autofocus
                             autocomplete="username"
                             class="block mt-1 w-full"/>
                    <x-input-error for="newUser.username" class="mt-2"/>
                </div>
                <div>
                    <x-label for="birthdate" value="Geboortedatum"/>
                    <x-input id="newUser.birthdate" type="date" name="birthdate"
                             placeholder="geboortedatum"
                             wire:model.defer="newUser.birthdate" required autofocus
                             autocomplete="birthdate"
                             class="block mt-1 w-full"/>
                    <x-input-error for="newUser.birthdate" class="mt-2"/>
                </div>
                <div>
                    <x-label for="email" value="Email"/>
                    <x-input id="newUser.email" type="email" name="email"
                             wire:model.defer="newUser.email" required autofocus
                             autocomplete="email" class="block mt-1 w-full"/>
                    <x-input-error for="newUser.email" class="mt-2"/>
                </div>
                <div>
                    <x-label for="postal_code" value="Postcode"/>
                    <x-input id="newUser.postal_code" type="text" name="postal_code"
                             placeholder="postcode"
                             wire:model.defer="newUser.postal_code" required autofocus
                             autocomplete="zipcode"
                             class="block mt-1 w-full"/>
                    <x-input-error for="newUser.postal_code" class="mt-2"/>
                </div>
                <div>
                    <x-label for="city" value="Stad"/>
                    <x-input id="newUser.city" type="text" name="city" placeholder="stad"
                             wire:model.defer="newUser.city"
                             required
                             autofocus autocomplete="city" class="block mt-1 w-full"/>
                    <x-input-error for="newUser.city" class="mt-2"/>
                </div>
                <div>
                    <x-label for="address" value="Adres"/>
                    <x-input id="newUser.address" type="text" name="address" placeholder="adres"
                             wire:model.defer="newUser.address" required autofocus
                             autocomplete="address"
                             class="block mt-1 w-full"/>
                    <x-input-error for="newUser.address" class="mt-2"/>
                </div>
                <div>
                    <x-label for="phone_number" value="Telefoonnummer"/>
                    <x-input id="newUser.phone_number" type="text" name="phone"
                             placeholder="telefoonnummer"
                             wire:model.defer="newUser.phone_number" required autofocus
                             autocomplete="phone"
                             class="block mt-1 w-full"/>
                    <x-input-error for="newUser.phone_number" class="mt-2"/>
                </div>
                <div>
                    <x-label for="mobile_number" value="Mobiel nummer"/>
                    <x-input id="newUser.mobile_number" type="text" name="mobile"
                             placeholder="mobiel nummer"
                             wire:model.defer="newUser.mobile_number" required autofocus
                             autocomplete="mobile"
                             class="block mt-1 w-full"/>
                    <x-input-error for="newUser.mobile_number" class="mt-2"/>
                </div>
                <div>
                    <x-label for="password" value="Wachtwoord"/>
                    <x-input id="newUser.password" type="password" name="password"
                             wire:model.defer="newUser.password"
                             required
                             autocomplete="new-password" class="block mt-1 w-full"/>
                    <x-input-error for="newUser.password" class="mt-2"/>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button
                    type="submit"
                    wire:click="createUser()"
                    wire:loading.attr="disabled"
                    class="ml-2">Gegevens opslaan
            </x-button>
            <x-button
                    wire:click="setNewUser()"
                    wire:loading.attr="disabled"
                    class="ml-2">Formulier resetten
            </x-button>
            <x-button bgcolor="rood" @click="show = false">
                Verlaten</x-button>
        </x-slot>
    </x-dialog-modal>

    <div>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-14">
                <col class="w-20">
                <col class="w-16">
                <col class="w-max">
            </colgroup>
            <thead>
            <tr class="bg-gray-100 text-gray-700 [&>th]:p-2 cursor-pointer">
                <th>Naam</th>
                <th>Gebruikersnaam</th>
                <th>Verjaardag</th>
                <th>E-mail</th>
                <th>Postcode</th>
                <th>Woonplaats</th>
                <th>Adres</th>
                <th>Telefoonnummer</th>
                <th>GSM</th>
                <th></th>
                <th>Administrator</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr class="border-t border-gray-300 [&>td]:p-2">
                    <td>{{ $user->name }}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->birthdate}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->postal_code}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->mobile_number}}</td>
                    <td>
                        <div class="flex gap-1 justify-center [&>*]:cursor-pointer [&>*]:outline-0 [&>*]:transition">
                            <x-button>
                                Aanpassen
                            </x-button>
                            <x-button bgcolor="rood"
                                      wire:click="deleteUser({{$user->id}})">
                                Verwijderen
                            </x-button>
                        </div>
                    </td>
                    @if($user->is_admin)
                        <td class="whitespace-nowrap px-6 py-4 text-2xl text-black">&#x2713;</td>
                    @else
                        <td class="whitespace-nowrap px-6 py-4"></td>
                    @endif
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>

