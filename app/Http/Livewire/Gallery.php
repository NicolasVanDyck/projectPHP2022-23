<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Gallery extends Component
{
    public function render()
    {
        $images = collect(Storage::files('public/galerij'))->map(function ($path) {
            return asset(Storage::url($path));
        });

        return view('livewire.gallery', [
            'images' => $images,
        ]);
    }

}
