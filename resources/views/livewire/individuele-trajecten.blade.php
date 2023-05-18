<div>
    @foreach($fileArray as $file)
        <x-wd_components.card-individuele-trajecten>
            <x-slot:card_title>{{$file->tracks[0]->name}}</x-slot:card_title>
            <x-slot:card_date>{{$file->metadata->time->format('d-m-Y')}}</x-slot:card_date>
            <x-slot:card_distance>Afstand: {{round($file->tracks[0]->segments[0]->stats->distance/1000,2)}}KM
            </x-slot:card_distance>
        </x-wd_components.card-individuele-trajecten>
    @endforeach
</div>
