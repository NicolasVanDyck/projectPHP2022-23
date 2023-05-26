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
//    public $day = "%";
    public $defaultdate;

    public $afstand;
    public $afstandMin, $afstandMax;

    public function mount()
    {
        $this->day = today();
        $this->afstandMin = ceil(GPX::min('amount_of_km'));
        $this->afstandMax = ceil(GPX::max('amount_of_km'));
        $this->afstand = $this->afstandMax;

    }

    public function render()
    {
        $now = today();
        $groupdates = GroupTour::orderBy('start_date')
            ->where([['start_date', '>=', $now],['group_id', 'like', $this->group]])
            ->distinct()->pluck('start_date');
//        $this->defaultdate = $groupdates->first();
        $grouptours = GroupTour::orderBy('start_date')->has('group')
            ->where('group_id', 'like', $this->group)
            ->orWhereDate('start_date', $this->day)
            ->get();
        $groups = Group::orderBy('id')
//            ->where('id', 'like', $this->group)
            ->whereHas('grouptours')
            ->get();
        $gpxes = GPX::orderBy('id')->whereHas('tour', function ($query) {
            $query->where('amount_of_km', '<=', $this->afstand);})->get();
//        dd($gpxes);
        return view('livewire.deelname-filters', compact('groups','groupdates','grouptours','gpxes'));
    }

//    public function render()
//    {
//        $now = today();
//        $groupdates = GroupTour::orderBy('start_date')
//            ->where('start_date', '>=', $now)
////            ->orWhere('group_id', 'like', $this->group)
//            ->distinct()->pluck('start_date');
//        $this->defaultdate = $groupdates->first();
//        $startgrouptours = GroupTour::orderBy('start_date')->has('group')->get();
//        $grouptours = GroupTour::orderBy('start_date')->has('group')
//            ->where('start_date', $this->day)
//            ->orWhere('group_id', 'like', $this->group)
//            ->get();
//        $groups = Group::orderBy('id')
//            ->where('id', 'like', $this->group)
////            ->whereHas('grouptours', function ($query) {
////                $query->where('start_date', $this->day);})
//            ->get();
//        $gpxes = GPX::orderBy('id')->whereHas('tour', function ($query) {
//            $query->where('amount_of_km', '<=', $this->afstand);})->get();
////        dd($gpxes);
//        return view('livewire.deelname-filters', compact('groups','groupdates','grouptours','gpxes', 'startgrouptours'));
//    }

}
