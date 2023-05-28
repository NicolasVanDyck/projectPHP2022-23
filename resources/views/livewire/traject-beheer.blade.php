<div>
    <div>
        <div>
            <x-button wire:click="openModal" class="bg-danger">Maak je groepsrit</x-button>
        </div>

        <div>
            <div
                x-data="{ isNestedModalOpen: @entangle('isNestedModalOpen'), openModal: @entangle('openModal'), selectedRoute: @entangle('selectedRoute'), selectedRouteName: @entangle('selectedRouteName'), selectedRouteKm: @entangle('selectedRouteKm'), selectedDate: @entangle('selectedDate'), selectedEndDate: @entangle('selectedEndDate') }"
                x-cloak>
                <div x-show="isNestedModalOpen"
                     class="fixed inset-0 z-10 bg-gray-900 bg-opacity-50 flex items-center justify-center px-4">
                    <div class="bg-white rounded-lg p-6">
                        <div class="flex justify-end">
                            <button class="text-gray-500 hover:text-gray-700" wire:click="closeNestedModal">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <h1 class="text-xl font-bold mb-4 text-center" id="nested-modal-title">Selecteer hier de
                            route</h1>
                        <p class="leading-relaxed" id="nested-modal-description">Hier vind je alle routes die voor de
                            wezeldrivers beschikbaar zijn</p>

                        <div class="grid grid-cols-3 gap-4 mt-4">
                            @foreach($routes as $route)
                                <div class="bg-gray-100 p-4 rounded-lg cursor-pointer hover:bg-info-200"
                                     x-bind:class="{ 'bg-blue-200': {{ $route->id }} === selectedRoute }"
                                     x-on:click="$wire.selectRoute({{ $route->id }}, '{{ $route->amount_of_km }}')"
                                >
                                    <h2 class="text-lg font-bold">{{ $route->name }}</h2>
                                    <p>{{ $route->amount_of_km }} km</p>
                                </div>
                            @endforeach
                        </div>

                        <button class="btn btn-primary mt-4" x-on:click="$wire.closeNestedModal"
                                :disabled="!selectedRoute">Selecteer
                        </button>
                    </div>
                </div>

                <div x-show="openModal"
                     class="fixed inset-0 z-10 bg-gray-900 bg-opacity-50 z-[1] flex items-center justify-center px-4">
                    <div class="bg-white rounded-lg p-6">
                        <div class="flex justify-end">
                            <button class="text-gray-500 hover:text-gray-700" wire:click="closeModal">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <h1 class="text-xl font-bold mb-4 text-center" id="modal-title">Maak een groepsrit</h1>
                        <p>Hier maak je een groeprit aan. Dit doe je door middel van het kiezen van een groep en een
                            route.</p>
                        <select wire:model="selectedGroup" class="form-control">
                            <option value="">-- Kies de groep --</option>
                            @foreach($groups as $groupId => $group)
                                <option value="{{ $groupId }}">{{ $group }}</option>
                            @endforeach
                        </select>

                        @error('selectedGroup')
                        <div class="text-red-500 mt-2">{{ 'Kies hier een groep' }}</div>@enderror

                        <div x-show="selectedGroup" class="mt-4">
                            <button class="btn bg-info mt-4" x-on:click="isNestedModalOpen = true"
                                    :disabled="!selectedGroup">Kies een route
                            </button>
                            <p class="mt-2" x-show="selectedRoute">Geselecteerde route:
                                <span>{{ $selectedRouteName }}</span></p>
                            <p class="mt-2" x-show="selectedRouteKm">Afstand: <span>{{ $selectedRouteKm }}</span> km</p>

                            @if($selectedRoute)
                                <div class="mt-4">
                                    <label for="start-datepicker" class="block font-medium text-gray-700">Start datum en
                                        tijd:</label>
                                    <input type="datetime-local" id="start-datepicker" wire:model="selectedDate"
                                           class="form-control mt-1">
                                    @error('selectedDate')
                                    <div
                                        class="text-red-500 mt-2">{{ 'Geef nog een start datum en start tijd' }}</div>@enderror
                                </div>
                                <div class="mt-4">
                                    <label for="end-datepicker" class="block font-medium text-gray-700">Eind datum en
                                        tijd:</label>
                                    <input type="datetime-local" id="end-datepicker" wire:model="selectedEndDate"
                                           class="form-control mt-1">
                                    @error('selectedEndDate')
                                    <div
                                        class="text-red-500 mt-2">{{'Geef nog een eind datum en eind tijd' }}</div>@enderror
                                </div>
                            @endif
                        </div>

                        <button class="bg-cyan-300 p-2" wire:click="createGroepsrit"
                                :disabled="!selectedGroup || !selectedRoute || !selectedDate || !selectedEndDate">Maak
                            je groepsrit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="p-6">
    <h1 class="text-xl font-bold underline text-center">Groepsritten</h1>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="px-4 py-2">Groep</th>
                <th class="px-4 py-2">Route</th>
                <th class="px-4 py-2">Afstand (km)</th>
                <th class="px-4 py-2">Start Datum</th>
                <th class="px-4 py-2">Start Tijd</th>
                <th class="px-4 py-2">Eind Datum</th>
                <th class="px-4 py-2">Bewerken/Verwijderen</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groupTours as $groupTour)
                <tr class="text-center">
                    <td class="border-y border-gray-700 py-2">{{ $groupTour->group->group }}</td>
                    <td class="border-y border-gray-700 px-4 py-2">{{ $groupTour->gpx->name }}</td>
                    <td class="border-y border-gray-700 px-4 py-2">{{ $groupTour->gpx->amount_of_km }}</td>
                    <td class="border-y border-gray-700 px-4 py-2">{{ $groupTour->start_date }}</td>
                    <td class="border-y border-gray-700 px-4 py-2">{{ $groupTour->start_time }}</td>
                    <td class="border-y border-gray-700 px-4 py-2">{{ $groupTour->end_date }}</td>
                    <td class="border-y border-gray-700 px-4 py-2">
                        <button wire:click="editGroupTour({{ $groupTour->id }})" class="text-success-500 ml-2">
                            Bewerken
                        </button>
                        <button  class="text-danger-500 ml-2">
                            Verwijderen
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>



