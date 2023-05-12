<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Strava;

class Statistiek extends Component
{

    public function stravaAuth()
    {
        return Strava::authenticate();
    }
    public function getToken(Request $request)
    {
        $token = Strava::token($request->code);

        $user->
    }
    public function render()
    {
        return view('livewire.statistiek');
    }
}
