<x-dialog-modal id="deelnameModal"
                wire:model="showModal">
    <x-slot name="title">
        <h2>Aanpassingen doorvoeren</h2>
    </x-slot>
    <x-slot name="content">
        <div class="relative flex-auto p-4">
            <div class="px-8">
                <p class="text-[#7C7C80] font-[15px]">Aanwezigheden:</p>
            </div>
            <div class="px-8">
                @foreach($usertours as $usertour)
                    @if($grouptour->id == $usertour->group_tour_id)
                        <div class="flex items-center mb-1 justify-between"
                             wire:key="usertour_{{$usertour->id}}">
                            <div>
                                <p>{{$usertour->user->name}}</p>
                            </div>
                            <div>
                                <x-button bgcolor="rood" wire:click="deleteDeelname({{$usertour->id}})">
                                    Verwijder
                                </x-button>
                            </div>
                        </div>
                    @endif

                @endforeach
            </div>
            <div class="flex">
                <select id="deelname" wire:model="deelname">
                    <option value="">Kies een deelnemer</option>
                    {{--Nog zien hoe deelnemers er niet dubbel in kunnen staan!--}}
                    @foreach($users as $user)

                        {{--                                            @foreach($usertours as $ust)--}}
                        {{--                                    @if($ust->user_id != $user->id && $ust->group_tour_id == $grouptour->id)--}}
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        {{--                                            @endif--}}
                        {{--                                    @endforeach--}}
                    @endforeach
                </select>
                @if($deelname != null)
                    <x-button wire:click="addDeelname({{$grouptour->id}},{{$grouptour->tour_id}})">Voeg toe</x-button>
                    {{--Waarom werkt onderstaande niet???--}}
                    {{--                                @else--}}
                    {{--                                    <x-button disabled>Voeg toe</x-button>--}}
                @endif
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-button bgcolor="rood" @click="show = false">
            Verlaten
        </x-button>
    </x-slot>
</x-dialog-modal>