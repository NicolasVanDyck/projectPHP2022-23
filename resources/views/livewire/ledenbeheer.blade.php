<div>
    <div>
        <div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <div class="flex justify-evenly">
{{--                                <form>--}}
{{--                                    <div class="relative flex-auto p-4" data-te-modal-body-ref>--}}
{{--                                        <x-label for="name" value="Naam"/>--}}
{{--                                        <input id="newUser.name" type="text" name="name" placeholder="naam" wire:model.defer="newUser.name"--}}
{{--                                               required--}}
{{--                                               autofocus autocomplete="name" class="block mt-1 w-full"/>--}}
{{--                                        <x-label for="username" value="Gebruikersnaam"/>--}}
{{--                                        <input id="newUser.username" type="text" name="username" placeholder="gebruikersnaam"--}}
{{--                                               wire:model.defer="newUser.username" required autofocus autocomplete="username"--}}
{{--                                               class="block mt-1 w-full"/>--}}
{{--                                        <x-label for="birthdate" value="Geboortedatum"/>--}}
{{--                                        <input id="newUser.birthdate" type="date" name="birthdate" placeholder="geboortedatum"--}}
{{--                                               wire:model.defer="newUser.birthdate" required autofocus autocomplete="birthdate"--}}
{{--                                               class="block mt-1 w-full"/>--}}
{{--                                        <x-label for="email" value="Email"/>--}}
{{--                                        <input id="newUser.email" type="email" name="email" wire:model.defer="newUser.email" required autofocus--}}
{{--                                               autocomplete="email" class="block mt-1 w-full"/>--}}
{{--                                        <x-label for="postal_code" value="Postcode"/>--}}
{{--                                        <input id="newUser.postal_code" type="text" name="postal_code" placeholder="postcode"--}}
{{--                                               wire:model.defer="newUser.postal_code" required autofocus autocomplete="zipcode"--}}
{{--                                               class="block mt-1 w-full"/>--}}
{{--                                        <x-label for="city" value="Stad"/>--}}
{{--                                        <input id="newUser.city" type="text" name="city" placeholder="stad" wire:model.defer="newUser.city"--}}
{{--                                               required--}}
{{--                                               autofocus autocomplete="city" class="block mt-1 w-full"/>--}}
{{--                                        <x-label for="address" value="Adres"/>--}}
{{--                                        <input id="newUser.address" type="text" name="address" placeholder="adres"--}}
{{--                                               wire:model.defer="newUser.address" required autofocus autocomplete="address"--}}
{{--                                               class="block mt-1 w-full"/>--}}
{{--                                        <x-label for="phone" value="Telefoonnummer"/>--}}
{{--                                        <input id="newUser.phone" type="text" name="phone" placeholder="telefoonnummer"--}}
{{--                                               wire:model.defer="newUser.phone_number" required autofocus autocomplete="phone"--}}
{{--                                               class="block mt-1 w-full"/>--}}
{{--                                        <x-label for="mobile" value="Mobiel nummer"/>--}}
{{--                                        <input id="newUser.mobile" type="text" name="mobile" placeholder="mobiel nummer"--}}
{{--                                               wire:model.defer="newUser.mobile_number" required autofocus autocomplete="mobile"--}}
{{--                                               class="block mt-1 w-full"/>--}}
{{--                                        <x-label for="password" value="Wachtwoord"/>--}}
{{--                                        <input id="newUser.password" type="password" name="password" wire:model.defer="newUser.password"--}}
{{--                                               required--}}
{{--                                               autocomplete="new-password" class="block mt-1 w-full"/>--}}
{{--                                    </div>--}}
{{--                                    <x-button type="submit" wire:click="createUser()">Opslaan</x-button>--}}
{{--                                </form>--}}
                                <!-- Button trigger modal -->
                                <x-button type="button"
                                          data-te-toggle="modal"
                                          data-te-target="#nieuwLidModal"
                                          data-te-ripple-init
                                          data-te-ripple-color="light"
{{--                                          wire:click="setNewUser()"--}}
                                >Lid toevoegen
                                </x-button>
                                <div>{{$users->links()}}</div>
                            </div>
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Id</th>
                                    <th scope="col" class="px-6 py-4">Naam</th>
                                    <th scope="col" class="px-6 py-4"></th>
                                    <th scope="col" class="px-6 py-4"></th>
                                    <th scope="col" class="px-6 py-4">Administrator</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)

                                    <tr
                                            wire:key="user_{{$user->id}}"
                                            class="border-b transition duration-300 ease-in-out hover:bg-white dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$user->id}}</td>
                                        <td class="whitespace-nowrap px-6 py-4 w-[50%]">{{$user->name}}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{--             Button Aanpassen            --}}
                                            <x-button
                                                    type="button"
{{--                                                    wire:click="editExistingUser({{$user->id}})"--}}
                                                    data-te-toggle="modal"
                                                    data-te-target="#aanpassenModal"
                                                    data-te-ripple-init
                                                    data-te-ripple-color="light"

                                            >
                                                    Aanpassen
                                            </x-button>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-button bgcolor="rood" wire:click="deleteUser({{$user->id}})">
                                                Verwijderen
                                            </x-button>
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
                </div>
            </div>


        </div>

        {{--    Create new user Modal   --}}
        <!-- Modal -->
        <div
                data-te-modal-init
                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                id="nieuwLidModal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true">
            <div
                    data-te-modal-dialog-ref
                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div
                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                    <div
                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5
                                class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                id="exampleModalLabel">
                            Voeg een nieuw clublid toe:
                        </h5>
                        <!--Close button-->
                        <button
                                type="button"
                                class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                data-te-modal-dismiss
                                aria-label="Close">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-6 w-6">
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!--Modal body-->
                    <form>
                    <div class="relative flex-auto p-4" data-te-modal-body-ref>
                            <x-label for="name" value="Naam"/>
                            <input id="newUser.name" type="text" name="name" placeholder="naam"
                                   wire:model.defer="newUser.name"
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
                            <input id="newUser.email" type="email" name="email" wire:model.defer="newUser.email"
                                   required autofocus
                                   autocomplete="email" class="block mt-1 w-full"/>
                            <x-label for="postal_code" value="Postcode"/>
                            <input id="newUser.postal_code" type="text" name="postal_code" placeholder="postcode"
                                   wire:model.defer="newUser.postal_code" required autofocus autocomplete="zipcode"
                                   class="block mt-1 w-full"/>
                            <x-label for="city" value="Stad"/>
                            <input id="newUser.city" type="text" name="city" placeholder="stad"
                                   wire:model.defer="newUser.city"
                                   required
                                   autofocus autocomplete="city" class="block mt-1 w-full"/>
                            <x-label for="address" value="Adres"/>
                            <input id="newUser.address" type="text" name="address" placeholder="adres"
                                   wire:model.defer="newUser.address" required autofocus autocomplete="address"
                                   class="block mt-1 w-full"/>
                            <x-label for="phone" value="Telefoonnummer"/>
                            <input id="newUser.phone" type="text" name="phone" placeholder="telefoonnummer"
                                   wire:model.defer="newUser.phone_number" required autofocus autocomplete="phone"
                                   class="block mt-1 w-full"/>
                            <x-label for="mobile" value="Mobiel nummer"/>
                            <input id="newUser.mobile" type="text" name="mobile" placeholder="mobiel nummer"
                                   wire:model.defer="newUser.mobile_number" required autofocus autocomplete="mobile"
                                   class="block mt-1 w-full"/>
                            <x-label for="password" value="Wachtwoord"/>
                            <input id="newUser.password" type="password" name="password"
                                   wire:model.defer="newUser.password"
                                   required
                                   autocomplete="new-password" class="block mt-1 w-full"/>
                    </div>

                </form>
                    <!--Modal footer-->
                    <div
                            class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <x-button
                                type="submit"
                                data-te-ripple-init
                                data-te-ripple-color="light"
                                wire:click="createUser()">
                            Aanmaken
                        </x-button>
{{--                        <x-button type="submit" wire:click="createUser()">Opslaan</x-button>--}}
                        <x-button
                                bgcolor="rood"
                                type="button"
                                data-te-modal-dismiss
                                data-te-ripple-init
                                data-te-ripple-color="light">
                            Annuleren
                        </x-button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal om aan te passen!! -->
        <div
                data-te-modal-init
                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                id="aanpassenModal"
                tabindex="-1"
                aria-labelledby="aanpassenModalLabel"
                aria-hidden="true"
                >
            <div
                    data-te-modal-dialog-ref
                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                <div
                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                    <div
                            wire:key="user_{{$user->id}}"
                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5
                                class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                id="exampleModalLabel">
                            {{$user->name}}
                        </h5>
                        <!--Close button-->
                        <button
                                type="button"
                                class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                data-te-modal-dismiss
                                aria-label="Close">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-6 w-6">
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative flex-auto p-4" data-te-modal-body-ref>

                    </div>

                    <!--Modal footer-->
                    <div
                            class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <x-button
                                type="button"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                            Opslaan
                        </x-button>
                        <x-button
                                type="button"
                                bgcolor="rood"
                                data-te-modal-dismiss
                                data-te-ripple-init
                                data-te-ripple-color="light">
                            Annuleren
                        </x-button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
