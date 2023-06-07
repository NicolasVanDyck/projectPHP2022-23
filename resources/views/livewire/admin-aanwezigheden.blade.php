<div class="bg-blue-400 p-4">
    @if($grouptours->isEmpty())
        <div class="container flex">
            <div class="bg-white mx-auto max-w-md shadow-2xl rounded-2xl">
                <p class="text-center justify-center">
                    Er kan geen rit gevonden worden. Naar alle waarschijnlijkheid
                    vallen de startdata van de ritten vroeger dan {{date('d/m/Y',strtotime($startdate))}}
                    en later dan {{date('d/m/Y',strtotime($enddate))}}.
                    Je kan de startdata nakijken onder 'Startdatum' via <a href={{route('trajectbeheer')}} class="underline">Trajectbeheer</a>.
                </p>
            </div>
        </div>
    @else
    <div class="flex sm:justify-around md:justify-center items-center">
        <h3 class="mx-2 my-4">Kies de rit die je wil beheren:</h3>
        <label for="grouptour" value="grouptour"/>
        <select class="mr-2" id="grouptour" wire:model="grouptour">
            @foreach($grouptourdropdowns as $g)
                <option value="{{ $g->id }}">{{ $g->gpx->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="container flex-col mx-auto">
        @foreach($grouptours as $grouptour)
            <div wire:key="grouptour_{{$grouptour->id}}"
                 wire:model="grouptourid"
                 class='lg:w-1/2 items-center justify-center px-2 pb-4 mx-auto'>
                <div class='mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                    <div class='max-w-md mx-auto'>
                        <div class='p-8'>
                            <h2 class='text-2xl mb-3 font-bold text-gray-800 text-center'>{{$grouptour->gpx->name}}</h2>
                            <p><b>Datum: </b>{{date('d/m/Y', strtotime($grouptour->start_date))}}</p>
                            <p><b>Vertrekuur: </b>{{$grouptour->start_time}}</p>
                            <p class="my-3"><b>Groep: </b>{{$grouptour->groupName}}</p>
                        </div>
                        <div class="px-8">
                            <p><b>Aanwezigen</b></p>
                        </div>
                        <div class="px-8">
                            @foreach($grouptour->usertours as $usertour)
                                <div class="flex items-center mb-1 justify-between"
                                     wire:key="usertour_{{$usertour->id}}">
                                    <div>
                                        <p>{{$usertour->user->name}}</p>
                                    </div>
                                    <div>
                                        <x-button type="red" wire:click="deleteDeelname({{$usertour->id}})">
                                            Verwijder
                                        </x-button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex justify-evenly mt-2">
                            <select id="deelname" wire:model="deelname" class="w-2/3">
                                <option value="">Voeg een deelnemer toe</option>
                                @foreach($users as $user)
                                    @if(!in_array($user->id, $grouptour->usertours->pluck('user_id')->toArray()))
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($deelname != null)
                                <x-button class="ml-2"
                                          wire:click="addDeelname({{$grouptour->id}},{{$grouptour->tour_id}})">Voeg toe
                                </x-button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        @endif
</div>