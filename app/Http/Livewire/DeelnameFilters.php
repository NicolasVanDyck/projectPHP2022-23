<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
use App\Models\GroupTour;
use App\Models\Tour;
use App\Models\GPX;

class DeelnameFilters extends Component
{
    public $group = "%";
    public $day = "%";

    public $afstand;
    public $afstandMin, $afstandMax;

    public function mount()
    {
        $this->afstandMin = ceil(GPX::min('amount_of_km'));
        $this->afstandMax = ceil(GPX::max('amount_of_km'));
        $this->afstand = $this->afstandMax;

    }

    public function render()
    {
        $now = today();
        $groupdates = GroupTour::orderBy('start_date')
            ->where('start_date', '>=', $now)
            ->orWhere('group_id', 'like', $this->group)
            ->distinct()->pluck('start_date');
//        dd($groupdates);
        $this->day = $groupdates->first();
        $grouptours = GroupTour::orderBy('start_date')->has('group')
            ->where([['start_date', $this->day],['group_id','like',$this->group]])
            ->get();
        $groups = Group::orderBy('id')
            ->where('id', 'like', $this->group)
            ->orWhereHas('grouptours', function ($query) {
                $query->where('start_date', $this->day);})
            ->get();
        $gpxes = GPX::orderBy('id')->whereHas('tour', function ($query) {
            $query->where('amount_of_km', '<=', $this->afstand);})->get();
//        dd($gpxes);
        return view('livewire.deelname-filters', compact('groups','groupdates','grouptours','gpxes'));
    }

}
