<?php

namespace App\Http\Livewire;

use CodeToad\Strava\Strava;
use Livewire\Component;

class Statistiek extends Component
{

    public function stravaAuth()
    {
        return Strava::authenticate();
    }
    public function render()
    {
        return view('livewire.statistiek');
    }
}
