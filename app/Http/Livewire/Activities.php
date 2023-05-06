<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use Livewire\Component;
use Livewire\WithPagination;

class Activities extends Component
{

    use WithPagination;

    public $perPage = 5;
    public $selectedYear;
    public $selectedMonth;

    public function mount()
    {
        $currentDate = now();
        $this->selectedYear = $currentDate->year;
        $this->selectedMonth = $currentDate->month;
    }


    public function render()
    {
        $query = Activity::whereYear('start_date', $this->selectedYear)
            ->whereMonth('start_date', $this->selectedMonth)
            ->orderBy('start_date', 'desc')
            ->get();

        $selectedActivities = Activity::where('start_date', '>=', $this->selectedYear.'-'.$this->selectedMonth.'-01')
            ->where('start_date', '<=', $this->selectedYear.'-'.$this->selectedMonth.'-31')
            ->orderBy('start_date', 'desc')
            ->get();

        $years = Activity::selectRaw('YEAR(start_date) as year')->distinct()->pluck('year');
        // All months in the year
        $months = collect([1,2,3,4,5,6,7,8,9,10,11,12]);

        return view('livewire.activities', [
            'activities' => $selectedActivities,
            'years' => $years->sortDesc(),
            'months' => $months,
        ])->layout('layouts.templatelayout');
    }
}
