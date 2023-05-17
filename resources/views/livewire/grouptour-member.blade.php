<div class="flex flex-wrap">
    @foreach($groupTours as $groupTour)
        <div class="p-4 md:w-1/2 lg:w-1/3">
            <div class="h-full border-2 border-gray-200 rounded-lg overflow-hidden">
                <div class="relative h-64">
                    <img class="absolute object-cover w-full h-full" src="{{ $groupTour->route_image }}" alt="{{ $groupTour->route_name }}">
                </div>
                <div class="p-6 flex flex-col justify-between">
                    <div>
                        <h1 class="font-semibold underline decoration-indigo-500">{{ $groupTour->name }}</h1>
                        <h2 class="font-semibold underline decoration-indigo-500">{{ $groupTour->route_name }}</h2>
                        <p class="leading-relaxed text-lg mb-3 pt-1.5">Start Datum: <span class="font-bold">{{ $groupTour->start_date }}</span></p>
                        <p class="leading-relaxed text-lg mb-3">Eind Datum: <span class="font-bold">{{ $groupTour->end_date }}</span></p>
                        <p class="leading-relaxed text-lg mb-3">Aantal km: <span class="font-bold">{{ $groupTour->amount_of_km }}</span></p>
                    </div>
                    <div class="mt-4">
                        <a href="#" class="inline-block w-full font-bold rounded bg-info px-6 text-center pb-2 pt-2.5 text-lg uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">Meld je aan</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>


