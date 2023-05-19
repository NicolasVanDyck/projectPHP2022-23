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
            <h2>Nieuwe user</h2>
        </x-slot>
        <x-slot name="content">
                <div class="relative flex-auto p-4" data-te-modal-body-ref>
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
                        <x-input-error for="newUser.phone" class="mt-2"/>
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
                    class="ml-2">Opslaan
            </x-button>
            <x-button
                    wire:click="setNewUser()"
                    wire:loading.attr="disabled"
                    class="ml-2">Nieuw lid aanmaken
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


{{--<div>--}}
{{--    <div>--}}
{{--        <div>--}}
{{--            <div class="flex flex-col">--}}
{{--                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
{{--                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">--}}
{{--                        <div class="overflow-hidden">--}}
{{--                            <div class="flex justify-evenly">--}}
{{--                                <form>--}}
{{--                                    <div class="relative flex-auto p-4" data-te-modal-body-ref>--}}
{{--                                        @if($errors->any())--}}
{{--                                        @endif--}}
{{--                                        <div>--}}
{{--                                            <x-label for="name" value="Naam"/>--}}
{{--                                            <x-input id="newUser.name" type="text" name="name" placeholder="naam"--}}
{{--                                                     wire:model.defer="newUser.name"--}}
{{--                                                     required--}}
{{--                                                     autofocus autocomplete="name" class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.name" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <x-label for="username" value="Gebruikersnaam"/>--}}
{{--                                            <x-input id="newUser.username" type="text" name="username"--}}
{{--                                                     placeholder="gebruikersnaam"--}}
{{--                                                     wire:model.defer="newUser.username" required autofocus--}}
{{--                                                     autocomplete="username"--}}
{{--                                                     class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.username" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <x-label for="birthdate" value="Geboortedatum"/>--}}
{{--                                            <x-input id="newUser.birthdate" type="date" name="birthdate"--}}
{{--                                                     placeholder="geboortedatum"--}}
{{--                                                     wire:model.defer="newUser.birthdate" required autofocus--}}
{{--                                                     autocomplete="birthdate"--}}
{{--                                                     class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.birthdate" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <x-label for="email" value="Email"/>--}}
{{--                                            <x-input id="newUser.email" type="email" name="email"--}}
{{--                                                     wire:model.defer="newUser.email" required autofocus--}}
{{--                                                     autocomplete="email" class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.email" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <x-label for="postal_code" value="Postcode"/>--}}
{{--                                            <x-input id="newUser.postal_code" type="text" name="postal_code"--}}
{{--                                                     placeholder="postcode"--}}
{{--                                                     wire:model.defer="newUser.postal_code" required autofocus--}}
{{--                                                     autocomplete="zipcode"--}}
{{--                                                     class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.postal_code" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <x-label for="city" value="Stad"/>--}}
{{--                                            <x-input id="newUser.city" type="text" name="city" placeholder="stad"--}}
{{--                                                     wire:model.defer="newUser.city"--}}
{{--                                                     required--}}
{{--                                                     autofocus autocomplete="city" class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.city" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <x-label for="address" value="Adres"/>--}}
{{--                                            <x-input id="newUser.address" type="text" name="address" placeholder="adres"--}}
{{--                                                     wire:model.defer="newUser.address" required autofocus--}}
{{--                                                     autocomplete="address"--}}
{{--                                                     class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.address" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <x-label for="phone_number" value="Telefoonnummer"/>--}}
{{--                                            <x-input id="newUser.phone_number" type="text" name="phone"--}}
{{--                                                     placeholder="telefoonnummer"--}}
{{--                                                     wire:model.defer="newUser.phone_number" required autofocus--}}
{{--                                                     autocomplete="phone"--}}
{{--                                                     class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.phone" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <x-label for="mobile_number" value="Mobiel nummer"/>--}}
{{--                                            <x-input id="newUser.mobile_number" type="text" name="mobile"--}}
{{--                                                     placeholder="mobiel nummer"--}}
{{--                                                     wire:model.defer="newUser.mobile_number" required autofocus--}}
{{--                                                     autocomplete="mobile"--}}
{{--                                                     class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.mobile_number" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <x-label for="password" value="Wachtwoord"/>--}}
{{--                                            <x-input id="newUser.password" type="password" name="password"--}}
{{--                                                     wire:model.defer="newUser.password"--}}
{{--                                                     required--}}
{{--                                                     autocomplete="new-password" class="block mt-1 w-full"/>--}}
{{--                                            <x-input-error for="newUser.password" class="mt-2"/>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <x-button type="submit" wire:click="createUser()">Opslaan</x-button>--}}
{{--                                </form>--}}

{{--                                --}}{{--        Werkt half se gat...    --}}
{{--                                --}}{{--                                @foreach($users as $user)--}}
{{--                                --}}{{--                                        <tr--}}
{{--                                --}}{{--                                                wire:key="user_{{ $user->id }}"--}}
{{--                                --}}{{--                                                class="border-t border-gray-300 [&>td]:p-2">--}}
{{--                                --}}{{--                                            <td>{{ $user->id }}</td>--}}
{{--                                --}}{{--                                            <td>{{ $user->name }}</td>--}}
{{--                                --}}{{--                                            <td>--}}
{{--                                --}}{{--                                                @if($editUser['id'] !== $user->id)--}}
{{--                                --}}{{--                                                    <div class="flex gap-1 justify-center [&>*]:cursor-pointer [&>*]:outline-0 [&>*]:transition">--}}
{{--                                --}}{{--                                                        <x-button--}}
{{--                                --}}{{--                                                                wire:click="editExistingUser({{ $user->id }})"--}}
{{--                                --}}{{--                                                                class="w-5 text-gray-300 hover:text-green-600"/>--}}
{{--                                --}}{{--                                                        <x-button bgcolor="rood"--}}
{{--                                --}}{{--                                                                class="w-5 text-gray-300 hover:text-red-600"/>--}}
{{--                                --}}{{--                                                    </div>--}}
{{--                                --}}{{--                                                @endif--}}
{{--                                --}}{{--                                            </td>--}}
{{--                                --}}{{--                                            @if($editUser['id'] !== $user->id)--}}
{{--                                --}}{{--                                                <td--}}
{{--                                --}}{{--                                                        class="text-left cursor-pointer">{{ $user->name }}--}}
{{--                                --}}{{--                                                </td>--}}
{{--                                --}}{{--                                            @else--}}
{{--                                --}}{{--                                                <td>--}}
{{--                                --}}{{--                                                    <div class="flex flex-col text-left">--}}
{{--                                --}}{{--                                                        <x-input id="edit_{{ $user->id }}" type="text"--}}
{{--                                --}}{{--                                                                     wire:model.defer="editUser.name"--}}
{{--                                --}}{{--                                                                        wire:keydown.enter="updateUser({{ $user->id }})"--}}
{{--                                --}}{{--                                                                     class="w-48"/>--}}
{{--                                --}}{{--                                                        <x-input-error for="editUser.name" class="mt-2"/>--}}
{{--                                --}}{{--                                                    </div>--}}
{{--                                --}}{{--                                                </td>--}}
{{--                                --}}{{--                                            @endif--}}
{{--                                --}}{{--                                        </tr>--}}
{{--                                --}}{{--                                    @endforeach--}}


{{--                                <!-- Button trigger modal -->--}}
{{--                                <x-button type="button"--}}
{{--                                          data-te-toggle="modal"--}}
{{--                                          data-te-target="#nieuwLidModal"--}}
{{--                                          data-te-ripple-init--}}
{{--                                          data-te-ripple-color="light"--}}
{{--                                          wire:click="setNewUser()"--}}
{{--                                >Lid toevoegen--}}
{{--                                </x-button>--}}
{{--                                <div>{{$users->links()}}</div>--}}
{{--                            </div>--}}
{{--                            <table class="min-w-full text-left text-sm font-light">--}}
{{--                                <thead class="border-b font-medium dark:border-neutral-500">--}}
{{--                                <tr>--}}
{{--                                    <th scope="col" class="px-6 py-4">Id</th>--}}
{{--                                    <th scope="col" class="px-6 py-4">Naam</th>--}}
{{--                                    <th scope="col" class="px-6 py-4"></th>--}}
{{--                                    <th scope="col" class="px-6 py-4"></th>--}}
{{--                                    <th scope="col" class="px-6 py-4">Administrator</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}

{{--                                <tbody>--}}
{{--                                @foreach($users as $user)--}}

{{--                                    <tr--}}
{{--                                            --}}{{--                                            wire:key="user_{{$user->id}}"--}}
{{--                                            class="border-b transition duration-300 ease-in-out hover:bg-white dark:border-neutral-500 dark:hover:bg-neutral-600">--}}
{{--                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$user->id}}</td>--}}
{{--                                        <td class="whitespace-nowrap px-6 py-4 w-[50%]">{{$user->name}}</td>--}}
{{--                                        <td class="whitespace-nowrap px-6 py-4">--}}
{{--                                            --}}{{--             Button Aanpassen            --}}
{{--                                            <x-button--}}
{{--                                                    type="button"--}}
{{--                                                    --}}{{--                                                    wire:click="editExistingUser({{$user->id}})"--}}
{{--                                                    data-te-toggle="modal"--}}
{{--                                                    data-te-target="#aanpassenModal"--}}
{{--                                                    data-te-ripple-init--}}
{{--                                                    data-te-ripple-color="light"--}}
{{--                                            >--}}
{{--                                                Aanpassen--}}
{{--                                            </x-button>--}}
{{--                                        </td>--}}
{{--                                        <td class="whitespace-nowrap px-6 py-4">--}}
{{--                                            <x-button bgcolor="rood" wire:click="deleteUser({{$user->id}})">--}}
{{--                                                Verwijderen--}}
{{--                                            </x-button>--}}
{{--                                        </td>--}}
{{--                                        @if($user->is_admin)--}}
{{--                                            <td class="whitespace-nowrap px-6 py-4 text-2xl text-black">&#x2713;</td>--}}
{{--                                        @else--}}
{{--                                            <td class="whitespace-nowrap px-6 py-4"></td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}

{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        </div>--}}

{{--        --}}{{--    Create new user Modal   --}}
{{--        <!-- Modal -->--}}
{{--        <div--}}
{{--                data-te-modal-init--}}
{{--                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"--}}
{{--                id="nieuwLidModal"--}}
{{--                tabindex="-1"--}}
{{--                aria-labelledby="exampleModalLabel"--}}
{{--                aria-hidden="true">--}}
{{--            <div--}}
{{--                    data-te-modal-dialog-ref--}}
{{--                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">--}}
{{--                <div--}}
{{--                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">--}}
{{--                    <div--}}
{{--                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">--}}
{{--                        <!--Modal title-->--}}
{{--                        <h5--}}
{{--                                class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"--}}
{{--                                id="exampleModalLabel">--}}
{{--                            Voeg een nieuw clublid toe:--}}
{{--                        </h5>--}}
{{--                        <!--Close button-->--}}
{{--                        <button--}}
{{--                                type="button"--}}
{{--                                class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"--}}
{{--                                data-te-modal-dismiss--}}
{{--                                aria-label="Close">--}}
{{--                            <svg--}}
{{--                                    xmlns="http://www.w3.org/2000/svg"--}}
{{--                                    fill="none"--}}
{{--                                    viewBox="0 0 24 24"--}}
{{--                                    stroke-width="1.5"--}}
{{--                                    stroke="currentColor"--}}
{{--                                    class="h-6 w-6">--}}
{{--                                <path--}}
{{--                                        stroke-linecap="round"--}}
{{--                                        stroke-linejoin="round"--}}
{{--                                        d="M6 18L18 6M6 6l12 12"/>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                    <!--Modal body-->--}}
{{--                    <div class="relative flex-auto p-4" data-te-modal-body-ref>--}}
{{--                        @if($errors->any())--}}
{{--                        @endif--}}
{{--                        <div>--}}
{{--                            <x-label for="name" value="Naam"/>--}}
{{--                            <x-input id="newUser.name" type="text" name="name" placeholder="naam"--}}
{{--                                     wire:model.defer="newUser.name"--}}
{{--                                     required--}}
{{--                                     autofocus autocomplete="name" class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.name" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <x-label for="username" value="Gebruikersnaam"/>--}}
{{--                            <x-input id="newUser.username" type="text" name="username"--}}
{{--                                     placeholder="gebruikersnaam"--}}
{{--                                     wire:model.defer="newUser.username" required autofocus--}}
{{--                                     autocomplete="username"--}}
{{--                                     class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.username" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <x-label for="birthdate" value="Geboortedatum"/>--}}
{{--                            <x-input id="newUser.birthdate" type="date" name="birthdate"--}}
{{--                                     placeholder="geboortedatum"--}}
{{--                                     wire:model.defer="newUser.birthdate" required autofocus--}}
{{--                                     autocomplete="birthdate"--}}
{{--                                     class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.birthdate" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <x-label for="email" value="Email"/>--}}
{{--                            <x-input id="newUser.email" type="email" name="email"--}}
{{--                                     wire:model.defer="newUser.email" required autofocus--}}
{{--                                     autocomplete="email" class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.email" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <x-label for="postal_code" value="Postcode"/>--}}
{{--                            <x-input id="newUser.postal_code" type="text" name="postal_code"--}}
{{--                                     placeholder="postcode"--}}
{{--                                     wire:model.defer="newUser.postal_code" required autofocus--}}
{{--                                     autocomplete="zipcode"--}}
{{--                                     class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.postal_code" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <x-label for="city" value="Stad"/>--}}
{{--                            <x-input id="newUser.city" type="text" name="city" placeholder="stad"--}}
{{--                                     wire:model.defer="newUser.city"--}}
{{--                                     required--}}
{{--                                     autofocus autocomplete="city" class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.city" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <x-label for="address" value="Adres"/>--}}
{{--                            <x-input id="newUser.address" type="text" name="address" placeholder="adres"--}}
{{--                                     wire:model.defer="newUser.address" required autofocus--}}
{{--                                     autocomplete="address"--}}
{{--                                     class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.address" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <x-label for="phone_number" value="Telefoonnummer"/>--}}
{{--                            <x-input id="newUser.phone_number" type="text" name="phone"--}}
{{--                                     placeholder="telefoonnummer"--}}
{{--                                     wire:model.defer="newUser.phone_number" required autofocus--}}
{{--                                     autocomplete="phone"--}}
{{--                                     class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.phone" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <x-label for="mobile_number" value="Mobiel nummer"/>--}}
{{--                            <x-input id="newUser.mobile_number" type="text" name="mobile"--}}
{{--                                     placeholder="mobiel nummer"--}}
{{--                                     wire:model.defer="newUser.mobile_number" required autofocus--}}
{{--                                     autocomplete="mobile"--}}
{{--                                     class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.mobile_number" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <x-label for="password" value="Wachtwoord"/>--}}
{{--                            <x-input id="newUser.password" type="password" name="password"--}}
{{--                                     wire:model.defer="newUser.password"--}}
{{--                                     required--}}
{{--                                     autocomplete="new-password" class="block mt-1 w-full"/>--}}
{{--                            <x-input-error for="newUser.password" class="mt-2"/>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--Modal footer-->--}}
{{--                    <div--}}
{{--                            class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">--}}
{{--                        <x-button--}}
{{--                                type="button"--}}
{{--                                data-te-ripple-init--}}
{{--                                data-te-ripple-color="light"--}}
{{--                                wire:click="createUser()"--}}
{{--                                wire:loading.attr="disabled"--}}
{{--                        >--}}
{{--                            Aanmaken--}}
{{--                        </x-button>--}}
{{--                        <x-button--}}
{{--                                bgcolor="rood"--}}
{{--                                type="button"--}}
{{--                                data-te-modal-dismiss--}}
{{--                                data-te-ripple-init--}}
{{--                                data-te-ripple-color="light">--}}
{{--                            Annuleren--}}
{{--                        </x-button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <!-- Modal om aan te passen!! -->--}}
{{--        <div--}}
{{--                data-te-modal-init--}}
{{--                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"--}}
{{--                id="aanpassenModal"--}}
{{--                tabindex="-1"--}}
{{--                aria-labelledby="aanpassenModalLabel"--}}
{{--                aria-hidden="true"--}}
{{--        >--}}
{{--            <div--}}
{{--                    data-te-modal-dialog-ref--}}
{{--                    wire:key="user_{{$user->id}}"--}}
{{--                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">--}}
{{--                @foreach($users as $user)--}}
{{--                    @if($editUser['id'] == $user->id)--}}
{{--                        <div--}}
{{--                                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">--}}
{{--                            <div--}}

{{--                                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">--}}
{{--                                <!--Modal title-->--}}
{{--                                <h5--}}
{{--                                        class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"--}}
{{--                                        id="exampleModalLabel">--}}
{{--                                    {{$user->name}}--}}
{{--                                </h5>--}}
{{--                                <!--Close button-->--}}
{{--                                <button--}}
{{--                                        type="button"--}}
{{--                                        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"--}}
{{--                                        data-te-modal-dismiss--}}
{{--                                        aria-label="Close">--}}
{{--                                    <svg--}}
{{--                                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                                            fill="none"--}}
{{--                                            viewBox="0 0 24 24"--}}
{{--                                            stroke-width="1.5"--}}
{{--                                            stroke="currentColor"--}}
{{--                                            class="h-6 w-6">--}}
{{--                                        <path--}}
{{--                                                stroke-linecap="round"--}}
{{--                                                stroke-linejoin="round"--}}
{{--                                                d="M6 18L18 6M6 6l12 12"/>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                            <!--Modal body-->--}}
{{--                            --}}{{--                    Niet zichtbaar, werkt wel buiten de modal       --}}
{{--                            <div>--}}
{{--                                @foreach($users as $user)--}}
{{--                                    <tr--}}
{{--                                            wire:key="user_{{ $user->id }}"--}}
{{--                                            class="border-t border-gray-300 [&>td]:p-2">--}}
{{--                                        <td>{{ $user->id }}</td>--}}
{{--                                        <td>{{ $user->name }}</td>--}}
{{--                                        <td>--}}
{{--                                            @if($editUser['id'] !== $user->id)--}}
{{--                                                <div class="flex gap-1 justify-center [&>*]:cursor-pointer [&>*]:outline-0 [&>*]:transition">--}}
{{--                                                    <x-button--}}
{{--                                                            wire:click="editExistingUser({{ $user->id }})"--}}
{{--                                                            class="w-5 text-gray-300 hover:text-green-600"/>--}}
{{--                                                    <x-button bgcolor="rood"--}}
{{--                                                              class="w-5 text-gray-300 hover:text-red-600"/>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        @if($editUser['id'] !== $user->id)--}}
{{--                                            <td--}}
{{--                                                    class="text-left cursor-pointer">{{ $user->name }}--}}
{{--                                            </td>--}}
{{--                                        @else--}}
{{--                                            <td>--}}
{{--                                                <div class="flex flex-col text-left">--}}
{{--                                                    <x-input id="edit_{{ $user->id }}" type="text"--}}
{{--                                                             wire:model.defer="editUser.name"--}}
{{--                                                             wire:keydown.enter="updateUser({{ $user->id }})"--}}
{{--                                                             class="w-48"/>--}}
{{--                                                    <x-input-error for="editUser.name" class="mt-2"/>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        @endif--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                            <!--Modal footer-->--}}
{{--                            <div--}}
{{--                                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">--}}
{{--                                <x-button--}}
{{--                                        type="button"--}}
{{--                                        data-te-ripple-init--}}
{{--                                        data-te-ripple-color="light">--}}
{{--                                    Opslaan--}}
{{--                                </x-button>--}}
{{--                                <x-button--}}
{{--                                        type="button"--}}
{{--                                        bgcolor="rood"--}}
{{--                                        data-te-modal-dismiss--}}
{{--                                        data-te-ripple-init--}}
{{--                                        data-te-ripple-color="light">--}}
{{--                                    Annuleren--}}
{{--                                </x-button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
