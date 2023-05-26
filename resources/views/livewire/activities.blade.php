<div x-data="{ isOpen: false, modalTitle: '', modalDescription: '' }" class="py-4">
{{--     TODO: bg-white veranderen naar bg-slate-100/20 ivm ledendashboard --}}
{{--     TODO: verder uitbouwen naar een foldable model? Nu worden alleen de 5 recentste getoond (zie livewire component) --}}
{{--     TODO: de table moet nog een beetje opgemaakt worden --}}

    {{-- Dropdown to select a year and month --}}

        <div class="mt-4 mb-4 flex flex-col md:flex-row justify-between">
            <div class="flex flex-col mb-4 md:mb-0  ">
                <label for="year" class="text-base mb-1">Jaar</label>
                <select wire:model.debounce.500ms="selectedYear" name="year" id="year"
                        class="text-base w-25 rounded-xl pl-2 ">
                    @foreach($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col">
                <label for="month" class="text-base mb-1">Maand</label>
                <select wire:model.debounce.500ms="selectedMonth" name="month" id="month"
                        class="text-base w-25 rounded-xl pl-6">
                    @foreach($months as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    {{-- Table with activities --}}

    <div>
        <table class="table-fixed shadow-xl rounded-lg bg-white text-gray-700">
            {{-- Two column table with a name and description in the table header --}}
            <thead>
            <tr class="text-left w-screen">
                <th class="text-base p-2 w-1/6">Activiteit</th>
                <th class="text-base p-2 hidden md:table-cell w-3/6">Beschrijving</th>
                <th class="text-base p-2 w-1/6">Startdatum</th>
                <th class="text-base p-2 w-1/6">Starttijd</th>
                <th class="text-base p-2 hidden md:table-cell w-1/6">Einddatum</th>
            </tr>
            </thead>
            <tbody>
            @forelse($activities as $activity)
                <tr class="p-2 @if($loop->even) even:bg-gray-100 @else odd:bg-gray-200 @endif" x-on:click="isOpen = true; modalTitle = '{{ $activity->name }}'; modalDescription = '{{ $activity->description }}'">
                    <td class="p-2">{{ $activity->name }}</td>
                    <td class="p-2 hidden md:table-cell">{{ $activity->description }}</td>
                    <td class="p-2">{{ date('d-m-Y', strtotime($activity->start_date)) }}</td>
                    <td class="p-2">{{ date('H:i', strtotime($activity->start_date)) }}</td>
                    <td class="p-2 hidden md:table-cell">{{ date('d-m-Y', strtotime($activity->end_date)) }}</td>
                </tr>
            @empty
                <tr>
                    <td class="p-2">Geen activiteiten gevonden</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" id="modal" class="fixed inset-0 z-10 bg-gray-900 bg-opacity-50 flex items-center justify-center px-4">
            <div class="bg-white rounded-lg p-6">
                <div class="flex justify-end">
                    <button class="text-gray-500 hover:text-gray-700" x-on:click="isOpen = false">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <h1 class="text-xl font-bold mb-4 text-center" id="modal-title" x-text="modalTitle"></h1>
                <p class="leading-relaxed" id="modal-description" x-text="modalDescription"></p>
            </div>
        </div>
    </div>
</div>
