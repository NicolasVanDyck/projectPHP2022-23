<div>

    <div class="flex justify-center">
    <div class="w-full max-w-3xl bg-white rounded-lg shadow-lg p-6 mb-4">
        <!-- Groep Filter -->
        <div class="flex items-center mb-2">
            <label class="mr-2">Groep:</label>
            <select wire:model="selectedGroup" class="border border-gray-300 rounded-lg px-4 py-2">
                <option value="">Alles</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->group }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dag Filter -->
        <div class="flex items-center">
            <label class="mr-2">Dag:</label>
            <select wire:model="selectedDay" class="border border-gray-300 rounded-lg px-4 py-2">
                <option value="">Alles</option>
                @foreach($days as $day)
                    <option value="{{ $day }}">{{ $day }}</option>
                @endforeach
            </select>
        </div>
        <!-- Afstand Filter -->
    <div class="flex items-center">
        <label class="mr-2">Afstand:</label>
        <input type="range" min="{{ $minDistance }}" max="{{ $maxDistance }}" value="{{ $selectedDistance }}" step="5" wire:model="selectedDistance" class="border border-gray-300 rounded-lg px-4 py-2">
        <span class="ml-2">{{ $selectedDistance }} km</span>
    </div>



        <!-- Reset Filter -->
        <div class="mt-4">
            <button wire:click="resetFilters" class="bg-gray-500 text-white px-4 py-2 rounded-lg">
                Reset Filters
            </button>
        </div>

    </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $filteredGroupTours->links() }}
    </div>

{{--Cards--}}
    <div class="flex flex-wrap">
        @foreach($filteredGroupTours as $groupTour)
            <div class="p-1 pt-3 md:w-1/3">
                <div  class="block max-w-[22rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 relative hover:bg-slate-100">
                    <img class="rounded-t-lg w-full" src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" alt=""/>
                        <div class="p-6">
                            <h2 class="font-semibold underline decoration-indigo-500 mb-2">
                                {{ $groupTour->gpx->name }}
                            </h2>
                            <p class="leading-relaxed text-lg mb-2">
                                Group Name: {{ $groupTour->group->group }}
                            </p>
                            <p class="leading-relaxed text-lg mb-2">
                                Start Datum: {{ $groupTour->start_date }}
                            </p>
                            <p class="leading-relaxed text-lg mb-2">
                                Eind Datum: {{ $groupTour->end_date }}
                            </p>
                            <p class="leading-relaxed text-lg mb-2">
                                Hoeveel Km: {{ $groupTour->gpx->amount_of_km }}
                            </p>
                            <p class="leading-relaxed text-lg mb-2">
                                Tour ID: {{ $groupTour->tour_id }}
                            </p>
                            <div class="mt-4">
                                @if ($groupTour->isRegistered)
                                    <button class="inline-block w-full font-bold rounded bg-red-500 px-6 text-center pb-2 pt-2.5 text-lg uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-red-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" wire:click="leaveTour('{{ $groupTour->tour_id }}')">Verlaat de groepsrit</button>
                                @else
                                    <button class="inline-block w-full font-bold rounded bg-info px-6 text-center pb-2 pt-2.5 text-lg uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" wire:click="joinTour('{{ $groupTour->tour_id }}')">Ik rij mee!</button>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        @endforeach
    </div>



    <!-- Pagination -->
    <div class="mt-4">
        {{ $filteredGroupTours->links() }}
    </div>

{{--    Aangemelde Groeps ritten--}}
    <div class="flex justify-center w-screen">
        <div class="w-full max-w-3xl bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-900 text-center">Geregistreerde Groeps ritten</h1>
            <div>
                @foreach($userTours as $userTour)
                    <div class="bg-gray-100 rounded-lg p-4 mb-4 ">
                        <p class="text-gray-900 font-bold text-lg underline decoration-indigo-500 mb-2">{{ $userTour->groupTour->gpx->name }}</p>
                        <p class="text-gray-700 text-sm mb-2">Start Datum: {{ $userTour->groupTour->start_date }}</p>
                        <p class="text-gray-700 text-sm mb-2">Eind Datum: {{ $userTour->groupTour->end_date }}</p>
                        <p class="text-gray-700 text-sm mb-2">Aantal Kilometer: {{ $userTour->groupTour->gpx->amount_of_km }} km</p>
                        <p class="text-gray-700 text-sm mb-2">Groep Naam: {{ $userTour->groupTour->group->group }}</p>
                        <button class="block w-full font-bold rounded bg-red-500 px-4 py-2 text-white uppercase tracking-wider text-sm shadow-md hover:bg-red-600 transition duration-150 ease-in-out" wire:click="leaveTour('{{ $userTour->id }}')">
                            Verlaat de groepsrit
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
