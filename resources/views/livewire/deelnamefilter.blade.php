<div>

    <div class="container flex justify-between items-center mx-auto">
{{--        DeelnameFilter op dag           --}}
        <div>
            <h3>Filter op dag:</h3>
            <label for="day" value="day"/>
            <select id="day" wire:model="day">
                <option value="%">Kies hier je dag</option>
                @foreach($groupdates as $groupdate)
                    <option value="{{ $groupdate }}">{{ $groupdate}} </option>
                @endforeach
            </select>
        </div>

{{--        DeelnameFilter op groep         --}}
        <div>
            <h3>Filter op groep:</h3>
            <label for="group" value="group"/>
            <select id="group" wire:model="group">
                <option value="%">Kies hier je groep</option>
                @foreach($groups as $g)
                            <option value="{{ $g->id }}">{{ $g->group }}</option>
                @endforeach
            </select>
        </div>

{{--        DeelnameFilter op afstand         --}}
        <div>
            <h3>Filter op afstand:</h3>
            <div class="p-2">
                <label for="afstand">Aantal kilometers:
                    <output id="kilometerfilter" name="kilometerfilter">{{$afstand}}</output>
                </label>

                <input type="range" id="afstand" name="afstand" wire:model="afstand" min="{{$afstandMin}}"
                       max="{{$afstandMax}}" value="0" step="10"
                       oninput="kilometerfilter.value = afstand.value">
            </div>
        </div>
    </div>

{{--         Routes tonen           --}}
    <div class="container flex grow justify-center mt-5">
        @foreach($grouptours as $grouptour)
            @foreach($tours as $tour)
                @if($grouptour->tour_id == $tour->id)
            <div wire:key="grouptour_{{$grouptour->id}}"
                 class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
                <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                    <div class='max-w-md mx-auto'>
                        <div class='p-8'>
                            <p class='text-[#7C7C80] font-[15px]'>Route: {{$tour->routeName}}</p>
                            <p class='text-[#7C7C80] font-[15px] my-3'>Groep: {{$grouptour->groupName}}</p>
                            <p class='text-[#7C7C80] font-[15px]'>Datum: {{$grouptour->start_date}}</p>
                            <p class='text-[#7C7C80] font-[15px]'>Vertrekuur: {{$grouptour->start_time}}</p>
                            <p class='text-[#7C7C80] font-[15px]'>Afstand: {{$tour->amount_of_km}} km</p>
                        </div>
                    </div>
                </div>
            </div>
                @endif
                @endforeach
            @endforeach
    </div>
</div>