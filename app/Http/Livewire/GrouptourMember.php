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
    public $showPopup; // Toont of verbergt de popup voor het uploaden van GPX-bestanden
    public $selectedGroup; // Geselecteerde groep voor de filteropties
    public $filteredGroupToursByDay; // Gefilterde groepstoertochten op basis van dag
    public $selectedDay; // Geselecteerde dag voor de filteropties

    public $selectedDistance; // Geselecteerde afstand voor de filteropties
    public $minDistance; // Minimale afstand van GPX-bestanden
    public $maxDistance; // Maximale afstand van GPX-bestanden

    use WithPagination;


// Verlaat een tour door de gebruikerstour te verwijderen.
    public function leaveTour($userTourId)
    {
        // Zoek de gebruikerstour op basis van ID
        $userTour = UserTour::find($userTourId);

        // Controleer of de gebruikerstour bestaat
        if ($userTour) {
            // Verwijder de gebruikerstour
            $userTour->delete();

            // Toon een succesbericht
            session()->flash('message', 'You have left the tour.');
        }
    }

    public function render()
    {
        $userTours = $this->getUserTours();
        $groups = Group::all(); // Retrieve all groups for the filter options// Haal alle groepen op voor de filteropties

        // Haal unieke dagen op van groepstoertochten voor de dagfilter dropdown
        $days = GroupTour::pluck('start_date')->unique()->sort()->toArray();

        // Pas filters toe en paginateer de resultaten
        $filteredGroupTours = $this->applyFilters()
            ->paginate(6);

        foreach ($filteredGroupTours as $groupTour) {
            $groupTour->isRegistered = $this->isUserRegistered($groupTour->tour_id, $groupTour->group_id);
        }

        // Filter de groepstoertochten op basis van de geselecteerde groep
        $filteredGroupToursByGroup = $this->applyGroupFilter()->pluck('start_date');

        // Filter de beschikbare data op basis van de geselecteerde groep
        $days = GroupTour::whereIn('start_date', $filteredGroupToursByGroup)
            ->pluck('start_date')
            ->unique()
            ->sort()
            ->toArray();

        return view('livewire.grouptour-member', compact('userTours', 'groups', 'days', 'filteredGroupTours'));
    }

// Controleert of de gebruiker is geregistreerd voor een specifieke tour en groep.
// hier zit t probleem denk ik?
    private function isUserRegistered($tourId, $groupId)
    {
        $userId = Auth::id();

        // Zoek of er een gebruikerstour bestaat die overeenkomt met de opgegeven tour en groep
        return UserTour::where('user_id', $userId)
            ->whereHas('groupTour', function ($query) use ($tourId, $groupId) {
                $query->where('tour_id', $tourId)
                    ->where('group_id', $groupId);
            })
            ->exists();
    }

    //Past de filters toe op de groepstours op basis van de geselecteerde opties.
    private function applyFilters()
    {
        $groupTours = GroupTour::with('group', 'gpx');

        // Filter op geselecteerde groep indien gespecificeerd
        if ($this->selectedGroup) {
            $groupTours = $groupTours->where('group_id', $this->selectedGroup);
        }

        // Filter op geselecteerde dag indien gespecificeerd
        if ($this->selectedDay) {
            $groupTours = $groupTours->where('start_date', $this->selectedDay);
        }

        // Filter op geselecteerde afstand indien gespecificeerd
        if ($this->selectedDistance) {
            $groupTours = $groupTours->whereHas('gpx', function ($query) {
                $query->where('amount_of_km', '>=', $this->selectedDistance);
            });
        }

        return $groupTours;
    }

// Past de groepsfilter toe op de groepstours op basis van de geselecteerde opties.
    private function applyGroupFilter()
    {
        $groupTours = GroupTour::with('group', 'gpx');

        // Filter op geselecteerde groep indien gespecificeerd
        if ($this->selectedGroup) {
            $groupTours = $groupTours->where('group_id', $this->selectedGroup);
        }
        // Filter op geselecteerde dag indien gespecificeerd
        if ($this->selectedDay) {
            // Haal de groep IDs op van groepstours die voldoen aan de geselecteerde dag
            $filteredGroupIds = GroupTour::where('start_date', $this->selectedDay)->pluck('group_id')->toArray();
            // Filter op de verzamelde groep IDs
            $groupTours = $groupTours->whereIn('group_id', $filteredGroupIds);
        }

        // Haal de geconfigureerde lijst van groepstours op
        return $groupTours->get();
    }

    private function getUserTours()
    {
        // Haal de ingelogde gebruiker ID op
        $userId = Auth::id();

        // Haal de geregistreerde toertochten van de gebruiker op
        return UserTour::with('groupTour.gpx')
            ->where('user_id', $userId)
            ->get();
    }

    public function resetFilters()
    {
        // Reset de filteropties
        $this->selectedGroup = null;
        $this->selectedDay = null;
        $this->selectedDistance = null;
        $this->resetPage();
    }

    public function updatedSelectedGroup()
    {
        // Reset de pagina bij het wijzigen van de geselecteerde groep
        $this->resetPage();
        $this->selectedDay = null;
    }

    public function updatedSelectedDay()
    {
        // Reset de pagina bij het wijzigen van de geselecteerde dag
        $this->resetPage();
    }

    public function joinTour($tourId)
    {
        // Haal de ingelogde gebruiker ID op
        $userId = Auth::id();

        // Controleer of de gebruiker al is geregistreerd voor de tour
        $isRegistered = UserTour::where('user_id', $userId)
            ->where('tour_id', $tourId)
            ->exists();

        if ($isRegistered) {
            // Stel de bool in om het pop-up bericht te tonen
            $this->showPopup = true;
        } else {
            // Haal de groepstour op basis van de opgegeven tour ID
            $groupTour = GroupTour::where('tour_id', $tourId)->first();

            if ($groupTour) {
                // Sla de gegevens op in de database
                UserTour::create([
                    'user_id' => $userId,
                    'tour_id' => $groupTour->tour_id,
                    'group_tour_id' => $groupTour->id,
                ]);

                // Toon een succesbericht
                session()->flash('message', 'You have joined the tour successfully.');
            } else {
                // Toon een foutbericht als de groepstour niet is gevonden
                session()->flash('message', 'The group tour is not available.');
            }
        }
    }

    public function mount()
    {
        // Haal de minimale en maximale afstand op uit de database
        $this->minDistance = GPX::min('amount_of_km');
        $this->maxDistance = GPX::max('amount_of_km');
    }

    public function filterByDistance()
    {
        // Reset de pagina bij het filteren op afstand
        $this->resetPage();
    }

    public function updatedSelectedDistance()
    {
        // Reset de pagina bij het wijzigen van de geselecteerde afstand
        $this->resetPage();
    }
}
