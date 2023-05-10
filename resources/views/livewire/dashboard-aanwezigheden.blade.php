    <h3 class="font-bold underline">Aanwezige ritten:</h3>
    @foreach($aanwezigheden as $aanwezigheid)
        @if(Auth::user()->id == $aanwezigheid->user_id)
            <p>Vertrek om:</p>
            <p>{{$aanwezigheid->start_date}}</p>
            @foreach($tours as $tour)
                @foreach($routes as $route)
                    @if($tour->id == $aanwezigheid->tour_id && $tour->route_id == $route->id)
                        <p>Van: {{$route->start_location}}</p>
                        <p class="mb-4">Naar: {{$route->end_location}}</p>
                    @endif
                @endforeach
            @endforeach
        @endif
    @endforeach