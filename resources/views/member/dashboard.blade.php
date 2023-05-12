<x-templatelayout>

<x-slot name="title">Dashboard</x-slot>
<x-slot name="description">Welkom op het dashboard van {{auth()->user()->name}} </x-slot>


        <div class="flex-col space-y-6  justify-between my-6">
            <div class="mr-6 text-center">
                <h1 class="text-4xl font-semibold mb-2">Dashboard van {{auth()->user()->name}} </h1>
                <h2 class="text-gray-600 ml-0.5">Vind hier al uw statistieken</h2>
            </div>
        </div>

            {{--            STATISTIEK--}}
        @livewire('statistiek')

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
</x-templatelayout>
