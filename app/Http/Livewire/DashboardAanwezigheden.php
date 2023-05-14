<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserTour;
use App\Models\Tour;
use App\Models\Route;

class DashboardAanwezigheden extends Component
{
    public function render()
    {
//        Is extra code nodig of is UserTour::all() genoeg? Werkt zo ook, maar wat is het nu van de extra's dan?
        $aanwezigheden = UserTour::orderBy('id')->has('user')->get();
        $tours = Tour::orderBy('id')->has('route')->get();
        $routes = Route::orderBy('id')->has('tours')->get();
        return view('livewire.dashboard-aanwezigheden', compact('aanwezigheden', 'tours','routes'));
    }
}
