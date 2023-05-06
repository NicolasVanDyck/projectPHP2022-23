<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use Livewire\Component;

class Activities extends Component
{

    public function render()
    {
        $mostRecentFiveActivities = Activity::latest()->take(5)->get();

        return view('livewire.activities', [
            'activities' => $mostRecentFiveActivities,
        ]);
    }
}
