<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserTour;
use App\Models\Group;
use App\Models\GroupTour;

class DashboardAanwezigheden extends Component
{
    public function render()
    {
        $starturen = GroupTour::orderBy('start_date')->get();
        $aanwezigheden = UserTour::orderBy('id')->has('user')->get();
        return view('livewire.dashboard-aanwezigheden', compact('aanwezigheden', 'starturen'));
    }
}
