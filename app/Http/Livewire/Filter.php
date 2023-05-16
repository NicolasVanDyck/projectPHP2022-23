<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
use App\Models\GroupTour;
use App\Models\Tour;
use App\Models\Route;
use DB;

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
        $now = today();
        $routes = Route::orderBy('id')->has('tours')->get();
        $groupdates = GroupTour::orderBy('start_date')->has('group')
            ->where([['start_date', '>=', $now],['group_id', 'like', $this->group]])
            ->get();
        $grouptours = GroupTour::orderBy('start_date')->has('group')
            ->where([['id', 'like', $this->day],['group_id','like',$this->group]])
            ->get();
        $groups = Group::orderBy('name')->has('grouptours')
            ->where('id','like', $this->day)
            ->get();
        $tours = Tour::orderBy('id')->whereHas('route', function ($query) {
                $query->where('amount_of_km', '<=', $this->afstand);})->get();
        return view('livewire.filter', compact('groups','groupdates','grouptours', 'routes', 'tours'));
    }

}
