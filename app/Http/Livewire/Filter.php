<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
use App\Models\GroupTour;
use App\Models\Tour;
use App\Models\Route;

class Filter extends Component
{
    public $group = "%";
    public $day = "%";

    public $afstand;
    public $afstandMin, $afstandMax;

    public function mount()
    {
        $this->afstandMin = ceil(Route::min('amount_of_km'));
        $this->afstandMax = ceil(Route::max('amount_of_km'));
        $this->afstand = $this->afstandMax;
    }

    public function render()
    {
        $routes = Route::orderBy('id')->has('tours')->get();
        $grouptours = GroupTour::orderBy('id')
            ->where('start_date', '=', $this->day)
            ->where('group_id','like',$this->group)
            ->get();
        $groups = Group::orderBy('name')->with('grouptours')->get();
        $tours = Tour::orderBy('id')->whereHas('route', function ($query) {
                $query->where('amount_of_km', '<=', $this->afstand);})->get();
        return view('livewire.filter', compact('groups','grouptours', 'routes', 'tours'));
    }

}
