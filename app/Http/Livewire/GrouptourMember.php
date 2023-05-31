<?php

namespace App\Http\Livewire;

use App\Models\GroupTour;
use App\Models\Group;
use App\Models\GPX;
use App\Models\Tour;
use App\Models\UserTour;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GrouptourMember extends Component
{
    public $showPopup;
    public $selectedGroup;
    public $filteredGroupToursByDay;
    public $selectedDay;

    public $selectedDistance;
    public $minDistance;
    public $maxDistance;

    use WithPagination;

    protected $paginationTheme = 'tailwind';

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
        $days = GroupTour::pluck('start_date')->unique()->sort()->toArray();

        // Apply filters and paginate the results
        $filteredGroupTours = $this->applyFilters()
            ->paginate(6);

        foreach ($filteredGroupTours as $groupTour) {
            $groupTour->isRegistered = $this->isUserRegistered($groupTour->tour_id, $groupTour->group_id);
        }

        // Filter the group tours based on the selected group
        $filteredGroupToursByGroup = $this->applyGroupFilter()->pluck('start_date');

        // Filter the available dates based on the selected group
        $days = GroupTour::whereIn('start_date', $filteredGroupToursByGroup)
            ->pluck('start_date')
            ->unique()
            ->sort()
            ->toArray();

        return view('livewire.grouptour-member', compact('userTours', 'groups', 'days', 'filteredGroupTours'));
    }

    private function isUserRegistered($tourId, $groupId)
    {
        $userId = Auth::id();

        return UserTour::where('user_id', $userId)
            ->whereHas('groupTour', function ($query) use ($tourId, $groupId) {
                $query->where('tour_id', $tourId)
                    ->where('group_id', $groupId);
            })
            ->exists();
    }

    private function applyFilters()
    {
        $groupTours = GroupTour::with('group', 'gpx');

        if ($this->selectedGroup) {
            $groupTours = $groupTours->where('group_id', $this->selectedGroup);
        }

        if ($this->selectedDay) {
            $groupTours = $groupTours->where('start_date', $this->selectedDay);
        }

        if ($this->selectedDistance) {
            $groupTours = $groupTours->whereHas('gpx', function ($query) {
                $query->where('amount_of_km', '>=', $this->selectedDistance);
            });
        }

        return $groupTours;
    }

    private function applyGroupFilter()
    {
        $groupTours = GroupTour::with('group', 'gpx');

        if ($this->selectedGroup) {
            $groupTours = $groupTours->where('group_id', $this->selectedGroup);
        }

        if ($this->selectedDay) {
            $filteredGroupIds = GroupTour::where('start_date', $this->selectedDay)->pluck('group_id')->toArray();
            $groupTours = $groupTours->whereIn('group_id', $filteredGroupIds);
        }

        return $groupTours->get();
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

    public function resetFilters()
    {
        $this->selectedGroup = null;
        $this->selectedDay = null;
        $this->selectedDistance = null;
        $this->resetPage();
    }

    public function updatedSelectedGroup()
    {
        $this->resetPage();
        $this->selectedDay = null;
    }

    public function updatedSelectedDay()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // Get minimum and maximum distances from the database
        $this->minDistance = GPX::min('amount_of_km');
        $this->maxDistance = GPX::max('amount_of_km');
    }

    public function filterByDistance()
    {
        $this->resetPage();
    }

    public function updatedSelectedDistance()
    {
        $this->resetPage();
    }
}
