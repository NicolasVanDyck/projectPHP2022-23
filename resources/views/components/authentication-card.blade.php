<div class="w-[90%] sm:w-[400px] mx-auto bg-white rounded-xl mb-4">
    <div class="mx-auto px-5">
        <div class="flex justify-center items-center">
            {{ $logo }}
        </div>
        <div
            class="divide-y divide-gray-200 py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            {{ $slot }}
        </div>
    </div>
</div>
