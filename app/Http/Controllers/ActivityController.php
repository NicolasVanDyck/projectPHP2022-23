<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends Controller
{
    public function showAllActivities()
    {
        $activities = Activity::all();

        return view('home', [
            'activities' => $activities
        ])->with('name, description');
    }
}
