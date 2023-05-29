<div>
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
                            <button wire:click="confirmDeleteGroupTour({{ $groupTour->id }})" class="text-danger-500 ml-2">
                                Verwijderen
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Modal -->
    @if ($editGroupTour && $groupTour)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6">
                <button class="text-gray-500 hover:text-gray-700" wire:click="cancelEdit">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <h1 class="text-xl font-bold mb-4 text-center">Edit Group Tour</h1>
                <form wire:submit.prevent="updateGroupTour">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="group" class="block font-bold mb-1">Groep:</label>
                            <select wire:model="editGroupTour.group_id" class="border-gray-300 border rounded-md p-2 w-full">
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->group }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="route" class="block font-bold mb-1">Route:</label>
                            <select wire:model="editGroupTour.tour_id" class="border-gray-300 border rounded-md p-2 w-full">
                                @foreach($gpxs as $gpx)
                                    <option value="{{ $gpx->id }}">{{ $gpx->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="startDate" class="block font-bold mb-1">Start Datum:</label>
                            <input type="date" wire:model="editGroupTour.start_date" class="border-gray-300 border rounded-md p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="startTime" class="block font-bold mb-1">Start Tijd:</label>
                            <input type="time" wire:model="editGroupTour.start_time" class="border-gray-300 border rounded-md p-2 w-full">
                        </div>
                        <div class="mb-4">
                            <label for="endDate" class="block font-bold mb-1">Eind Datum:</label>
                            <input type="date" wire:model="editGroupTour.end_date" class="border-gray-300 border rounded-md p-2 w-full">
                        </div>
                    </div>

                    <div class="flex justify-center mt-4">
                        <button type="submit" class="btn btn-primary ml-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
@endif


    @if ($confirmingDelete)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6">
                <button class="text-gray-500 hover:text-gray-700" wire:click="cancelDelete">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <h1 class="text-xl font-bold mb-4 text-center">Verwijder Groepstour</h1>
                <p>Weet je zeker dat je deze groepstour wilt verwijderen?</p>
                <div class="flex justify-center mt-4">
                    <button wire:click="deleteGroupTour({{ $confirmingDelete }})" class="btn btn-danger ml-2">Ja</button>
                </div>
            </div>
        </div>
    @endif
</div>




