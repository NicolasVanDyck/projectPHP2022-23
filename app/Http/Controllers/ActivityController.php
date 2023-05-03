<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Show all activities from the database:
//        return Activity::all();
        $activities = Activity::all();

        return view('activities.index', ['activities' => $activities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Insert an activity from the view into the database:
        $activity = new Activity();
        $activity->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        // Validate the request...
        $validated = $request->validated();

        // Store the activity in the database...
        $activity = new Activity();
        $activity->name = $validated['name'];
        $activity->description = $validated['description'];
        $activity->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        // Show the activity from the database:

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
