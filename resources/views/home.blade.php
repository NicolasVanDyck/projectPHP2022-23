<x-templatelayout>

    <x-slot name="title">Homepagina</x-slot>
    <x-slot name="description">Welkom op de homepagina van de Wezeldrivers</x-slot>


    {{--Text--}}
    <div class="bg-hero-pattern bg-cover bg-center bg-no-repeat h-screen">
        <div class="flex w-1/2 h-1/2 items-center">
            <livewire:admin.texts/>
        </div>
    </div>
    {{--Activities--}}
    <div
        class="flex flex-col md:flex-row md:flex-wrap sm:justify-between bg-[#c7daea]">
        <div class="md:w-3/4 mx-auto my-auto">
            <div class="flex flex-col mx-auto sm:w-2/3 mt-5">
                <h3 class="text-2xl text-center text-gray-800">Geplande activiteiten</h3>
                <livewire:activities/>
            </div>
            {{--Carousel--}}
            <div
                class="flex flex-col mx-auto sm:w-2/3 md:max-w-xl my-5">
                <h3 class="text-2xl text-center text-gray-800">Enkele sfeerfoto's</h3>
                <livewire:carousel/>
            </div>
        </div>
    </div>

</x-templatelayout>
