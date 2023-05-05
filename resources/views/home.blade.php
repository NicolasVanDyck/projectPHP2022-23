<x-templatelayout>

<x-slot name="title">Homepagina</x-slot>
<x-slot name="description">Welkom op de homepagina van de Wezeldrivers</x-slot>

    <div class='flex items-center justify-center bg-gradient-to-br px-2 pb-4 mx'>
        <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
            <div class='max-w-md mx-auto'>
                <div class='p-8'>
                    <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>Welkom bij de wezeldrivers</p>
                    <p class='text-[#7C7C80] font-[15px] mt-6'>Welkom op de website van de Wezel Drivers - de fietsvereniging voor fietsers van alle niveaus in de regio Wezel. Onze vereniging is opgericht om de passie voor fietsen te delen en samen te genieten van de mooie fietsroutes in onze regio.

                        Op deze website vindt u alles wat u moet weten over onze vereniging en de activiteiten die we organiseren. Of u nu een ervaren wielrenner bent of net begint met fietsen, bij de Wezel Drivers is er altijd een plek voor u.</p>
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
    <x-activities>
        @foreach($activities as $activity)
            <p class="flex-col">name: {{ $activity->name }}</p>
            <p class="flex-col">description: {{ $activity->description }}</p>
        @endforeach
    </x-activities>

    {{--Carousel--}}



<x-wd_components.carousel></x-wd_components.carousel>
</x-templatelayout>
