<x-templatelayout>

<x-slot name="title">Homepagina</x-slot>
<x-slot name="description">Welkom op de homepagina van de Wezeldrivers</x-slot>

    <div class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
        <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
            <div class='max-w-md mx-auto'>
                <div class='p-8'>
                    <livewire:admin.texts/>
                </div>
            </div>
        </div>

{{--        Sponsor--}}
        <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
            <div class='max-w-md mx-auto'>
                <div class='p-4'>
                    <img src="https://d147a5vd7kzml6.cloudfront.net/img/appeltern_nl/106581/1000x750/resize:normal/mollen_in_mijn_tuin_wat_kan_ik_doen.jpg" alt="">
                    <img src="https://www.alletop10lijstjes.nl/wp-content/uploads/2013/07/neusaap.jpg">
                </div>
            </div>
        </div>
    </div>

    {{--Activities--}}
    <h2 class="text-4xl pl-8">Activiteiten</h2>
    <livewire:activities/>



    {{--Carousel--}}
    <x-wd_components.carousel></x-wd_components.carousel>
</x-templatelayout>
