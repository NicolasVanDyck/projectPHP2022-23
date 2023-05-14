<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
use App\Models\GroupTour;
use App\Models\Tour;
use App\Models\Route;
use App\Models\BicycleType;

class Filter extends Component
{
    public $group = "%";
    public $bicycletype = "%";
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
        $bicycletypes = BicycleType::orderBy('bicycle_type')->get();
        $routes = Route::orderBy('id')->has('tours')->get();
        $grouptours = GroupTour::orderBy('id')
            ->where('start_date', 'like', $this->day)
            ->where('group_id','like',$this->group)
            ->get();
        $groups = Group::orderBy('name')->with('grouptours')->get();
        $tours = Tour::orderBy('id')->whereHas('route', function ($query) {
                $query->where('amount_of_km', '<=', $this->afstand);})->get();
        return view('livewire.filter', compact('groups','bicycletypes','grouptours', 'routes', 'tours'));
    }

}
