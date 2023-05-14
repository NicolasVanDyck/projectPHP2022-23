<div>

    <div class="container flex justify-between items-center mx-auto">
{{--        Filter op groep         --}}
        <div>
            <h3>Filter op groep:</h3>
            <label for="group" value="group"/>
            <select id="group" wire:model="group">
                <option value="%">Kies hier je groep</option>
                @foreach($groups as $g)
                    <option value="{{ $g->id }}">{{ $g->name }}</option>
                @endforeach
            </select>
        </div>
{{--        Filter op dag           --}}
        <div>
            <h3>Filter op dag:</h3>
            <label for="day" value="day"/>
            <select id="day" wire:model="day">
                <option value="%">Kies hier je dag</option>
                @foreach($grouptours as $gt)
                    <option value="{{ $gt->id }}">{{ $gt->start_date}} </option>
                @endforeach
            </select>
        </div>
{{--        Filter op fietstype         --}}
        <div>
            <h3>Filter op fietstype:</h3>
            <label for="bicycletype" value="bicycletype"/>
            <select id="bicycletype" wire:model="bicycletype">
                <option value="%">Kies hier je fietstype</option>
                @foreach($bicycletypes as $b)
                    <option value="{{ $b->id }}">{{ $b->bicycle_type }}</option>
                @endforeach
            </select>
        </div>
{{--        Filter op afstand         --}}
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

{{--    Routes tonen       --}}
    <div class="container flex grow justify-center mt-5">
        @foreach($grouptours as $grouptour)
            @foreach($tours as $tour)
                @if($grouptour->tour_id == $tour->id)
            <div wire:key="grouptour_{{$grouptour->id}}"
                 class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
                <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                    <div class='max-w-md mx-auto'>
                        <div class='p-8'>
                            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>{{$grouptour->id}}</p>
                            <p class='text-[#7C7C80] font-[15px] mt-6'>{{$grouptour->tour_id}}</p>
                            <p class='text-[#7C7C80] font-[15px] mt-6'>{{$grouptour->start_date}}</p>
                            <p class='text-[#7C7C80] font-[15px] mt-6'>{{$tour->amount_of_km}}</p>
                        </div>
                    </div>
                </div>
            </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>