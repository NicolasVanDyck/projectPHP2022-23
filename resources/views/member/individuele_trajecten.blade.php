<x-templatelayout>
    <x-slot name="title">Individuele trajecten</x-slot>
    <x-slot name="description">Op deze pagina kan je eigen trajecten uploaden of een traject downloaden om zelf te gaan
        rijden
    </x-slot>

    <livewire:admin.texts/>
    <div>
        <livewire:individuele-trajecten/>
        {{--        TODO: x-data en @click, zie teams chat voor meer informatie--}}
    </div>
</x-templatelayout>
