<div>
    @foreach($trajecten as $traject)
        <x-wd_components.card-individuele-trajecten>
            <x-slot:title>{{$traject->name}}</x-slot:title>
            <x-slot:distance>Afstand: {{round($traject->amount_of_km/1000,2)}}KM
            </x-slot:distance>
            <x-slot:user>Uploaded by: {{$traject->user->name}}</x-slot:user>
            <x-slot:path>{{$traject->path}}</x-slot:path>
        </x-wd_components.card-individuele-trajecten>
    @endforeach
</div>
