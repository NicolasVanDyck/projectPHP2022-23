<div class="text-black">

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
            <thead>
            <tr class="[&>th]:p-2 cursor-pointer bg-white">
                <th wire:click="resort('name')">Naam</th>
                <th wire:click="resort('username')"class="xs:hidden lg:table-cell">Gebruikersnaam</th>
                <th wire:click="resort('birthdate')"class="xs:hidden lg:table-cell">Verjaardag</th>
                <th wire:click="resort('email')"class="xs:hidden md:table-cell">E-mail</th>
                <th wire:click="resort('postal_code')" class="xs:hidden xl:table-cell">Postcode</th>
                <th wire:click="resort('city')" class="xs:hidden xl:table-cell">Woonplaats</th>
                <th wire:click="resort('address')" class="xs:hidden xl:table-cell">Adres</th>
                {{--Hidden, omdat anders niet alles op 1 scherm kan?--}}
                <th wire:click="resort('phone_number')" class="xs:hidden 2xl:table-cell">Telefoonnummer</th>
                <th wire:click="resort('mobile_number')" class="xs:hidden 2xl:table-cell">GSM</th>
                <th></th>
                <th wire:click="resort('is_admin')">Administrator</th>
            </tr>
            </thead>
            <tbody>

            @if($users->isEmpty())
                <div class="container flex mx-auto my-2">
                    <div class="bg-white mx-auto max-w-md shadow-2xl rounded-2xl">
                        <p class="text-center justify-center p-4">
                            Er kunnen geen users met de naam/gebruikersnaam {{$search}} gevonden worden.
                            Mogelijk heeft u een spelfout gemaakt.
                        </p>
                        <div class="flex justify-center">
                            <x-button wire:click="resetSearch" class="mb-2">Ga terug</x-button>
                        </div>
                    </div>
                </div>
            @else
            @foreach($users as $user)
                <tr class="border-t border-gray-300 [&>td]:p-2 hover:bg-grey text-black"
                wire:key="user_{{$user->id}}">
                    <td>{{$user->name}}</td>
                    <td class="xs:hidden lg:table-cell">{{$user->username}}</td>
                    <td class="xs:hidden lg:table-cell">{{date('d/m/Y', strtotime($user->birthdate))}}</td>
                    <td class="xs:hidden md:table-cell">{{$user->email}}</td>
                    <td class="xs:hidden xl:table-cell">{{$user->postal_code}}</td>
                    <td class="xs:hidden xl:table-cell">{{$user->city}}</td>
                    <td class="xs:hidden xl:table-cell">{{$user->address}}</td>
                    {{--Hidden, anders alles niet op 1 scherm? --}}
                    <td class="xs:hidden 2xl:table-cell">{{$user->phone_number}}</td>
                    <td class="xs:hidden 2xl:table-cell">{{$user->mobile_number}}</td>
                    <td>
                        <div class="flex gap-1 justify-center [&>*]:cursor-pointer [&>*]:outline-0 [&>*]:transition">
                            {{--Om ervoor te zorgen dat admins niet rechtstreeks andere admins kunnen verwijderen!--}}
                            <x-heroicon-m-pencil class="w-5 h-5 hover:fill-blue-500 ml-2" wire:click="showUser({{ $user }})"/>
                            @if($user->is_admin != 1)
                                <x-heroicon-m-trash
                                        x-data=""
                                        @click="$dispatch('swal:confirm', {
                                        html: 'Verwijder {{ $user->name }}?',
                                        confirmButtonText: 'Verwijder deze gebruiker',
                                        next: {
                                        event: 'delete-genre',
                                        params: {
                                        id: {{ $user->id }}
                                        }
                                        }
                                        })"
                                        class="w-5 h-5 hover:fill-red-500 ml-2"/>
                            @endif
                        </div>
                    </td>
                    @if($user->is_admin)
                        <td class="text-2xl text-black">&#x2713;</td>
                    @else
                        <td></td>
                    @endif
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>

    @include('components.wd_components.modalledenbeheer')
</div>

