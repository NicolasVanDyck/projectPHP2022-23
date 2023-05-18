<div class="flex flex-wrap">
    @foreach($groupTours as $groupTour)
        <div class="p-4 md:w-1/2 lg:w-1/3">
            <x-wd_components.groupcard :groupTour="$groupTour">
                <x-slot name="card_route_name">
                    {{ $groupTour->gpx->name }}
                </x-slot>
                <x-slot name="card_Startdate">
                    {{ $groupTour->start_date }}
                </x-slot>
                <x-slot name="card_Enddate">
                    {{ $groupTour->end_date }}
                </x-slot>
                <x-slot name="card_distance">
                    {{ $groupTour->gpx->amount_of_km }}
                </x-slot>
                <div class="mt-4">
                    <button class="inline-block w-full font-bold rounded bg-info px-6 text-center pb-2 pt-2.5 text-lg uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" wire:click="joinTour({{ $groupTour->id }})">Join Tour</button>
                </div>
            </x-wd_components.groupcard>
        </div>
    @endforeach
</div>
<!-- Display user tours in a table -->
<!-- Display user tours in a table -->
<div>
    <div>
        <h2>User Tours</h2>
{{--        <div>--}}
{{--            <h2>User Tours</h2>--}}

{{--                <table>--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>User ID</th>--}}
{{--                        <th>Group Tour ID</th>--}}
{{--                        <th>Tour ID</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach ($userTours as $userTour)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $userTour->user_id }}</td>--}}
{{--                            <td>{{ $userTour->group_tour_id }}</td>--}}
{{--                            <td>{{ $userTour->tour_id }}</td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--        </div>--}}

        <div>
            <h1>Debugging Variable</h1>
            <pre>{{ dump($userTours) }}</pre>
        </div>





    </div>

