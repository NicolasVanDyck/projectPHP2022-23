<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\GroupTour;
use App\Models\Image;

class Gallery extends Component
{
    public function render()
    {
//        $images = collect(Storage::files('public/galerij'))->map(function ($path) {
//            return asset(Storage::url($path));
//        });
        $grouptours = GroupTour::orderBy('start_date','desc')->get();
        $photos = Image::all();

        return view('livewire.gallery', compact('grouptours','photos'));
    }

}
