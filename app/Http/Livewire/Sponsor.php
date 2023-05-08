<?php

namespace App\Http\Livewire;
use App\Models\Image;
use Livewire\Component;

class Sponsor extends Component
{


    public function render()
    {
        $images = Image::where('image_type_id', 1)->get();
        return view('livewire.sponsor', [
            'images' => $images,
        ]);
    }

}
