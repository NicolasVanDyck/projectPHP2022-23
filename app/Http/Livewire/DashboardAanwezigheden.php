<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserTour;
use App\Models\Tour;
use App\Models\GPX;
use App\Models\GroupTour;

class DashboardAanwezigheden extends Component
{
    public function render()
    {
        $aanwezigheden = UserTour::orderBy('id')->has('user')->get();
        $starturen = GroupTour::orderBy('id')->get();
        $tours = Tour::orderBy('id')->get();
        $gpxes = GPX::orderBy('id')->has('tour')->get();
        return view('livewire.dashboard-aanwezigheden', compact('aanwezigheden', 'starturen','tours','gpxes'));
    }
}
