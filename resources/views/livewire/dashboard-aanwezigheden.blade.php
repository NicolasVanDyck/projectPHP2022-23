<div>
    <h3 class="font-bold underline">Aanwezige ritten:</h3>
    @foreach($starturen as $startuur)
        @foreach($aanwezigheden as $aanwezigheid)
{{--            Als de ingelogde user overeenkomt met de user in de UserTour en de Tour van de UserTour
komt overeen met die van de GroupTour, worden de ritten getoond --}}
        @if(Auth::user()->id == $aanwezigheid->user_id && $aanwezigheid->tour_id == $startuur->tour_id)
                <div class="mb-2">
                    <p><b>Rit:</b> {{$startuur->gpx->name}}</p>
                    <p><b>Groep:</b> {{$startuur->group->group}}</p>
                    <p class="font-bold">Vertrek om:</p>
                    <p>{{$startuur->start_date}} {{$startuur->start_time}}</p>
                </div>
        @endif
        @endforeach
    @endforeach
</div>
