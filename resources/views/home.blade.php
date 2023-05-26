<x-templatelayout>

    <x-slot name="title">Homepagina</x-slot>
    <x-slot name="description">Welkom op de homepagina van de Wezeldrivers</x-slot>
    {{--    Spatie voor tussen nav en radius--}}
    <div class="py-5 bg-[#F5F5F5]"></div>

    {{--Text--}}
    <div class="md:flex lg:justify-between">
        <div class="md:flex-initial md:w-1/2 lg:w-1/2">
            <livewire:admin.texts/>
        </div>
        {{--Activities--}}
        <div>
            <h3 class="text-2xl text-center">Geplande activiteiten</h3>
            <livewire:activities/>
        </div>
    </div>

    <div
        class="md:flex rounded-2xl p-4 bg-gradient-to-l from-blue-100 via-blue-300 to-blue-500 ">
        {{--Carousel--}}
        <x-wd_components.carousel/>
        {{--Sponsor--}}
        <div class="md:w-1/2 lg:w-1/2">
            <livewire:sponsor/>
        </div>
    </div>
    {{--    Spatie voor tussen footer en radius--}}
    <div class="py-5 bg-[#F5F5F5]"></div>
</x-templatelayout>
