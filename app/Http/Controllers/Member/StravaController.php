<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Strava;

class StravaController extends Controller
{

    public function stravaAuth($scope = 'read_all,profile:read_all,activity:read_all')
    {
        return Strava::authenticate($scope);
    }
    public function getToken(Request $request)
    {
        $token = Strava::token($request->code);

        $user = User::find(auth()->user()->id);
        $user->access_token = $token->access_token;
        $user->refresh_token = $token->refresh_token;
        $user->expires_at = $token->expires_at;
        $user->save();

        return redirect()->route('dashboard');

    }

}
