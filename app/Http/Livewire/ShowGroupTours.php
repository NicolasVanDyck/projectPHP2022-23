<?php

namespace App\Http\Livewire;

use App\Models\GPX;
use App\Models\Group;
use App\Models\GroupTour;
use Livewire\Component;

class ShowGroupTours extends Component
{
    public $editGroupTour;

    public $groups;
    public $gpxs;
    public $confirmingDelete = false;
    // Other properties and methods...

    public function confirmDeleteGroupTour($groupId)
    {
        $this->confirmingDelete = $groupId;
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = false;
    }
    protected $rules = [
        'editGroupTour.group_id' => 'required',
        'editGroupTour.tour_id' => 'required',
        'editGroupTour.start_date' => 'required',
        'editGroupTour.end_date' => 'required',
        'editGroupTour.start_time' => 'required',

    ];

    public function render()
    {
        $groups = Group::pluck('group', 'id')->toArray();
        $routes = GPX::all();
        $groupTours = $this->getGroupTours();

        return view('livewire.show-group-tours', compact('groups', 'routes', 'groupTours'));
    }

    public function getGroupTours()
    {
        return GroupTour::with(['group', 'tour'])->get();
    }
    public function deleteGroupTour($groupTourId)
    {
        $groupTour = GroupTour::findOrFail($groupTourId);
        $groupTour->delete();

        $this->groupTours = GroupTour::with(['group', 'gpx'])->get();
        $this->confirmingDelete = false;
    }
    public function editGroupTour($groupId)
    {
        $this->editGroupTour = GroupTour::find($groupId);
    }

    public function cancelEdit()
    {
        $this->editGroupTour = null;
    }

    public function updateGroupTour()
    {
        $this->validate();

        $this->editGroupTour->save();

        // Reset the editGroupTour property and close the modal
        $this->editGroupTour = null;
    }

    public function mount()
    {
        $this->groups = Group::all();
        $this->gpxs = GPX::all();
    }



}
