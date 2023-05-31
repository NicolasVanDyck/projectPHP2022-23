<div>

    @foreach($usertours as $usertour)
        <div>
            <p>Aanwezigen:</p>
            <ul>
        @foreach($users as $user)
{{--            --}}
            @if($usertour->tour_id == 1 && $usertour->user_id == $user->id)
                <li>{{$user->name}}</li>
            @endif
        @endforeach
</ul>
        </div>
    @endforeach
</div>
