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
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class GrouptourMember extends Component
{

    public $selectedGroup;
    public $selectedDay;
    public $selectedDistance;

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
        $days = $this->groupTours->pluck('start_date')->unique()->sort()->toArray();

        // Apply filters and paginate the results
        $filteredGroupTours = $this->applyFilters()
            ->paginate(6);

        return view('livewire.grouptour-member', compact('userTours', 'groups', 'days', 'filteredGroupTours'));
    }

    private function applyFilters()
    {
        $groupTours = GroupTour::with('group', 'gpx');

        // Apply group filter if selected
        if ($this->selectedGroup) {
            $groupTours = $groupTours->where('group_id', $this->selectedGroup);
        }

        // Apply day filter if selected
        if ($this->selectedDay) {
            $groupTours = $groupTours->where('start_date', $this->selectedDay);
        }

        // Apply distance filter if selected
        // Uncomment the code below if you want to apply the distance filter
        // if ($this->selectedDistance) {
        //     $groupTours = $groupTours->whereHas('gpx', function ($query) {
        //         $query->where('amount_of_km', '<=', $this->selectedDistance);
        //     });
        // }

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

        // Calculate the minimum and maximum distances
//        $minDistance = $query->min('gpx.amount_of_km');
//        $maxDistance = $query->max('gpx.amount_of_km');
//
//        // Set the initial selected distance to the maximum distance
//        if (!$this->selectedDistance) {
//            $this->selectedDistance = $maxDistance;
//        }

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
        // Get minimum and maximum distances from the database
//        $this->minDistance = Gpx::min('amount_of_km');
//        $this->maxDistance = Gpx::max('amount_of_km');
    }

   }


