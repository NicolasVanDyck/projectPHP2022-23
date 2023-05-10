<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserTour;

class DashboardAanwezigheden extends Component
{
    public function render()
    {
        $aanwezigheden = UserTour::all();
        return view('livewire.dashboard-aanwezigheden', compact('aanwezigheden'));
    }
}
