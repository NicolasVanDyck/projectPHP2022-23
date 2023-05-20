<?php

namespace App\Http\Livewire;

use App\Models\GroupTour;
use App\Models\Group;
use App\Models\Gpx;
use App\Models\Tour;
use App\Models\UserTour;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GrouptourMember extends Component
{
    public $selectedTourId;

    public function leaveTour($userTourId)
    {
        // Find the user tour record by ID
        $userTour = UserTour::find($userTourId);

        // Check if the user tour record exists
        if ($userTour) {
            // Delete the user tour record
            $userTour->delete();

            // Show a success message
            session()->flash('message', 'You have left the tour.');
        }
    }

    public function render()
    {
        $userTours = $this->getUserTours();
        $groupTours = $this->getGroupTours();

        return view('livewire.grouptour-member', compact('userTours', 'groupTours'));
    }

    private function getUserTours()
    {
        // Get the logged-in user ID
        $userId = Auth::id();

        // Retrieve the user's registered tours
        return UserTour::with('groupTour.gpx')
            ->where('user_id', $userId)
            ->get();
    }

    private function getGroupTours()
    {
        // Retrieve the available group tours
        return GroupTour::with('gpx')
            ->whereDoesntHave('userTours', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->orderBy('start_date')
            ->get();
    }


    public function joinTour($tourId)
    {
        // Get the logged-in user ID
        $userId = Auth::id();

        // Retrieve the group tour based on the provided tour ID
        $groupTour = GroupTour::where('tour_id', $tourId)->first();

        if ($groupTour) {
            // Store the data in the database
            UserTour::create([
                'user_id' => $userId,
                'tour_id' => $groupTour->tour_id,
                'group_tour_id' => $groupTour->id,
            ]);

            // Show a success message
            session()->flash('message', 'You have joined the tour successfully.');
        } else {
            // Show an error message if the group tour is not found
            session()->flash('message', 'The group tour is not available.');
        }
    }







    public function mount()
    {
        $this->groupTours = GroupTour::with('group', 'gpx')->get();
    }

   }


