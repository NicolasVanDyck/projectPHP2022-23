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
        $aanwezigheden = UserTour::orderBy('id')->has('user')->get();
        $starturen = GroupTour::orderBy('start_date')->get();
        return view('livewire.dashboard-aanwezigheden', compact('aanwezigheden', 'starturen'));
    }
}
