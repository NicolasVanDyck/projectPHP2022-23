<div>

    <div class="container flex justify-between items-center mx-auto">

        {{--        Filter op groep         --}}
        <div>
            <h3>Kies je groep:</h3>
            <label for="group" value="group"/>
            <select id="group" wire:model="group">
                <option value="%">Kies hier je groep</option>
                @foreach($groups as $g)
                    <option value="{{ $g->id }}">{{ $g->group }}</option>
                @endforeach
            </select>
        </div>

        {{--        Filter op dag           --}}
        @if($group != '%')
        <div>
            <h3>Kies uit de beschikbare dagen:</h3>
            <label for="day" value="day"/>
            <select id="day" wire:model="day">
                <option value="%">Kies hier je dag</option>
                @foreach($groupdates as $groupdate)
                    <option value="{{ $groupdate }}">{{ $groupdate}} </option>
                @endforeach
            </select>
        </div>
        @endif

        {{--        Filter op afstand         --}}
        <div>
            <h3>Kies je afstand:</h3>
            <div class="p-2">
                <label for="afstand">Aantal kilometers:
                    <output id="kilometerfilter" name="kilometerfilter">{{round($afstand/1000)}}</output>
                </label>

                <input type="range" id="afstand" name="afstand" wire:model="afstand" min="{{$afstandMin}}"
                       max="{{$afstandMax}}" value="0" step="1"

                       oninput="kilometerfilter.value = afstand.value">
            </div>
        </div>
    </div>

    {{--         Routes tonen           --}}
    <div class="container flex grow justify-center mt-5">
{{--        @if($group == '%' && $day == '%')--}}
{{--            @foreach($startgrouptours as $startgrouptour)--}}
{{--                @foreach($gpxes as $gpx)--}}
{{--                    @if($startgrouptour->tour_id == $gpx->id)--}}
{{--                        <div wire:key="grouptour_{{$startgrouptour->id}}"--}}
{{--                             class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>--}}
{{--                            <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>--}}
{{--                                <div class='max-w-md mx-auto'>--}}
{{--                                    <div class='p-8'>--}}
{{--                                        <p class='text-[#7C7C80] font-[15px]'>Route: {{$gpx->name}}</p>--}}
{{--                                        <p class='text-[#7C7C80] font-[15px] my-3'>Groep: {{$startgrouptour->groupName}}</p>--}}
{{--                                        <p class='text-[#7C7C80] font-[15px]'>Datum: {{$startgrouptour->start_date}}</p>--}}
{{--                                        <p class='text-[#7C7C80] font-[15px]'>Vertrekuur: {{$startgrouptour->start_time}}</p>--}}
{{--                                        <p class='text-[#7C7C80] font-[15px]'>Afstand: {{$gpx->amount_of_km}} km</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endforeach--}}
{{--        @else--}}
        @foreach($grouptours as $grouptour)
            @foreach($gpxes as $gpx)
                @if($grouptour->tour_id == $gpx->id)
            <div wire:key="grouptour_{{$grouptour->id}}"
                 class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
                <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                    <div class='max-w-md mx-auto'>
                        <div class='p-8'>
                            <p class='text-[#7C7C80] font-[15px]'>Route: {{$gpx->name}}</p>
                            <p class='text-[#7C7C80] font-[15px] my-3'>Groep: {{$grouptour->groupName}}</p>
                            <p class='text-[#7C7C80] font-[15px]'>Datum: {{$grouptour->start_date}}</p>
                            <p class='text-[#7C7C80] font-[15px]'>Vertrekuur: {{$grouptour->start_time}}</p>
                            <p class='text-[#7C7C80] font-[15px]'>Afstand: {{$gpx->amount_of_km}} km</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @endforeach
    @endforeach
{{--        @endif--}}
    </div>
</div>
