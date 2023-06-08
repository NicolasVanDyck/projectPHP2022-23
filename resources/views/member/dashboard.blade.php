<x-templatelayout>

    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="description">Welkom op het dashboard van {{auth()->user()->name}} </x-slot>


    @if(auth()->user()->access_token == null)
        <div class="bg-hero-pattern bg-cover bg-center bg-no-repeat h-screen">

            <div class="flex-col justify-between pt-2 ">
                <div class="flex m-auto text-center p-4">
                    <h1 class="text-white m-2">Welkom, {{auth()->user()->name}} !</h1>
                </div>
                <div class="flex m-auto text-center p-4">
                    <p class="text-white w-[400px] mx-auto sm:m-0">
                        Om je activiteiten te kunnen zien moet je eerst je Strava account koppelen.
                        Klik op de onderstaande knop om je Strava account te koppelen.
                    </p>
                </div>
                <div class="flex h-[200px]">
                    <a class="flex m-auto sm:my-auto sm:ml-[100px]"
                       href="{{ route('stravaAuthentication') }}"><img
                            src="/assets/strava/btn_strava_connectwith_orange.png"
                            alt="strava"></a>
                </div>
            </div>
        </div>
    @else
        <section class="flex flex-col">
            <div class="flex">
                <div class="flex items-center w-1/3 p-4 m-2 mr-1 bg-[#c7daea] shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-8 w-8 bg-blue-800/50 rounded-full  mr-6">
                        <svg class="h-5 w-5 " width="3" height="3" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <circle cx="5" cy="18" r="3"/>
                            <circle cx="19" cy="18" r="3"/>
                            <polyline points="12 19 12 15 9 12 14 8 16 11 19 11"/>
                            <circle cx="17" cy="5" r="1"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-base font-bold text-center ">{{$distance}}</span>
                        <span class="hidden sm:block text-gray-500">Aantal kilometers</span>
                    </div>
                </div>
                <div class="flex items-center w-1/3 p-4 m-2 mx-1 bg-[#c7daea] shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-8 w-8 text-green-600 bg-green-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-base font-bold">{{$elevation}}</span>
                        <span class="hidden sm:block text-gray-500">Aantal Hoogtemeters</span>
                    </div>

                </div>
                <div class="flex items-center w-1/3 p-4 m-2 ml-1 bg-[#c7daea] shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-8 w-8 text-red-600 bg-red-100 rounded-full mr-6">
                        <svg class="h-5 w-5" width="3" height="3" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <path
                                d="M4 13a8 8 0 0 1 7 7a6 6 0 0 0 3 -5a9 9 0 0 0 6 -8a3 3 0 0 0 -3 -3a9 9 0 0 0 -8 6a6 6 0 0 0 -5 3"/>
                            <path d="M7 14a6 6 0 0 0 -3 6a6 6 0 0 0 6 -3"/>
                            <circle cx="15" cy="9" r="1"/>
                        </svg>
                    </div>
                    <div>
                        <span class="block text-base font-bold">{{$amount}}</span>
                        <span class="hidden sm:block text-gray-500">Aantal ritten</span>
                    </div>
                </div>

            </div>
        </section>

        <section class="flex flex-col sm:flex-row">
            <div class="flex flex-col sm:w-1/2 m-2 bg-[#c7daea] shadow rounded-lg">
                <div class="font-semibold border-b p-5 text-center border-gray-100">Gereden kilometers</div>
                <div class="w-full">
                    <canvas class="p-2"
                            data-te-chart="bar"
                            data-te-dataset-label="Kilometers"
                            data-te-labels="['Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December']"
                            data-te-dataset-data="[{{implode(",",array_values($years))}}]">
                    </canvas>
                </div>
            </div>

            <div class="flex flex-col sm:w-1/2 bg-[#c7daea] m-2 shadow rounded-lg">
                <div class="p-5 text-center font-semibold border-b border-gray-100">Strava activiteiten</div>
                <div class="flex flex-wrap justify-center">
                    @foreach($activities as $activity)
                        <x-wd_components.card>
                            <x-slot:card_title>{{$activity->name}}</x-slot:card_title>
                            <x-slot:card_date>{{date('d-m-Y',strtotime($activity->start_date))}}</x-slot:card_date>
                            <x-slot:card_distance>Afstand: {{round($activity->distance/1000,2)}}KM
                            </x-slot:card_distance>
                            <x-slot:card_time>
                                Tijd: {{gmdate("H:i:s",$activity->elapsed_time)}}</x-slot:card_time>
                            <x-slot:card_elevation>Hoogtemeters: {{round($activity->total_elevation_gain,2)}}m
                            </x-slot:card_elevation>
                        </x-wd_components.card>
                    @endforeach
                </div>
                <nav>{!! $activities->links() !!}</nav>
            </div>
        </section>
        <livewire:upload-zone/>
    @endif
    <div class="sm:flex">
        <div class="flex flex-col bg-[#c7daea] m-2 shadow rounded-lg sm:w-1/2">
            @livewire('dashboard-aanwezigheden')
        </div>
        {{--            KALENDER       --}}
        <div class="flex flex-col bg-[#c7daea] m-2 shadow rounded-lg sm:w-1/2">
            <div class="p-5 text-center font-semibold border-b border-gray-100">Geplande activiteiten</div>
            <livewire:activities/>
        </div>
    </div>

</x-templatelayout>
