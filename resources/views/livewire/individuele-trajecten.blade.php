<div>
    @foreach($trajecten as $traject)
        <x-wd_components.card-individuele-trajecten>
            <x-slot:card_title>{{$traject->name}}</x-slot:card_title>
            <x-slot:card_distance>Afstand: {{round($traject->amount_of_km/1000,2)}}KM
            </x-slot:card_distance>
            <x-slot:card_user>Uploaded by: {{$traject->user->name}}</x-slot:card_user>
        </x-wd_components.card-individuele-trajecten>
    @endforeach
</div>
