<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
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

        $user = User::find(auth()->user()->id);
        $user->access_token = $token->access_token;
        $user->refresh_token = $token->refresh_token;
        $user->expires_at = $token->expires_at;
        $user->save();


    }
    public function render()
    {
        return view('livewire.statistiek');
    }
}
