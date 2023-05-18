<div>
    <div>
        <form>
            <div class="relative flex-auto p-4" data-te-modal-body-ref>
                <x-label for="name" value="Naam"/>
                <input id="newUser.name" type="text" name="name" placeholder="naam" wire:model.defer="newUser.name"
                       required
                       autofocus autocomplete="name" class="block mt-1 w-full"/>
                <x-label for="username" value="Gebruikersnaam"/>
                <input id="newUser.username" type="text" name="username" placeholder="gebruikersnaam"
                       wire:model.defer="newUser.username" required autofocus autocomplete="username"
                       class="block mt-1 w-full"/>
                <x-label for="birthdate" value="Geboortedatum"/>
                <input id="newUser.birthdate" type="date" name="birthdate" placeholder="geboortedatum"
                       wire:model.defer="newUser.birthdate" required autofocus autocomplete="birthdate"
                       class="block mt-1 w-full"/>
                <x-label for="email" value="Email"/>
                <input id="newUser.email" type="email" name="email" wire:model.defer="newUser.email" required autofocus
                       autocomplete="email" class="block mt-1 w-full"/>
                <x-label for="postal_code" value="Postcode"/>
                <input id="newUser.postal_code" type="text" name="postal_code" placeholder="postcode"
                       wire:model.defer="newUser.postal_code" required autofocus autocomplete="zipcode"
                       class="block mt-1 w-full"/>
                <x-label for="city" value="Stad"/>
                <input id="newUser.city" type="text" name="city" placeholder="stad" wire:model.defer="newUser.city"
                       required
                       autofocus autocomplete="city" class="block mt-1 w-full"/>
                <x-label for="address" value="Adres"/>
                <input id="newUser.address" type="text" name="address" placeholder="adres"
                       wire:model.defer="newUser.address" required autofocus autocomplete="address"
                       class="block mt-1 w-full"/>
                <x-label for="phone" value="Telefoonnummer"/>
                <input id="newUser.phone_number" type="text" name="phone" placeholder="telefoonnummer"
                       wire:model.defer="newUser.phone_number" required autofocus autocomplete="phone"
                       class="block mt-1 w-full"/>
                <x-label for="mobile" value="Mobiel nummer"/>
                <input id="newUser.mobile_number" type="text" name="mobile" placeholder="mobiel nummer"
                       wire:model.defer="newUser.mobile_number" required autofocus autocomplete="mobile"
                       class="block mt-1 w-full"/>
                <x-label for="password" value="Wachtwoord"/>
                <input id="newUser.password" type="password" name="password" wire:model.defer="newUser.password"
                       required
                       autocomplete="new-password" class="block mt-1 w-full"/>
            </div>
            <x-button type="submit" wire:click="createUser()">Opslaan</x-button>
        </form>
    </div>
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
