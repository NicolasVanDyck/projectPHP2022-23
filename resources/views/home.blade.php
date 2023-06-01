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
    <div class="flex sm:justify-between bg-[#c7daea]">
        <div class="hidden sm:flex mx-auto mt-5 w-1/3">
            <img src="assets/images/cycling.webp" alt="sky" class="w-[300px] h-full mix-blend-multiply">
        </div>
        <div class="flex flex-col mx-auto sm:mx-0 sm:w-1/2 mt-5">
            <h3 class="text-2xl text-center text-gray-800">Geplande activiteiten</h3>
            <livewire:activities/>
        </div>
    </div>
    {{--Carousel--}}
    <div class="flex sm:justify-between bg-[#c7daea]">
        <div
            class="flex flex-col mx-auto sm:mx-0 sm:w-1/2 mt-5">
            <h3 class="text-2xl text-center text-gray-800">Foto's</h3>
            <x-wd_components.carousel/>
        </div>
        <div class="hidden sm:flex mt-5 w-1/3">
            <img src="assets/images/cycling_sprint.webp" alt="sprint" class="w-[300px] h-full mix-blend-multiply">
        </div>
    </div>

</x-templatelayout>
