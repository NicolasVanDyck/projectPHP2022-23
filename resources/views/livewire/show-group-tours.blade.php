<div class="text-black">
    <!-- Paginering weergeven als $groupTours een instantie is van LengthAwarePaginator -->
    <div class="mt-4">
        @if ($groupTours)
            {{ $groupTours->links() }}
        @endif
    </div>

    <div class="p-6 lg:hidden">
        <h1 class="text-xl font-bold underline text-center pb-2 text-white">Groepsritten</h1>
        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <!-- Lus door $groupTours om elke groepsrit weer te geven -->
            @foreach($groupTours as $groupTour)
                <div class="bg-[#f3f3f3] rounded-md p-6">
                    <div class="mb-4">
                        <strong>Groep:</strong> {{ $groupTour->group->group }}
                    </div>
                    <div class="mb-4">
                        <strong>Route:</strong> {{ $groupTour->gpx->name }}
                    </div>
                    <div class="mb-4">
                        <strong>Afstand (km):</strong> {{ $groupTour->gpx->amount_of_km }}
                    </div>
                    <div class="mb-4">
                        <strong>Startdatum:</strong> {{ date('d-m-Y', strtotime($groupTour->start_date)) }}
                    </div>
                    <div class="mb-4">
                        <strong>Starttijd:</strong> {{ $groupTour->start_time }}
                    </div>
                    <div class="mb-4">
                        <strong>Einddatum:</strong> {{ date('d-m-Y', strtotime($groupTour->end_date)) }}
                    </div>
                    <div class="flex justify-center">
                        <x-heroicon-m-pencil wire:click="editGroupTour({{ $groupTour->id }})" class="w-10 h-10 hover:fill-blue-500 ml-2">
                            Bewerken
                        </x-heroicon-m-pencil>
                        <x-heroicon-m-trash wire:click="confirmDeleteGroupTour({{ $groupTour->id }})" class="w-10 h-10 hover:fill-danger-500 ml-2">
                            Verwijderen
                        </x-heroicon-m-trash>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="hidden lg:block">
        <div class="p-6 text-white">
            <h1 class="text-xl font-bold underline text-white text-center">Groepsritten</h1>
            <div class="table-responsive">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Groep</th>
                        <th class="px-4 py-2">Route</th>
                        <th class="px-4 py-2">Afstand (km)</th>
                        <th class="px-4 py-2">Startdatum</th>
                        <th class="px-4 py-2">Starttijd</th>
                        <th class="px-4 py-2">Einddatum</th>
                        <th class="px-4 py-2">Bewerken/Verwijderen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Lus door $groupTours om elke groepsrit weer te geven -->
                    @foreach($groupTours as $groupTour)
                        <tr class="text-center">
                            <td class="border-y border-white py-2">{{ $groupTour->group->group }}</td>
                            <td class="border-y border-white py-2">{{ $groupTour->gpx->name }}</td>
                            <td class="border-y border-white py-2">{{ $groupTour->gpx->amount_of_km }}</td>
                            <td class="border-y border-white py-2">{{ date('d-m-Y', strtotime($groupTour->start_date)) }}</td>
                            <td class="border-y border-white py-2">{{ $groupTour->start_time }}</td>
                            <td class="border-y border-white py-2">{{ date('d-m-Y', strtotime($groupTour->end_date)) }}</td>
                            <td class="border-y border-white py-2">
                                <div class="flex justify-center space-x-2">
                                    <x-heroicon-m-pencil wire:click="editGroupTour({{ $groupTour->id }})" class="w-5 h-5 hover:fill-blue-500 ml-2">
                                        Bewerken
                                    </x-heroicon-m-pencil>
                                    <x-heroicon-m-trash wire:click="confirmDeleteGroupTour({{ $groupTour->id }})" class="w-5 h-5 hover:fill-red-500 ml-2">
                                        Verwijderen
                                    </x-heroicon-m-trash>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Modal voor bewerken -->
    @if ($editGroupTour && $groupTour)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6">
                <button class="text-gray-500 hover:text-gray-700" wire:click="cancelEdit">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <h1 class="text-xl font-bold mb-1 text-center">Wijzigen groepsrit</h1>
                <p class="pb-3 text-center">Hier kunt u de gegevens van de groepsrit nog veranderen</p>
                <form wire:submit.prevent="updateGroupTour">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="group" class="block font-bold mb-1">Groep:</label>
                            <select wire:model="editGroupTour.group_id"
                                    class="border-gray-300 border rounded-md p-2 w-full">
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->group }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="route" class="block font-bold mb-1">Route:</label>
                            <select wire:model="editGroupTour.tour_id"
                                    class="border-gray-300 border rounded-md p-2 w-full">
                                @foreach($gpxs as $gpx)
                                    <option value="{{ $gpx->id }}">{{ $gpx->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="startDate" class="block font-bold mb-1">Startdatum:</label>
                            <input type="date" wire:model="editGroupTour.start_date"
                                   class="border-gray-300 border rounded-md p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="startTime" class="block font-bold mb-1">Starttijd:</label>
                            <input type="time" wire:model="editGroupTour.start_time" step="60"
                                   class="border-gray-300 border rounded-md p-2 w-full">

                        </div>
                        <div class="mb-4">
                            <label for="endDate" class="block font-bold mb-1">Eind datum:</label>
                            <input type="date" wire:model="editGroupTour.end_date"
                                   class="border-gray-300 border rounded-md p-2 w-full">
                        </div>
                    </div>

                    <div class="flex justify-center mt-4">
                        <x-button type="submit" class="ml-2">Bijwerken</x-button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- Bevestigingsmodal voor verwijderen -->
    @if ($confirmingDelete)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6">
                <button class="text-gray-500 hover:text-gray-700" wire:click="cancelDelete">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <h1 class="text-xl font-bold mb-4 text-center">Verwijder Groepsrit</h1>
                <p>Weet je zeker dat je deze groepsrit wilt verwijderen?</p>
                <div class="flex justify-center mt-4">
                    <x-button wire:click="deleteGroupTour({{ $confirmingDelete }})" class="btn btn-danger ml-2">Ja</x-button>
                </div>
            </div>
        </div>
    @endif
</div>
