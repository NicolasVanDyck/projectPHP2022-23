<x-templatelayout>

<x-slot name="title">Homepagina</x-slot>
<x-slot name="description">Welkom op de homepagina van de Wezeldrivers</x-slot>

    <div class='flex-col items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
        <div class='w-full md:max-w-md mx-auto mb-4 md:mb-0 md:mr-4 bg-white rounded-3xl shadow-xl overflow-hidden'>
            <div class='max-w-md mx-auto'>
                <div class='p-8'>
                    <livewire:admin.texts/>
                </div>
            </div>
        </div>

{{--        Sponsor--}}
        <div class='w-full md:max-w-md mx-auto mb-4 md:mb-0 md:mr-4 bg-white rounded-3xl shadow-xl overflow-hidden'>
          <div>
              @livewire('sponsor')
          </div>
        </div>
    </div>

    {{--Activities--}}

    <h2 class="text-4xl pl-8">Activiteiten</h2>
    <livewire:activities/>


    {{--Carousel--}}
    <x-wd_components.carousel></x-wd_components.carousel>
</x-templatelayout>
