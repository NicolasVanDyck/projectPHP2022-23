<?php

namespace App\Http\Livewire;

use App\Models\GPX;
use App\Models\GroupTour;
use Livewire\Component;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;    // <-- Add this line

class TrajectBeheer extends Component
{

    use WithPagination;
    public $selectedRouteName = '';
    public $selectedGroup = '';
    public $selectedRoute = null;
    public $selectedRouteKm = null;
    public $selectedDate = null;
    public $selectedEndDate = null;
    public $openModal = false;
    public $isNestedModalOpen = false;






    public function getGroupTours()
    {
        return GroupTour::with(['group', 'tour'])->get();
    }

    public function render()
    {
        $groups = Group::pluck('group', 'id')->toArray();
        $routes = GPX::all();
        $groupTours = $this->getGroupTours();

        return view('livewire.traject-beheer', compact('groups', 'routes', 'groupTours'));
    }


    public function selectGroup($group)
    {
        $this->selectedGroup = $group;
        $this->selectedRoute = null;
        $this->selectedRouteKm = null;
    }

    public function selectRoute($routeName, $routeKm)
    {
        $this->selectedRoute = $routeName;
        $this->selectedRouteKm = $routeKm;
        $this->isNestedModalOpen = false;
    }

    public function closeNestedModal()
    {
        $this->isNestedModalOpen = false;
    }

    public function openModal()
    {
        $this->openModal = true;
    }

    public function closeModal()
    {
        $this->openModal = false;
    }

    public function createGroepsrit()
    {
        // Validate the form fields
        $validatedData = $this->validate([
            'selectedGroup' => 'required',
            'selectedRoute' => 'required',
            'selectedDate' => 'required',
            'selectedEndDate' => 'required',
        ]);

        // Retrieve the group and route IDs
        $groupId = $validatedData['selectedGroup'];
        $routeId = $validatedData['selectedRoute'];

        // Fetch the Group model
        $group = Group::findOrFail($groupId);

        // Extract the time from the selected date
        $startTime = Carbon::parse($validatedData['selectedDate'])->format('H:i:s');

        // Create a new GroupTour entry
        $groepsrit = GroupTour::create([
            'group_id' => $groupId,
            'tour_id' => $routeId,
            'start_date' => $validatedData['selectedDate'],
            'start_time' => $startTime,
            'end_date' => $validatedData['selectedEndDate'],
        ]);

        // Dump the values being sent to the database
//        dd([
//            'group_id' => $group->id,
//            'tour_id' => $routeId,
//            'start_date' => $validatedData['selectedDate'],
//            'start_time' => $startTime,
//            'end_date' => $validatedData['selectedEndDate'],
//        ]);

        // Reset the form fields after successful submission
        $this->selectedGroup = '';
        $this->selectedRoute = null;
        $this->selectedRouteKm = null;
        $this->selectedDate = null;
        $this->selectedEndDate = null;

        // Close the modal
        $this->openModal = false;
    }

//    public function createGroepsrit()
//    {
//        // Retrieve the form fields
//        $selectedGroup = $this->selectedGroup;
//        $selectedRoute = $this->selectedRoute;
//        $selectedDate = $this->selectedDate;
//        $selectedEndDate = $this->selectedEndDate;
//
//        // Retrieve the group and route IDs
//        $groupId = $selectedGroup;
//        $routeId = $selectedRoute;
//
//        // Fetch the Group model
//        $group = Group::findOrFail($groupId);
//
//        // Extract the time from the selected date
//        $startTime = Carbon::parse($selectedDate)->format('H:i:s');
//
////         Create a new GroupTour entry
////        $groepsrit = GroupTour::create([
////            'group_id' => $group->id,
////            'tour_id' => $routeId,
////            'start_date' => $selectedDate,
////            'start_time' => $startTime,
////            'end_date' => $selectedEndDate,
////        ]);
//
////         Dump the values being sent to the database
//        dd([
//            'group_id' => $group->id,
//            'tour_id' => $routeId,
//            'start_date' => $selectedDate,
//            'start_time' => $startTime,
//            'end_date' => $selectedEndDate,
//        ]);
//
//        // Reset the form fields after successful submission
//        $this->selectedGroup = '';
//        $this->selectedRoute = null;
//        $this->selectedRouteKm = null;
//        $this->selectedDate = null;
//        $this->selectedEndDate = null;
//
//        // Close the modal
//        $this->openModal = false;
//    }








}
