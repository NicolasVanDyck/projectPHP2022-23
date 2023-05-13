<div>
    <h3>Filter op groep:</h3>
    <div class="container flex justify-between mx-auto">
        <div>
            <label for="group" value="group"/>
            <select id="group" wire:model="group">
                <option value="%">Kies hier je groep</option>
                @foreach($groups as $g)
                    <option value="{{ $g->id }}">{{ $g->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="afstand">Aantal kilometers:
                <output id="kilometerfilter" name="kilometerfilter">{{$afstand}}</output>
            </label>
            <input type="range" id="afstand" name="afstand" wire:model="afstand" min="{{$afstandMin}}"
                   max="{{$afstandMax}}" value="0" step="10"
                   oninput="kilometerfilter.value = afstand.value">
        </div>


    </div>
    <div class="container flex grow justify-center">
        @foreach($grouptours as $grouptour)
            <div wire:key="grouptour_{{$grouptour->id}}"
                 class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
                <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                    <div class='max-w-md mx-auto'>
                        <div class='p-8'>
                            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>{{$grouptour->id}}</p>
                            <p class='text-[#7C7C80] font-[15px] mt-6'>{{$grouptour->tour_id}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>