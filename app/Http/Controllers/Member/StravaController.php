<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
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
    public function test(){
        //get the user
        $user = User::find(auth()->user()->id);

        $years = ['Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0, 'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0];


        // Check if current token has expired
        if(strtotime(Carbon::now()) > $user->expires_at)
        {
            // Token has expired, generate new tokens using the currently stored user refresh token
            $refresh = Strava::refreshToken($user->refresh_token);

            // Update the users tokens
            User::where('id', auth()->user()->id)->update([
                'access_token' => $refresh->access_token,
                'refresh_token' => $refresh->refresh_token
            ]);

            // Call Strava Athlete Method with newly updated access token.
            $athleteID = Strava::athlete($user->access_token)->id;
            $athleteStats = Strava::athleteStats($user->access_token, $athleteID);
            $activities = Strava::activities($user->access_token);
            $routes = Strava::athleteRoutes($user->access_token, $athleteID);
            $usedAPI = Strava::getApiLimits($user->access_token);
            foreach ($activities as $activity){
                Carbon::parse($activity->start_date)->format('M');
                $years[Carbon::parse($activity->start_date)->format('M')] += $activity->distance;
            }
//            dd($activities);
            $distance = $athleteStats->all_ride_totals->distance;
            $ammount = $athleteStats->all_ride_totals->count;
            $elevation = $athleteStats->all_ride_totals->elevation_gain;

            // Return $athlete array to view
            return view('member.dashboard')->with(compact(['distance','ammount','elevation','years']));

        }else{

            // Token has not yet expired, Call Strava Athlete Method
            $athleteID = Strava::athlete($user->access_token)->id;
            $athleteStats = Strava::athleteStats($user->access_token, $athleteID);
            $activities = Strava::activities($user->access_token);
            $routes = Strava::athleteRoutes($user->access_token, $athleteID);
            $usedAPI = Strava::getApiLimits($user->access_token);
            foreach ($activities as $activity){
                Carbon::parse($activity->start_date)->format('M');
                $years[Carbon::parse($activity->start_date)->format('M')] += round($activity->distance);
            }
//            dd(implode(",",array_values($years)));
            $distance = $athleteStats->all_ride_totals->distance;
            $ammount = $athleteStats->all_ride_totals->count;
            $elevation = $athleteStats->all_ride_totals->elevation_gain;

            // Return $athlete array to view
            return view('member.dashboard')->with(compact(['distance','ammount','elevation','years']));

        }

//        $token = $user->access_token;
//        $athleteID = Strava::athlete($token)->id;
//        $athleteStats = Strava::athleteStats($token, $athleteID);
//        $activities = Strava::activities($token);
//        $routes = Strava::athleteRoutes($token, $athleteID);
//        $usedAPI = Strava::getApiLimits($token);
//        dd($activities);
//        $distance = $athleteStats->all_ride_totals->distance;
//        $ammount = $athleteStats->all_ride_totals->count;
//        $elevation = $athleteStats->all_ride_totals->elevation_gain;
//        return view('member.dashboard',
//            ['distance' => $distance,
//                'ammount' => $ammount,
//                'elevation' => $elevation]
//        );
    }

}
