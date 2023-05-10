<h3 class="font-bold underline">Aanwezige ritten:</h3>
@foreach($aanwezigheden as $aanwezigheid)
    @if(auth()->user()->id == $aanwezigheid->user_id)
        <p>{{$aanwezigheid->start_date}}</p>

        <p>{{$aanwezigheid->start_location}}</p>
    @endif
@endforeach

