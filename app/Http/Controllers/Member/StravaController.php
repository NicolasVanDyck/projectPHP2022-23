<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Strava;

class StravaController extends Controller
{


    public function stravaAuthentication($scope = 'read_all,profile:read_all,activity:read_all')
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

    public function getUserData(){
        if (auth()->user()->access_token) {


            //get the user
            $user = User::find(auth()->user()->id);
            $years = ['Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0, 'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0];
            // Check if current token has expired
            if (strtotime(Carbon::now()) > $user->expires_at) {
                // Token has expired, generate new tokens using the currently stored user refresh token
                $refresh = Strava::refreshToken($user->refresh_token);
                // Update the users tokens
                User::where('id', auth()->user()->id)->update([
                    'access_token' => $refresh->access_token,
                    'refresh_token' => $refresh->refresh_token
                ]);
//                foreach ($this->getActivities($user->access_token) as $activity) {
//                    Carbon::parse($activity->start_date)->format('M');
//                    $years[Carbon::parse($activity->start_date)->format('M')] += $activity->distance;
//                }
//            } else {
//                foreach ($this->getActivities($user->access_token) as $activity) {
//                    Carbon::parse($activity->start_date)->format('M');
//                    $years[Carbon::parse($activity->start_date)->format('M')] += round($activity->distance);
//                }
            }
            foreach ($this->getActivities($user->access_token) as $activity) {
                    Carbon::parse($activity->start_date)->format('M');
                    $years[Carbon::parse($activity->start_date)->format('M')] += round($activity->distance);
                }
            $distance = $this->getAthleteStats($user->access_token, $this->getAthleteID($user->access_token))->all_ride_totals->distance;
            $amount = $this->getAthleteStats($user->access_token, $this->getAthleteID($user->access_token))->all_ride_totals->count;
            $elevation = $this->getAthleteStats($user->access_token, $this->getAthleteID($user->access_token))->all_ride_totals->elevation_gain;
            $activities = $this->getActivities($user->access_token);
            return view('member.dashboard')->with(compact(['distance', 'amount', 'elevation', 'years', 'activities']));
        } else {
            return view('member.dashboard');
        }
    }

    public function getActivities($access_token)
    {
        $activities = Strava::activities($access_token);
        return $activities;
    }

    public function getAthleteStats($access_token, $athleteID)
    {
        $athleteStats = Strava::athleteStats($access_token, $athleteID);
        return $athleteStats;
    }

    public function getAthleteID($access_token)
    {
        $athleteID = Strava::athlete($access_token)->id;
        return $athleteID;
    }
}
