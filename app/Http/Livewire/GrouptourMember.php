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
    public $selectedGroup; // Geselecteerde groep voor de filteropties
    public $filteredGroupToursByDay; // Gefilterde groepstoertochten op basis van dag
    public $selectedDay; // Geselecteerde dag voor de filteropties

    public $selectedDistance; // Geselecteerde afstand voor de filteropties
    public $minDistance; // Minimale afstand van GPX-bestanden
    public $maxDistance; // Maximale afstand van GPX-bestanden

    use WithPagination;


// Verlaat een tour door de gebruikerstour te verwijderen.
    public function leaveTour($groupTourId)
    {
        $deleted = UserTour::where('group_tour_id', '=', (int)$groupTourId)
            ->where('user_id', '=', Auth::id())->delete();

        // Toon een succesbericht
        session()->flash('message', 'You have left the tour.');
    }

    public function render()
    {
        $userTours = $this->getUserTours();
        $groups = Group::all(); // Haal alle groepen op voor de filteropties

        // Pas filters toe en paginateer de resultaten
        $filteredGroupTours = $this->applyFilters()
            ->paginate(6);

        foreach ($filteredGroupTours as $groupTour) {
            $groupTour->isRegistered = $this->isUserRegistered($groupTour->id);
        }

        // Filter de groepstoertochten op basis van de geselecteerde groep
        $filteredGroupToursByGroup = $this->applyGroupFilter()->pluck('start_date');

        // Filter de beschikbare data op basis van de geselecteerde groep
        $days = GroupTour::whereIn('start_date', $filteredGroupToursByGroup)
            ->pluck('start_date')
            ->unique()
            ->sort()
            ->toArray();

        // Haal de minimale en maximale afstand op uit de database
        $this->minDistance = GPX::min('amount_of_km');
        $this->maxDistance = GPX::max('amount_of_km');

        return view('livewire.grouptour-member', compact('userTours', 'groups', 'days', 'filteredGroupTours'));
    }

// Controleert of de gebruiker is geregistreerd voor een specifieke tour en groep.
    private function isUserRegistered($grouptourId)
    {
        $userId = Auth::id();

        return UserTour::where('user_id', $userId)
            ->where('group_tour_id', $grouptourId)
            ->exists();
    }

    // FILTERS
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

//         Filter op geselecteerde afstand indien gespecificeerd
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

    public function joinTour($grouptourId)
    {
        // Haal de ingelogde gebruiker ID op
        $userId = Auth::id();

        // Controleer of de gebruiker al is geregistreerd voor de tour
        $isRegistered = UserTour::where('user_id', $userId)
            ->where('group_tour_id', $grouptourId)
            ->exists();

            // Haal de groepstour op basis van de opgegeven tour ID
            $groupTour = GroupTour::find($grouptourId);
//            $groupTour = GroupTour::where('group_id', $groupTour->group_id)->first();

            UserTour::create([
            'user_id' => $userId,
            'tour_id' => $groupTour->tour_id,
            'group_tour_id' => $groupTour->id,

        ]);

    }

}
