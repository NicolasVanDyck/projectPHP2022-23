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
    public $userTours;
    public $isUserTour;



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
    public function deleteTour($tourId)
    {
        // Get the logged-in user ID
        $userId = Auth::id();

        // Check if the user tour exists for the provided tour ID
        $userTour = UserTour::where('user_id', $userId)->where('tour_id', $tourId)->first();

        if ($userTour) {
            // Delete the user tour
            $userTour->delete();

            // Show a success message
            session()->flash('message', 'You have successfully left the tour.');
        } else {
            // Show an error message if the user tour is not found
            session()->flash('message', 'The user tour does not exist.');
        }
    }

    public function isUserTour($tourId)
    {
        $userId = Auth::id();

        // Check if the user tour exists for the provided tour ID
        return UserTour::where('user_id', $userId)->where('tour_id', $tourId)->exists();
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

    public function render()
    {
        return view('livewire.grouptour-member',);
    }
}


