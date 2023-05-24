<x-templatelayout>

<x-slot name="title">Homepagina</x-slot>
<x-slot name="description">Welkom op de homepagina van de Wezeldrivers</x-slot>
    {{--Text--}}
    <div class="md:flex lg:justify-between">
        <div class="md:flex-initial md:w-1/2 lg:w-1/2">
            <livewire:admin.texts/>
        </div>
        {{--Sponsor--}}
        <div class="md:w-1/2 lg:w-1/2">
            <livewire:sponsor/>
        </div>
    </div>
 {{--Activities--}}
<div>
    <livewire:activities/>
</div>

    {{--Carousel--}}
<x-wd_components.carousel/>
</x-templatelayout>
