<div>

{{--    Filter ledenbeheer op naam of gebruikersnaam --}}
    <section class="mb-4 flex gap-2 justify-evenly items-center bg-white">
        <x-button wire:click="setNewUser()" class="ml-5">
            Clublid toevoegen
        </x-button>
        <div class="grow">
            <x-input id="search" type="text" name="search"
                     placeholder="Zoek een lid op naam of gebruikersnaam"
                     wire:model.debounce.500ms="search"
                     autofocus autocomplete="search" class="block mt-1 w-[80%] mx-auto"/>
        </div>
        <div class="mr-5">{{$users->links()}}</div>
    </section>


    <div>
        <table class="text-center border border-gray-300 mx-auto w-[95%]">
{{--            Nog nuttig?? --}}
{{--            <colgroup>--}}
{{--                <col class="w-10">--}}
{{--                <col class="w-10">--}}
{{--                <col class="w-10">--}}
{{--                <col class="w-10">--}}
{{--                <col class="w-10">--}}
{{--                <col class="w-10">--}}
{{--                <col class="w-10">--}}
{{--                <col class="w-10">--}}
{{--            </colgroup>--}}
            <thead>
            <tr class="[&>th]:p-2 cursor-pointer bg-white">
                <th wire:click="resort('name')">Naam</th>
                <th wire:click="resort('username')">Gebruikersnaam</th>
                <th wire:click="resort('birthdate')">Verjaardag</th>
                <th wire:click="resort('email')">E-mail</th>
                <th wire:click="resort('postal_code')">Postcode</th>
                <th wire:click="resort('city')">Woonplaats</th>
                <th wire:click="resort('address')">Adres</th>
{{--                Hidden, omdat anders niet alles op 1 scherm kan?--}}
                <th wire:click="resort('phone_number')" class="lg:!hidden">Telefoonnummer</th>
                <th wire:click="resort('mobile_number')" class="lg:!hidden">GSM</th>
                <th></th>
                <th wire:click="resort('is_admin')">Administrator</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr class="border-t border-gray-300 [&>td]:p-2 hover:bg-white"
                wire:key="user_{{$user->id}}">
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{date('d/m/Y', strtotime($user->birthdate))}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->postal_code}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->address}}</td>
{{--                    Hidden, anders alles niet op 1 scherm? --}}
                    <td class="lg:!hidden">{{$user->phone_number}}</td>
                    <td class="lg:!hidden">{{$user->mobile_number}}</td>
                    <td>
                        <div class="flex gap-1 justify-center [&>*]:cursor-pointer [&>*]:outline-0 [&>*]:transition">
                            <x-button
                            wire:click="setNewUser({{$user->id}})">
                                Aanpassen
                            </x-button>
{{--                            Om ervoor te zorgen dat admins niet rechtstreeks andere admins kunnen verwijderen!       --}}
                            @if($user->is_admin != 1)
                            <x-button bgcolor="rood"
                                      x-data=""
                                      @click="confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?') ? $wire.deleteUser({{$user->id}}) : ''"
                            >
                                Verwijderen
                            </x-button>
                            @endif
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
@include('components.wd_components.modalledenbeheer')
</div>

