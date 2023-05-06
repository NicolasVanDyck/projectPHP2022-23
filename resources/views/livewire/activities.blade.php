<div>
    {{--TODO bg-white veranderen naar bg-slate-100/20 ivm ledendashboard--}}
    {{--TODO verder uitbouwen naar een foldable model? Nu worden alleen de 5 recentste gettond (zie livewire component)--}}
    {{--TODO de table moet nog een beetje opgemaakt worden--}}

    {{--Dropdown to select a year and month--}}
    <div class="flex flex-row justify-between items-center ml-8 mt-4">
        <div class="flex flex-row">
            <div class="flex flex-col">
                <label for="year" class="text-base ml-2 mb-1">Jaar</label>
                <select wire:model.debounce.500ms="selectedYear" name="year" id="year" class="text-base rounded-xl mr-2">
                    @foreach($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label for="month" class="text-base ml-2 mb-1">Maand</label>
                <select wire:model.debounce.500ms="selectedMonth" name="month" id="month" class="text-base rounded-xl mr-2">
                    @foreach($months as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>



    <table class="m-8 p-8 shadow-xl rounded-lg bg-white text-gray-700">
            {{--Two column table with a name and description in the table header--}}
            <thead class="">
                <tr class="text-left">
                    <th class="text-base p-2">Activiteit</th>
                    <th class="text-base p-2">Beschrijving</th>
                    <th class="text-base p-2">Startdatum</th>
                    <th class="text-base p-2">Einddatum</th>
                </tr>
            </thead>
            <tbody>
                @forelse($activities as $activity)
                    <tr>
                        <td class="p-2">{{ $activity->name }}</td>
                        <td class="p-2">{{ $activity->description }}</td>
                        <td class="p-2">{{ date('Y-m-d', strtotime($activity->start_date)) }}</td>
                        <td class="p-2">{{ date('Y-m-d', strtotime($activity->end_date)) }}</td>
                    </tr>
                    {{--A very thin separation line--}}
                    <tr>
                        <td colspan="4" class="border-b border-gray-200"></td>
                    </tr>
                @empty
                    <tr>
                        <td class="p-2">No activities found</td>
                    </tr>
                @endforelse
{{--                {{ $activities->links() }}--}}
            </tbody>

    </table>
</div>
