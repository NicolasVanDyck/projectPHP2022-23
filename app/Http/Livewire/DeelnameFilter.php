<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
use App\Models\GroupTour;
use App\Models\Tour;
use App\Models\GPX;

class DeelnameFilter extends Component
{
    public $group = "%";
    public $day = "%";
    public $defaultdate;

    public $afstand;
    public $afstandMin, $afstandMax;

    public function mount()
    {
        $this->day = $this->defaultdate;
        $this->afstandMin = ceil(GPX::min('amount_of_km'));
        $this->afstandMax = ceil(GPX::max('amount_of_km'));
        $this->afstand = $this->afstandMax;

    }

    public function render()
    {
        $now = today();
        $groupdates = GroupTour::where([['start_date', '>=', $now],['group_id', 'like', $this->group]])
//            ->has('group')
            ->orderBy('start_date')
            ->distinct()->pluck('start_date');
//            ->get();
//            dd($groupdates);
        $this->defaultdate = $groupdates->first();
        $grouptours = GroupTour::orderBy('start_date')->has('group')
            ->where([['start_date', $this->day],['group_id','like',$this->group]])
            ->get();
        $groups = Group::orderBy('id')->whereHas('grouptours', function ($query) {
            $query->where('start_date', $this->day);})->get();
        $tours = Tour::orderBy('id')->whereHas('route', function ($query) {
                $query->where('amount_of_km', '<=', $this->afstand);})->get();
        return view('livewire.deelnamefilter', compact('groups','groupdates','grouptours','tours'));
    }

}
