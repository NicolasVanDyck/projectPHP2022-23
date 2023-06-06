<div>
    @foreach($grouptours as $grouptour)
                <div wire:key="grouptour_{{$grouptour->id}}"
                     wire:model="grouptourid"
                     class='flex items-center justify-center text-black bg-gradient-to-br px-2 pb-4 mx'>
                    <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                        <div class='max-w-md mx-auto'>
                            <div class='p-8'>
                                <h2 class='text-2xl mb-3 font-bold text-gray-800 text-center'>{{$grouptour->gpx->name}}</h2>
                                <p><b>Datum: </b>{{$grouptour->start_date}}</p>
                                <p><b>Vertrekuur: </b>{{$grouptour->start_time}}</p>
                                <p class='my-3'><b>Groep: </b>{{$grouptour->groupName}}</p>
                            </div>
                            <div class="px-8">
                                <p class="font-bold">Aanwezigen:</p>
                            </div>
                            <div class="px-8">
                            @foreach($grouptour->usertours as $usertour)
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
                                @endforeach
                            </div>
                            <div class="flex">
                                <select wire:model="deelname">
                                    <option value="">Kies een deelnemer</option>
                                        @foreach($users as $user)
                                            @if(!in_array($user->id, $grouptour->usertours->pluck('user_id')->toArray()))
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                </select>
                                @if($deelname != null)
                                    <x-button wire:click="addDeelname({{$grouptour->id}},{{$grouptour->tour_id}})">Voeg toe</x-button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach
</div>
