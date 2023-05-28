<div>
    @foreach($grouptours as $grouptour)
                <div wire:key="grouptour_{{$grouptour->id}}"
                     wire:model="grouptourid"
                     class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
                    <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                        <div class='max-w-md mx-auto'>
                            <div class='p-8'>
                                <p class='text-[#7C7C80] font-[15px] my-3'>Groep: {{$grouptour->groupName}}</p>
                                <p class='text-[#7C7C80] font-[15px]'>Datum: {{$grouptour->start_date}}</p>
                                <p class='text-[#7C7C80] font-[15px]'>Vertrekuur: {{$grouptour->start_time}}</p>
                            </div>
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
{{--Nog zien hoe ik deelnemers er niet dubbel in kunnen staan!--}}
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
                    </div>
                </div>
    @endforeach
</div>
