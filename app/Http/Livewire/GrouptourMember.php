<?php

namespace App\Http\Livewire;

use App\Models\GroupTour;
use App\Models\Group;

use Livewire\Component;

class GrouptourMember extends Component
{
    public function render()
    {
        $groupTours = GroupTour::select('group_tours.id', 'group_tours.group_id', 'group_tours.tour_id', 'group_tours.start_date', 'group_tours.end_date', 'groups.name', 'routes.id as route_id', 'routes.name as route_name', 'routes.amount_of_km')
            ->join('groups', 'group_tours.group_id', '=', 'groups.id')
            ->join('tours', 'group_tours.tour_id', '=', 'tours.id')
            ->join('routes', 'tours.route_id', '=', 'routes.id')
            ->get();

        return view('livewire.grouptour-member', compact('groupTours'));
    }


}
