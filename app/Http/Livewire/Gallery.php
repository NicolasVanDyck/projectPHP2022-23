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

    public $groupToursPerPage = 3;
    public $overigePerPage = 8;

    public function resetDate()
    {
        $this->date = null;
    }

    public function updated($propertyName, $propertyValue)
    {
        // dump($propertyName, $propertyValue);
        if (in_array($propertyName, ['groupToursPerPage','overigePerPage']))
            $this->resetPage();
    }
    public function render()
    {
//        Join GroupTour, Tour and Image tables
        $grouptours = GroupTour::with('tour.images')
            ->has('tour.images')
            ->orderBy('start_date','desc')
            ->when($this->date != null, function($query) {
                $query->where('start_date', '=', $this->date);})
            ->paginate($this->groupToursPerPage);
        $photos = Image::where([['tour_id', '=', null],['image_type_id','=',2]])->paginate($this->overigePerPage);

        return view('livewire.gallery', compact('grouptours','photos'));
    }

}
