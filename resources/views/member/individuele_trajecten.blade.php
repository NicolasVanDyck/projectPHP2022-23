<x-templatelayout>
    <x-slot name="title">Individuele trajecten</x-slot>
    <x-slot name="description">Op deze pagina kan je eigen trajecten uploaden of een traject downloaden om zelf te gaan
        rijden
    </x-slot>

    <div class='p-8'>
        <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>INDIVIDUELE TRAJECTEN!</p>
        <p class='text-[#7C7C80] font-[15px] mt-6'>Welkom op de website van de Wezel Drivers - de
            fietsvereniging voor fietsers van alle niveaus in de regio Wezel. Onze vereniging is opgericht
            om de passie voor fietsen te delen en samen te genieten van de mooie fietsroutes in onze regio.

            Op deze website vindt u alles wat u moet weten over onze vereniging en de activiteiten die we
            organiseren. Of u nu een ervaren wielrenner bent of net begint met fietsen, bij de Wezel Drivers
            is er altijd een plek voor u.</p>
    </div>

    <div>
        <livewire:individuele-trajecten/>
        {{--        TODO: x-data en @click, zie teams chat voor meer informatie--}}
    </div>
</x-templatelayout>
