<div>
    <div class="flex flex-wrap">
        @foreach($groupTours as $groupTour)
            <div class="p-4 md:w-1/2 lg:w-1/3">
                <div class="h-full border-2 border-gray-200 rounded-lg overflow-hidden">
                    <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ $groupTour->image }}" alt="tour image">
                    <div class="p-6">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Group ID: {{ $groupTour->group_id }}</h2>
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $groupTour->tour_id }}</h1>
                        <p class="leading-relaxed mb-3">Start Date: {{ $groupTour->start_date }}</p>
                        <p class="leading-relaxed mb-3">Start Date: {{ $groupTour->end_date }}</p>
                        <div class="flex items-center flex-wrap ">
                            <a href="#" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Book Now
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <span class="text-gray-400 inline-flex items-center leading-none text-sm ml-3 py-1">{{ $groupTour->id }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


</div>
