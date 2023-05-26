<div>

{{--TODO: Selecter voor een startdatum en einddatum en voor een starttijd.--}}






    <div x-data="{ isOpen: false, isNestedModalOpen: false, selectedGroup: '', selectedRoute: null, selectedRouteKm: null, selectedDate: null }">
        <x-button @click="isOpen = true" class="bg-danger">Maak je groepsrit</x-button>

        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 bg-gray-900 bg-opacity-50 flex items-center justify-center px-4">
            <div class="bg-white rounded-lg p-6">
                <div class="flex justify-end">
                    <button class="text-gray-500 hover:text-gray-700" @click="isOpen = false">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <h1 class="text-xl font-bold mb-4 text-center" id="modal-title">Maak een groepsrit</h1>
                <p>Hier maak je een groeprit aan. Dit doe je doormiddel van het kiezen van een groep en een route.</p>
                <select class="form-control" x-model="selectedGroup">
                    <option value="">-- Select Group --</option>
                    @foreach($groups as $group)
                        <option value="{{ $group }}">{{ $group }}</option>
                    @endforeach
                </select>

                <button @click="isNestedModalOpen = true" class="btn bg-info mt-4" x-show="selectedGroup" :disabled="!selectedGroup">Kies een route</button>
                <p class="mt-2" x-show="selectedRoute">Geselecteerde route: <span x-text="selectedRoute"></span></p>
                <p class="mt-2" x-show="selectedRouteKm">Afstand: <span x-text="selectedRouteKm"></span> km</p>

                <template x-if="selectedRoute">
                    <div class="mt-4">
                        <label for="start-datepicker" class="block font-medium text-gray-700">Start datum en tijd:</label>
                        <input type="datetime-local" id="start-datepicker" x-model="selectedDate" class="form-control mt-1" :disabled="!selectedRoute">
                    </div>
                    <div class="mt-4">
                        <label for="end-datepicker" class="block font-medium text-gray-700">Eind datum en tijd:</label>
                        <input type="datetime-local" id="end-datepicker" x-model="selectedEndDate" class="form-control mt-1" :disabled="!selectedRoute">
                    </div>
                </template>

            </div>
        </div>

        <div x-show="isNestedModalOpen && selectedGroup" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 bg-gray-900 bg-opacity-50 flex items-center justify-center px-4">
            <div class="bg-white rounded-lg p-6">
                <div class="flex justify-end">
                    <button class="text-gray-500 hover:text-gray-700" @click="isNestedModalOpen = false">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <h1 class="text-xl font-bold mb-4 text-center" id="nested-modal-title">Selecteer hier de route</h1>
                <p class="leading-relaxed" id="nested-modal-description">Hier vindt je alle routes die voor de wezeldrivers beschikbaar zijn</p>

                <div class="grid grid-cols-3 gap-4 mt-4">
                    @foreach($routes as $route)
                        <div class="bg-gray-100 p-4 rounded-lg" x-bind:class="{ 'bg-blue-200': selectedRoute === '{{ $route->name }}' }" x-on:click="selectedRoute = '{{ $route->name }}'; selectedRouteKm = '{{ $route->amount_of_km }}'">
                            <h2 class="text-lg font-bold">{{ $route->name }}</h2>
                            <p>{{ $route->amount_of_km }} km</p>
                        </div>
                    @endforeach
                </div>

                <button @click="isNestedModalOpen = false" class="btn btn-primary mt-4" :disabled="!selectedRoute">Selecteer</button>
            </div>
        </div>
    </div>










</div>



