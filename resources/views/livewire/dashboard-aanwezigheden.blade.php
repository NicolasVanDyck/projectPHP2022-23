<div>
    <div class="p-5 text-center font-semibold border-b border-gray-100">Aanwezige ritten:</div>
    <div class="flex justify-between">
        {{--        @foreach($aanwezigheden as $aanwezigheid)--}}
        {{--            @foreach($starturen as $startuur)--}}
        {{--                @if(Auth::user()->id == $aanwezigheid->user_id && $aanwezigheid->tour_id == $startuur->tour_id)--}}
        @foreach($userAanwezigheden as $userAanwezigheid)
            <div class="flex flex-col">
                <p>Vertrek om:</p>
                <p>{{$userAanwezigheid->groupTour->start_date}}</p>
                <p>{{$userAanwezigheid->groupTour->start_time}}</p>
                <p>Naam:</p>
                {{--                        @foreach($tours as $tour)--}}
                {{--                            @foreach($gpxes as $gpx)--}}
                {{--                                @if($tour->id == $aanwezigheid->tour_id && $tour->g_p_x_id == $gpx->id)--}}
                {{--                                    <p>{{$gpx->name}}</p>--}}
                {{--                                    --}}{{--                                <p class="mb-4">Naar: {{$gpx->end_location}}</p>--}}
                {{--                                @endif--}}
                {{--                            @endforeach--}}
                {{--                        @endforeach--}}
            </div>
        @endforeach
        {{--                @endif--}}
        {{--            @endforeach--}}
        {{--        @endforeach--}}
    </div>
    <x-button
        type="button" onclick="window.location.href='{{ route('deelname_groep') }}'"
        class="rounded border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
        data-te-ripple-init>
        Wijzigen
    </x-button>
    {{ $userAanwezigheden->links() }}
</div>
