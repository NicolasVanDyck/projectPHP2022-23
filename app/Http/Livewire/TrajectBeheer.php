<?php

namespace App\Http\Livewire;

use App\Models\GPX;
use App\Models\Tour;
use App\Models\GroupTour;
use Livewire\Component;
use App\Models\Group;
use Carbon\Carbon;
use Livewire\WithPagination;

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




//duwt alles naar de view.
    public function render()
    {
        $groups = Group::pluck('group', 'id')->toArray();
        $routes = GPX::all();
        $groupTours = GroupTour::with(['group', 'tour'])->get();

        return view('livewire.traject-beheer', compact('groups', 'routes', 'groupTours'));
    }


//Selecteer een groep voor de groepsrit.
//    public function selectGroup($group)
//    {
//        $this->selectedGroup = $group;
//        $this->selectedRoute = null;
//        $this->selectedRouteKm = null;
//    }
//Selecteer een route.
    public function selectRoute($routeId, $routeKm)
    {
        $selectedRoute = GPX::findOrFail($routeId);
        $this->selectedRoute = $selectedRoute->id;
        $this->selectedRouteName = $selectedRoute->name;
        $this->selectedRouteKm = $routeKm;
        $this->isNestedModalOpen = false;
    }

//Sluit de geneste modal.
    public function closeNestedModal()
    {
        $this->isNestedModalOpen = false;
    }
//Open  modal
    public function openModal()
    {
        $this->openModal = true;
    }
//close modal
    public function closeModal()
    {
        $this->openModal = false;
    }

    public function createGroepsrit()
    {
        // Aangepaste validatieberichten
        $customMessages = [
            'selectedGroup.required' => 'Selecteer een groep.',
            'selectedRoute.required' => 'Selecteer een route.',
            'selectedDate.required' => 'Selecteer een startdatum en -tijd.',
            'selectedDate.before' => 'De startdatum en -tijd moeten voor de einddatum en -tijd liggen.',
            'selectedEndDate.required' => 'Selecteer een einddatum en -tijd.',
        ];

        // Valideer de formuliervelden
        $validatedData = $this->validate([
            'selectedGroup' => 'required',
            'selectedRoute' => 'required',
            'selectedDate' => 'required|before:selectedEndDate',
            'selectedEndDate' => 'required',
        ], $customMessages);


        // Haal de groep- en route-ID's op
        $groupId = $validatedData['selectedGroup'];
        $routeId = $validatedData['selectedRoute'];

        // Haal het Group model op
        $group = Group::findOrFail($groupId);

        // Haal de tijd op van de geselecteerde datum
        $startTime = Carbon::parse($validatedData['selectedDate'])->format('H:i:s');

        // Maak een nieuwe GroupTour aan
        $groepsrit = GroupTour::create([
            'group_id' => $groupId,
            'tour_id' => $routeId,
            'start_date' => $validatedData['selectedDate'],
            'start_time' => $startTime,
            'end_date' => $validatedData['selectedEndDate'],
        ]);

        // Dump de gegevens van de nieuwe groepsrit
//        dd([
//            'group_id' => $group->id,
//            'tour_id' => $routeId,
//            'start_date' => $validatedData['selectedDate'],
//            'start_time' => $startTime,
//            'end_date' => $validatedData['selectedEndDate'],
//        ]);

        // // Reset de formuliervelden na succesvolle indiening
        $this->selectedGroup = '';
        $this->selectedRoute = null;
        $this->selectedRouteKm = null;
        $this->selectedDate = null;
        $this->selectedEndDate = null;

        // Stuur een succesbericht naar de gebruiker
//        session()->flash('success_message', 'Groepsrit is aangemaakt.');
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html' => "Groepsrit is aangemaakt.",
        ]);

        // Sluit het modal als je er mee klaar bent
        $this->openModal = false;
    }









}
