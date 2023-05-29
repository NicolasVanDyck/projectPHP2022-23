<?php

namespace App\Http\Livewire;

use App\Models\GPX;
use App\Models\Group;
use App\Models\GroupTour;
use Livewire\Component;
use Livewire\WithPagination;

class ShowGroupTours extends Component
{
    // Huidige groepsrit die wordt bewerkt
    public $editGroupTour;

    public $groups; // Lijst van beschikbare groepen
    public $gpxs; // Lijst van beschikbare GPX-routes
    public $confirmingDelete = false; // Bevestiging van het verwijderen van een groepsrit

    use WithPagination;

    protected $rules = [
        'editGroupTour.group_id' => 'required',
        'editGroupTour.tour_id' => 'required',
        'editGroupTour.start_date' => 'required',
        'editGroupTour.end_date' => 'required',
        'editGroupTour.start_time' => 'required',

    ];
//Haal alle groepsritten op.
    public function getGroupTours()
    {
        return GroupTour::with(['group', 'tour']);
    }
//Render de Livewire-component.
    public function render()
    {
        $groups = Group::pluck('group', 'id')->toArray(); // Haal alle groepen op
        $routes = GPX::all(); // Haal alle GPX-routes op

        // Haal de paginerende groepsritten op
        $groupTours = $this->getGroupTours()->paginate(5);

        return view('livewire.show-group-tours', compact('groups', 'routes', 'groupTours'));
    }
//Bevestig het verwijderen van een groepsrit
    public function confirmDeleteGroupTour($groupId)
    {
        $this->confirmingDelete = $groupId;
    }
//Verwijder een groepsrit
    public function deleteGroupTour($groupTourId)
    {
        $groupTour = GroupTour::findOrFail($groupTourId);
        $groupTour->delete();

        $this->groupTours = GroupTour::with(['group', 'gpx'])->get();
        $this->confirmingDelete = false;

        session()->flash('delete', 'Groepsrit is verwijderd.');
    }


    public function editGroupTour($groupId)
    {
        $this->editGroupTour = GroupTour::find($groupId);
    }

//Werk een groepsrit bij.
    public function updateGroupTour()
    {
        $this->validate();

        $this->editGroupTour->save();

        // Reset de editGroupTour-property en sluit het modalvenster
        $this->editGroupTour = null;

        session()->flash('success', 'Groepsrit is aangepast.');
    }
    public function cancelEdit()
    {
        $this->editGroupTour = null;
    }
    public function cancelDelete()
    {
        $this->confirmingDelete = false;
    }
    public function mount()
    {
        $this->groups = Group::all(); // Haal alle groepen op
        $this->gpxs = GPX::all(); // Haal alle GPX-routes op
    }



}
