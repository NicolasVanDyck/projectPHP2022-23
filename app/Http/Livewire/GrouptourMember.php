<?php

namespace App\Http\Livewire;

use App\Models\GroupTour;
use App\Models\Group;
use App\Models\Gpx;
use App\Models\Tour;
use App\Models\UserTour;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class GrouptourMember extends Component
{

    public $selectedGroup;
    public $selectedDay;
    use WithPagination;

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
        $groups = Group::all(); // Retrieve all groups for the filter options

        // Get unique days from group tours for the day filter dropdown
        $days = $this->groupTours->pluck('start_date')->unique()->sort()->toArray();

        // Apply filters
        $filteredGroupTours = $this->applyFilters();

        return view('livewire.grouptour-member', compact('userTours', 'groups', 'days', 'filteredGroupTours'));
    }

    private function applyFilters()
    {
        $groupTours = GroupTour::with('group', 'gpx')->get();

        // Apply group filter if selected
        if ($this->selectedGroup) {
            $groupTours = $groupTours->where('group_id', $this->selectedGroup);
        }

        // Apply day filter if selected
        if ($this->selectedDay) {
            $groupTours = $groupTours->where('start_date', $this->selectedDay);
        }

        return $groupTours;
    }

    public function updatedSelectedGroup()
    {
        $this->resetPage();
    }

    public function updatedSelectedDay()
    {
        $this->resetPage();
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
        $query = GroupTour::with('gpx')
            ->whereHas('tour', function ($query) {
                $query->where('end_date', '>=', now()); // Filter active tours
            });

        if ($this->selectedGroup) {
            $query->where('group_id', $this->selectedGroup);
        }

        if ($this->selectedDay) {
            $query->whereDate('start_date', $this->selectedDay);
        }

        $this->groupTours = $query->orderBy('start_date')->get()->unique('start_date');
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


