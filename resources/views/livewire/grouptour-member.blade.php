<div>

    <div class="flex justify-between flex-wrap">
        <!-- Groep Filter -->
        <div class="flex flex-col text-gray-800">
            <label for="selectedGroup" class="mr-2">Groep:</label>
            <select id="selectedGroup" wire:model="selectedGroup"
                    class="border border-gray-300 rounded-lg px-4 py-2">
                <option value="">Alles</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->group }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dag Filter -->
        <div class="flex flex-col text-gray-800">
            <label for="selectedDay" class="mr-2">Dag:</label>
            <select id="selectedDay" wire:model="selectedDay" class="border border-gray-300 rounded-lg px-4 py-2">
                <option value="">Alles</option>
                @foreach($days as $day)
                    <option value="{{ $day }}">{{ $day }}</option>
                @endforeach
            </select>
        </div>

        {{-- Filter op afstand --}}
        <div class="flex flex-col text-gray-800">
            <h3 class="flex sm:mx-auto">Filter op afstand:</h3>
            <div class="p-2 flex">
                <label for="selectedDistance">Aantal kilometers:
                    <output id="kilometerfilter" name="kilometerfilter">{{$selectedDistance}}</output>
                </label>
                <input type="range" class="accent-blue-400" id="selectedDistance" name="selectedDistance"
                       wire:model="selectedDistance"
                       min="{{$minDistance}}"
                       max="{{$maxDistance}}" value="0" step="5"
                       x-bind:value="selectedDistance" x-on:input="kilometerfilter.value = $event.target.value">
            </div>
        </div>

        {{-- Aantal ritten per pagina --}}
        <div class="flex flex-col text-gray-800">
            <h3 class="flex">Per Page</h3>
            <div class="flex">
                <label for="perPage" value="perPage"/>
                <select id="perPage" wire:model="perPage">
                    <option value="1">1</option>
                    <option value="3">3</option>
                    <option value="6">6</option>
                    <option value="9">9</option>
                </select>
            </div>
        </div>
    </div>
    <!-- Reset Filter -->
    <x-button
        wire:click="resetFilters"
        type="gray">
        Reset
    </x-button>


    <!-- Pagination -->
    <div class="mt-4">
        {{ $filteredGroupTours->links() }}
    </div>

    {{--Cards--}}
    <div class="flex flex-wrap justify-center">
        @foreach($filteredGroupTours as $groupTour)
            <div class="p-4">
                <div
                    class="block max-w-[22rem] rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 relative hover:bg-slate-100">
                    <img class="rounded-t-lg w-full" src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg"
                         alt=""/>
                    <div class="p-6">
                        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                            {{ $groupTour->gpx->name }}
                        </h5>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            Group Name: {{ $groupTour->group->group }}
                        </p>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            Start Datum: {{ $groupTour->start_date }}
                        </p>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            Eind Datum: {{ $groupTour->end_date }}
                        </p>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            Hoeveel Km: {{ $groupTour->gpx->amount_of_km }}
                        </p>
                        <div class="flex justify-center">
                            @if ($groupTour->isRegistered)
                                <x-button
                                    type="red"
                                    x-data=""
                                    wire:click="leaveTour('{{ $groupTour->id }}')">
                                    Uitschrijven
                                </x-button>
                            @else
                                <x-button
                                    wire:click="joinTour('{{ $groupTour->id }}')">Inschrijven
                                </x-button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{--    Aangemelde Groeps ritten--}}
    @if($userTours->count() > 0)
        <div class="flex justify-center w-screen">
            <div class="w-full max-w-3xl bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-2xl font-bold mb-4 text-gray-900 text-center">Geregistreerde Groeps ritten</h1>

                <div class="grid grid-cols-2 gap-4">
                    @foreach($userTours as $userTour)
                        <div class="bg-gray-100 rounded-lg p-4 mb-4">
                            <p class="text-gray-900 font-bold text-lg underline decoration-indigo-500 mb-2">{{ $userTour->groupTour->gpx->name }}</p>
                            <p class="text-gray-700 text-sm mb-2">Start
                                Datum: {{ $userTour->groupTour->start_date }}</p>
                            <p class="text-gray-700 text-sm mb-2">Eind Datum: {{ $userTour->groupTour->end_date }}</p>
                            <p class="text-gray-700 text-sm mb-2">Aantal
                                Kilometer: {{ $userTour->groupTour->gpx->amount_of_km }} km</p>
                            <p class="text-gray-700 text-sm mb-2">Groep
                                Naam: {{ $userTour->groupTour->group->group }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
