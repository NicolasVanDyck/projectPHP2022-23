<div class="flex flex-wrap">
{{--    <h1 class="text-2xl font-bold mt-8 mb-4">Your Registered Tours</h1>--}}
{{--    <div class="flex flex-wrap">--}}
{{--        @foreach($userTours as $userTour)--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td class="border px-4 py-2">{{ $userTour->gpx->name }}</td>--}}
{{--                    <td class="border px-4 py-2">{{ $userTour->start_date }}</td>--}}
{{--                    <td class="border px-4 py-2">{{ $userTour->end_date }}</td>--}}
{{--                    <td class="border px-4 py-2">{{ $userTour->gpx->amount_of_km }}</td>--}}
{{--                    <td class="border px-4 py-2">--}}
{{--                        <button class="inline-block w-full font-bold rounded bg-info px-6 text-center pb-2 pt-2.5 text-lg uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-md" wire:click="leaveTour('{{ $userTour->id }}')">--}}
{{--                            Leave Tour--}}
{{--                        </button>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            </table>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}

    @foreach($groupTours as $groupTour)
        <div class="p-1 pt-3 md:w-1/4">
            <div class="block max-w-[22rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700  hover:scale-105" onclick="openModal('{{ $groupTour->id }}', '{{ $groupTour->gpx->name }}', '{{ $groupTour->start_date }}', '{{ $groupTour->end_date }}', '{{ $groupTour->gpx->amount_of_km }}')">
                <a href="#!">
                    <img class="rounded-t-lg w-full" src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" alt=""/>
                </a>
                <div class="p-6">
                    <h2 class="font-semibold underline decoration-indigo-500 mb-2">
                        {{ $groupTour->gpx->name }}
                    </h2>
                    <p class="leading-relaxed text-lg mb-2">
                        Start Datum: {{ $groupTour->start_date }}
                    </p>
                    <p class="leading-relaxed text-lg mb-2">
                        Eind Datum: {{ $groupTour->end_date }}
                    </p>
                    <p class="leading-relaxed text-lg mb-2">
                        Hoeveel Km: {{ $groupTour->gpx->amount_of_km }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6">
        <div class="flex justify-end">
            <button class="text-gray-500 hover:text-gray-700" onclick="closeModal()">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <h1 class="text-xl font-bold mb-4 text-center">Aanmelden/Afmelden</h1>
        <a href="#!">
            <img class="rounded-t-lg w-full" src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" alt=""/>
        </a>
        <div class="p-6">
            <h2 class="font-semibold underline decoration-indigo-500 mb-2" id="modal-tour-name"></h2>
            <p class="leading-relaxed text-lg mb-2" id="modal-start-date"></p>
            <p class="leading-relaxed text-lg mb-2" id="modal-end-date"></p>
            <p class="leading-relaxed text-lg mb-2" id="modal-amount-of-km"></p>
            <div class="mt-4">
                <button class="inline-block w-full font-bold rounded bg-info px-6 text-center pb-2 pt-2.5 text-lg uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-md" wire:click="joinTour('{{ $groupTour->id }}')">
                    Join Tour
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    function openModal(tourId, tourName, startDate, endDate, amountOfKm) {
        document.getElementById("modal").classList.remove("hidden");
        document.getElementById("modal-tour-name").textContent = tourName;
        document.getElementById("modal-start-date").textContent = "Start Datum: " + startDate;
        document.getElementById("modal-end-date").textContent = "Eind Datum: " + endDate;
        document.getElementById("modal-amount-of-km").textContent = "Hoeveel Km: " + amountOfKm;
        document.getElementById("join-tour-btn").classList.remove("hidden");
        document.getElementById("selected-tour-id").value = tourId;
        Livewire.emit('openModal', tourId); // Emitting an event to the Livewire component
    }

    function closeModal() {
        document.getElementById("modal").classList.add("hidden");
        Livewire.emit('closeModal'); // Emitting an event to the Livewire component
    }
</script>
