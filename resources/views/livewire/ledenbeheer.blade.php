<div>
    <div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <div class="flex justify-evenly">
                            <!-- Button trigger modal -->
                            <x-button type="button"
                                      data-te-toggle="modal"
                                      data-te-target="#exampleModal"
                                      data-te-ripple-init
                                      data-te-ripple-color="light">Lid toevoegen
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
                                        <x-button>Aanpassen</x-button>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-button bgcolor="rood" wire:click="deleteUser({{$user->id}})">Verwijderen</x-button>
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
            id="exampleModal"
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
                <div class="relative flex-auto p-4" data-te-modal-body-ref>
                    <x-label for="name" value="Naam"/>
                    <input id="name" type="text" name="name" placeholder="naam" wire:model.defer="newUser.name" required
                           autofocus autocomplete="name" class="block mt-1 w-full"/>
                    <x-label for="username" value="Gebruikersnaam"/>
                    <input id="username" type="text" name="username" placeholder="gebruikersnaam"
                           wire:model.defer="newUser.username" required autofocus autocomplete="username"
                           class="block mt-1 w-full"/>
                    <x-label for="birthdate" value="Geboortedatum"/>
                    <input id="birthdate" type="date" name="birthdate" placeholder="geboortedatum"
                           wire:model.defer="newUser.birthdate" required autofocus autocomplete="birthdate"
                           class="block mt-1 w-full"/>
                    <x-label for="email" value="Email"/>
                    <input id="email" type="email" name="email" wire:model.defer="newUser.email" required autofocus
                           autocomplete="email" class="block mt-1 w-full"/>
                    <x-label for="postal_code" value="Postcode"/>
                    <input id="postal_code" type="text" name="postal_code" placeholder="postcode"
                           wire:model.defer="newUser.postal_code" required autofocus autocomplete="zipcode"
                           class="block mt-1 w-full"/>
                    <x-label for="city" value="Stad"/>
                    <input id="city" type="text" name="city" placeholder="stad" wire:model.defer="newUser.city" required
                           autofocus autocomplete="city" class="block mt-1 w-full"/>
                    <x-label for="address" value="Adres"/>
                    <input id="address" type="text" name="address" placeholder="adres"
                           wire:model.defer="newUser.address" required autofocus autocomplete="address"
                           class="block mt-1 w-full"/>
                    <x-label for="phone" value="Telefoonnummer"/>
                    <input id="phone" type="text" name="phone" placeholder="telefoonnummer"
                           wire:model.defer="newUser.phone_number" required autofocus autocomplete="phone"
                           class="block mt-1 w-full"/>
                    <x-label for="mobile" value="Mobiel nummer"/>
                    <input id="mobile" type="text" name="mobile" placeholder="mobiel nummer"
                           wire:model.defer="newUser.mobile_number" required autofocus autocomplete="mobile"
                           class="block mt-1 w-full"/>
                    <x-label for="password" value="Wachtwoord"/>
                    <input id="password" type="password" name="password" wire:model.defer="newUser.password" required
                           autocomplete="new-password" class="block mt-1 w-full"/>
                    {{--                <x-label for="password_confirmation" value="Bevestig wachtwoord"/>--}}
                    {{--                <input id="password_confirmation" type="password" name="password_confirmation" wire:model.defer="newUser.password_confirmation" required autocomplete="new-password" class="block mt-1 w-full" />--}}
                </div>

                <!--Modal footer-->
                <div
                        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <x-button
                            type="button"
                            data-te-ripple-init
                            data-te-ripple-color="light"
                            wire:click="createUser()">
                        Aanmaken
                    </x-button>
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
</div>
{{--Card in modal graag--}}

{{--<div--}}
{{--        class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">--}}
{{--    <a href="#!">--}}
{{--        <img--}}
{{--                class="rounded-t-lg"--}}
{{--                src={{$user->profile_photo_path}}--}}
{{--                            alt="{{$user->name}}" />--}}
{{--    </a>--}}
{{--    <div class="p-6">--}}
{{--        <h5--}}
{{--                class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">--}}
{{--            {{$user->name}}--}}
{{--        </h5>--}}
{{--        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">--}}
{{--            {{$user->email}}--}}
{{--        </p>--}}
{{--        <button--}}
{{--                type="button"--}}
{{--                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"--}}
{{--                data-te-ripple-init--}}
{{--                data-te-ripple-color="light">--}}
{{--            Button--}}
{{--        </button>--}}
{{--    </div>--}}
{{--</div>--}}


{{--$table->date('birthdate');--}}
{{--$table->string('email');--}}
{{--$table->string('postal_code');--}}
{{--$table->string('city');--}}
{{--$table->string('address');--}}
{{--$table->string('phone_number')->nullable();--}}
{{--$table->string('mobile_number')->unique()->nullable();--}}
{{--$table->timestamp('email_verified_at')->nullable();--}}
{{--$table->string('password');--}}
{{--$table->rememberToken();--}}
{{--$table->string('profile_photo_path', 2048)->nullable();--}}
{{--$table->boolean('is_admin')->default(false);--}}
{{--$table->string('access_token')->nullable();--}}
{{--$table->string('refresh_token')->nullable();--}}
{{--$table->string('expires_at')->nullable();--}}