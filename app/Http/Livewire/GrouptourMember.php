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


    public function joinTour()
    {
        // Get the selected tour ID
        $tourId = $this->selectedTourId;

        // Get the logged-in user ID
        $userId = Auth::id();

        // Create a new user tour record
        $userTour = new UserTour;
        $userTour->user_id = $userId;
        $userTour->group_tour_id = $tourId;
        $userTour->save();

        // Show a success message
        session()->flash('message', 'You have joined the tour.');

        // Reset the selected tour ID
        $this->selectedTourId = null;
    }



    public function mount()
    {
        $this->groupTours = GroupTour::with('group', 'gpx')->get();
    }

   }


