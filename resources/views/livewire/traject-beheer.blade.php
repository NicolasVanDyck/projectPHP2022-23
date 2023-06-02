<div>
    <div>
        <div>
            <!-- Knop om het modal te openen -->
            <x-button wire:click="openModal" class="bg-danger w-full">Maak je groepsrit</x-button>
        </div>

        <div>
            <div x-data="{ isNestedModalOpen: @entangle('isNestedModalOpen'), openModal: @entangle('openModal'), selectedRoute: @entangle('selectedRoute'), selectedRouteName: @entangle('selectedRouteName'), selectedRouteKm: @entangle('selectedRouteKm'), selectedDate: @entangle('selectedDate'), selectedEndDate: @entangle('selectedEndDate') }"
                 x-cloak>
                <div x-show="isNestedModalOpen" class="fixed inset-0 z-10 bg-gray-900 bg-opacity-50 flex items-center justify-center px-4">
                    <div class="bg-white rounded-lg p-6">
                        <div class="flex justify-end">
                            <!-- Knop om het geneste modal te sluiten -->
                            <button class="text-gray-500 hover:text-gray-700" wire:click="closeNestedModal">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <h1 class="text-xl font-bold mb-4 text-center" id="nested-modal-title">Selecteer hier de route</h1>
                        <p class="leading-relaxed" id="nested-modal-description">Hier vind je alle routes die voor de Wezeldrivers beschikbaar zijn</p>

                        <div class="grid grid-cols-3 gap-4 mt-4">
                            <!-- Itereer over de routes en toon ze in een grid -->
                            @foreach($routes as $route)
                                <div class="bg-gray-100 p-4 rounded-lg cursor-pointer hover:bg-info-200"
                                     x-bind:class="{ 'bg-blue-200': {{ $route->id }} === selectedRoute }"
                                     x-on:click="$wire.selectRoute({{ $route->id }}, '{{ $route->amount_of_km }}')">
                                    <h2 class="text-lg font-bold">{{ $route->name }}</h2>
                                    <p>{{ $route->amount_of_km }} km</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div x-show="openModal" class="fixed inset-0 z-10 bg-gray-900 bg-opacity-50 z-[1] flex items-center justify-center px-4">
                    <div class="bg-white rounded-lg p-6">
                        <div class="flex justify-end">
                            <!-- Knop om het geneste modal te sluiten -->
                            <button class="text-gray-500 hover:text-gray-700" wire:click="closeModal">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <h1 class="text-xl font-bold mb-4 text-center" id="modal-title">Maak een groepsrit</h1>
                        <p>Hier maak je een groeprit aan. Dit doe je door middel van het kiezen van een groep en een route.</p>
                        <!-- Dropdown voor het selecteren van de groep -->
                        <select wire:model="selectedGroup" class="form-control mt-4">
                            <option value="">Kies de groep</option>
                            @foreach($groups as $groupId => $group)
                                <option value="{{ $groupId }}">{{ $group }}</option>
                            @endforeach
                        </select>

                        @error('selectedGroup')
                        <div class="text-red-500 mt-2">{{ @$message }}</div>@enderror

                        <div x-show="selectedGroup" class="mt-4">
                            @if ($selectedGroup)
                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 border border-blue-700 rounded-md transition-colors duration-300 ease-in-out" x-on:click="isNestedModalOpen = true"
                                        :disabled="!selectedGroup">Kies een route
                                </button>
                                <p class="mt-2" x-show="selectedRoute">Geselecteerde route:
                                    <span>{{ $selectedRouteName }}</span>
                                </p>
                                <p class="mt-2" x-show="selectedRouteKm">Afstand:
                                    <span>{{ $selectedRouteKm }}</span> km
                                </p>
                            @endif
                        </div>

                        @if($selectedRoute)
                            <!-- Invoerveld voor het selecteren van de startdatum en -tijd -->
                            <div class="mt-4">
                                <label for="start-datepicker" class="block font-medium text-gray-700">Start datum en tijd:</label>
                                <input type="datetime-local" id="start-datepicker" wire:model="selectedDate" class="form-control mt-1">
                                @error('selectedDate')
                                <div class="text-red-500 mt-2">{{ @$message }}</div>@enderror
                            </div>
                            <!-- Invoerveld voor het selecteren van de einddatum en -tijd -->
                            <div class="mt-4">
                                <label for="end-datepicker" class="block font-medium text-gray-700">Eind datum en tijd:</label>
                                <input type="datetime-local" id="end-datepicker" wire:model="selectedEndDate" class="form-control mt-1">
                                @error('selectedEndDate')
                                <div class="text-red-500 mt-2">{{ @$message }}</div>@enderror
                            </div>
                        @endif
                        <!-- Knop om de groepsrit aan te maken /pas actief als alle selected heeft -->
                        <button class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 border border-blue-700 rounded-md transition-colors duration-300 ease-in-out" wire:click="createGroepsrit"
                                :disabled="!selectedGroup || !selectedRoute || !selectedDate || !selectedEndDate">Maak je groepsrit
                        </button>


                    </div>
                </div>
                @if (session()->has('success_message'))
                    <div class="bg-green-500 text-white py-2 px-4 text-center rounded-lg mt-4">
                        {{ session('success_message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
