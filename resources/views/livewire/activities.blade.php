<div>
    {{--TODO bg-white veranderen naar bg-slate-100/20 ivm ledendashboard--}}
    {{--TODO verder uitbouwen naar een foldable model? Nu worden alleen de 5 recentste gettond (zie livewire component)--}}
    {{--TODO de table moet nog een beetje opgemaakt worden--}}
    <table class="m-8 p-8 shadow-xl rounded-lg bg-white text-gray-700">
            {{--Two column table with a name and description in the table header--}}
            <thead class="">
                <tr class="text-left">
                    <th class="text-base p-2">name</th>
                    <th class="text-base p-2">description</th>
                    <th class="text-base p-2">start date</th>
                    <th class="text-base p-2">end date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td class="p-2">{{ $activity->name }}</td>
                        <td class="p-2">{{ $activity->description }}</td>
                        <td class="p-2">{{ date('Y-m-d', strtotime($activity->start_date)) }}</td>
                        <td class="p-2">{{ date('Y-m-d', strtotime($activity->end_date)) }}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</div>
