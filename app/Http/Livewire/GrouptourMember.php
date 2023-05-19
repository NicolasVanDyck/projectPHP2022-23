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
    public $groupTours;
     public $selectedTourId;

    public function joinTour($groupTourId)
    {
        // Get the logged-in user ID
        $userId = auth()->user()->id;

        // Assign the selected tour ID
        $this->selectedTourId = $groupTourId;

        // Check if the user is already joined to the selected tour
        $userTour = UserTour::where('user_id', $userId)
            ->where('tour_id', $this->selectedTourId)
            ->first();

        if ($userTour) {
            // Show an error message if the user is already joined
            session()->flash('message', 'You have already joined this tour.');
            return;
        }


        // Create a new user tour record
        $userTour = new UserTour();
        $userTour->user_id = $userId;
        $userTour->tour_id = $this->selectedTourId;
        $userTour->group_tour_id = $groupTourId; // Assign the group_tour_id value
        $userTour->save();

        // Show a success message
        session()->flash('message', 'You have successfully joined the tour.');

        // Reset the selected tour ID
        $this->selectedTourId = null;
    }

    public function render()
    {
        $groupTours = $this->getGroupTours();
        $userTours = $this->getUserTours();

        return view('livewire.grouptour-member', [
            'groupTours' => $groupTours,
            'userTours' => $userTours,
        ]);
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

    private function getUserTours()
    {
        // Get the logged-in user ID
        $userId = Auth::id();

        // Retrieve the user's registered tours
        return UserTour::with(['groupTour.gpx', 'groupTour.tour'])
            ->where('user_id', $userId)
            ->get();
    }


//    ppublic function show()
//{
//    $userId = Auth::id();
//    $this->userTours = UserTour::with('groupTour.group', 'groupTour.gpx')->where('user_id', $userId)->get();
//}

    public function mount()
    {
        $this->groupTours = GroupTour::with('group', 'gpx')->get();
    }

   }


