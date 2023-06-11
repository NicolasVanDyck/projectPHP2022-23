<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\GroupTour;
use App\Models\Image;
use Livewire\WithPagination;

class Gallery extends Component
{
    use WithPagination;

    public $date = null;

    public $groupToursPage = 1;
    public $groupToursPerPage = 3;
    public $overigePage = 1;
    public $overigePerPage = 3;

    public function resetDate()
    {
        $this->date = null;
    }

    public function updated($propertyName, $propertyValue)
    {
        if (in_array($propertyName, ['groupToursPerPage', 'overigePerPage']))
            $this->resetPage();
    }

    public function render()
    {
//        Join GroupTour, Tour and Image tables
        $grouptours = GroupTour::with('tour.images')
            ->has('tour.images')
            ->orderBy('start_date', 'desc')
            ->when($this->date != null, function ($query) {
                $query->where('start_date', '=', $this->date);
            })
            ->simplePaginate($this->groupToursPerPage, ['*'], 'groupToursPage');

        // Fetch all images with null tour_id and image_type_id for pagination
        $allPhotos = Image::whereNull('tour_id')
            ->whereNull('image_type_id')
            ->simplePaginate($this->overigePerPage, ['*'], 'overigePage');

        return view('livewire.gallery', compact('grouptours', 'allPhotos'));
    }

}
