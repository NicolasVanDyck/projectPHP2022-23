<div>
    <h3 class="font-bold underline">Aanwezige ritten:</h3>
    @foreach($aanwezigheden as $aanwezigheid)
        @foreach($starturen as $startuur)
        @if(Auth::user()->id == $aanwezigheid->user_id && $aanwezigheid->tour_id == $startuur->tour_id)
            <p>Vertrek om:</p>
                        <p>{{$startuur->start_date}}</p>
            @foreach($tours as $tour)
                @foreach($gpxes as $gpx)
                    @if($tour->id == $aanwezigheid->tour_id && $tour->g_p_x_id == $gpx->id)
                        <p>Van: {{$gpx->start_location}}</p>
                        <p class="mb-4">Naar: {{$gpx->end_location}}</p>
                    @endif
                @endforeach
            @endforeach
        @endif
    @endforeach
        @endforeach
</div>
