<x-templatelayout>

<x-slot name="title">Dashboard</x-slot>
<x-slot name="description">Welkom op het dashboard van {{auth()->user()->name}} </x-slot>

    <body class="flex min-h-screen flex items-center justify-center">
    <main class="p-6 sm:p-10 space-y-6 bg-gray-400">
        <div class="flex flex-col space-y-6  justify-between">
            <div class="mr-6 text-center">
                <h1 class="text-4xl font-semibold mb-2">Dashboard van {{auth()->user()->name}} </h1>
                <h2 class="text-gray-600 ml-0.5">Vind hier al uw statistieken</h2>
            </div>
        </div>

        <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="flex items-center p-8 bg-white shadow rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 bg-purple-100 rounded-full  mr-6" >
                    <svg class="h-10 w-10 "  width="8" height="8" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>
                        <circle cx="5" cy="18" r="3" />
                        <circle cx="19" cy="18" r="3" />
                        <polyline points="12 19 12 15 9 12 14 8 16 11 19 11" />
                        <circle cx="17" cy="5" r="1" /></svg>
                </div>
                <div>
                    <span class="text-2xl font-bold text-center ">62</span>
                    <span class="block text-gray-500">Aantal Kilometers</span>
                </div>
            </div>

            <div class="flex items-center p-8 bg-white shadow rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
                <div>
                    <span class="block text-2xl font-bold">3.659</span>
                    <span class="block text-gray-500">Aantal HoogteMeters</span>
                </div>

            </div>
            <div class="flex items-center p-8 bg-white shadow rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                    <svg class="h-8 w-8"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>
                        <path d="M4 13a8 8 0 0 1 7 7a6 6 0 0 0 3 -5a9 9 0 0 0 6 -8a3 3 0 0 0 -3 -3a9 9 0 0 0 -8 6a6 6 0 0 0 -5 3" />
                        <path d="M7 14a6 6 0 0 0 -3 6a6 6 0 0 0 6 -3" />
                        <circle cx="15" cy="9" r="1"  /></svg>
                </div>
                <div>
                    <span class="inline-block text-2xl font-bold">73</span>
                    <span class="block text-gray-500">Totaal aantal ritten</span>
                </div>
            </div>

            <div class="flex items-center p-8 bg-white shadow rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                    <svg class="h-8 w-8 text-black"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <path d="M9 5H7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2V7a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />  <path d="M9 14l2 2l4 -4" /></svg>
                </div>
                <div>
                    <span class="block text-2xl font-bold">Ingeschreven ritten</span>
                    <span class="block text-gray-500"><u>4-06-2023</u></span>
                    <span class="block text-gray-500"><u>6-06-2023</u></span>
                    <span class="block text-gray-500"><u>25-06-2023</u></span>
                    <button
                        type="button" onclick="window.location.href='{{ route('deelname_groep') }}'"
                        class="rounded border-2 border-primary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                        data-te-ripple-init>
                        Wijzigen
                    </button>
                </div>
            </div>
        </section>
        {{--        CHARTS--}}
        <section>
            <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                <div class="px-6 py-5 font-semibold border-b border-gray-100">Gereden Kilometers</div>
                <div class="p-4 flex-grow">
                    <canvas class="scale-75"
                            data-te-chart="bar"
                            data-te-dataset-label="Kilometers"
                            data-te-labels="['Januari', 'februari' , 'Maart' , 'April' , 'Mei' , 'Juni' , 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December']"
                            data-te-dataset-data="[2112, 2343, 2545, 3423, 2365, 1985, 987,458,3654,1025,988,1230]">
                    </canvas>
                </div>
            </div>

            {{--            KLASSEMENT--}}
            <section class="py-4">
                <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                    <div class="px-6 py-5 font-semibold border-b border-gray-100">KLASSEMENT</div>
                    <div class="p-4 flex-grow">
                        <canvas class="scale-75"
                                data-te-chart="bar"
                                data-te-dataset-label="Klassement"
                                data-te-labels="['Groep A', 'Groep B' , 'Groep C','MTB','0']"
                                data-te-dataset-data="[2112, 2343, 2545,1234,112]">
                        </canvas>
                    </div>
                </div>
            </section>
            {{--            KALENDER/Nog niet ingevuld--}}
            <section class="grid md:grid-cols-2 xl:grid-cols-2 gap-6">
{{--                <div class="flex flex-col row-span-3 bg-white shadow rounded-lg">--}}
{{--                    <div class="px-6 py-5 font-semibold border-b border-gray-100">Kalender</div>--}}
{{--                    <img src="https://michelzbinden.com/images/2023/vi/nl/kalender-mei-2023-50mz.jpg" alt="">--}}
{{--                </div>--}}
                <div class="flex flex-col row-span-3 rounded-lg">
                    <div class="px-6 py-5 font-semibold border-b border-gray-100">Kalender</div>
                    <livewire:activities/>
                </div>

                            UPLOAD ZONE
                <div class="flex flex-col row-span-3 bg-white shadow rounded-lg">
                    <div class="px-6 py-5 font-semibold border-b border-gray-100">Upload zone fiets statistiek</div>
                    <div class="flex items-center justify-center h-full px-4 py-24  bg-gray-100 border-2 border-gray-200 border-dashed rounded-md">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik voor de upload</span> of drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">.GPX Only</p>
                            </div>
                            <input id="dropzone-file" type="file" type="file" id="Username_file" name="Username_File" accept=".gpx," />
                        </label>
                    </div>
                </div>
            </section>

        </section>
    </main>
</body>

</x-templatelayout>
