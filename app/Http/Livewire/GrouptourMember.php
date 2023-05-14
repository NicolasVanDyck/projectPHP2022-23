<?php

namespace App\Http\Livewire;

use App\Models\GroupTour;
use Livewire\Component;

class GrouptourMember extends Component
{
    public function render()
    {
        $groupTours = GroupTour::select('id', 'group_id', 'tour_id', 'start_date','end_date')->get();
        return view('livewire.grouptour-member', compact('groupTours'));
    }

}
