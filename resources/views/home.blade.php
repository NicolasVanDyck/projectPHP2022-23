<x-templatelayout>

    <x-slot name="title">Homepagina</x-slot>
    <x-slot name="description">Welkom op de homepagina van de Wezeldrivers</x-slot>


    {{--Text--}}
    <div
        class="lg:flex lg:flex-col lg:w-[400px] lg:items-center lg:justify-between xl:w-[550px]">
        <div class="lg:flex lg:w-[400px] xl:w-[550px]">
            <livewire:admin.texts/>
        </div>
        {{--Activities--}}
        <div class="lg:w-[400px] xl:w-[550px] md:mt-20">
            <h3 class="text-2xl text-center">Geplande activiteiten</h3>
            <livewire:activities/>
        </div>
        <div
            class="mt-1 border-2 border-red-500">
            {{--Carousel--}}
            <x-wd_components.carousel/>
        </div>
    </div>


</x-templatelayout>
