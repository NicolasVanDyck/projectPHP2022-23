<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="absolute inset-0 bg-gradient-to-l from-orange-400 to-rose-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div class="flex justify-center items-center">
                        {{ $logo }}
                        <h1 class="text-2xl font-semibold ml-4">Inloggen Wezeldrivers</h1>
                    </div>
                    <div class="divide-y divide-gray-200 py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
