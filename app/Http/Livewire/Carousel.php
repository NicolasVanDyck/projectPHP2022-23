<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Livewire\Component;

class Carousel extends Component
{
    public function render()
    {
        $images = Image::where('in_carousel',1)
            ->inRandomOrder()->take(10)->get();
        return view('livewire.carousel', compact('images'));
    }
}
