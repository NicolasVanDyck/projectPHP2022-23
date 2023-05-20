<?php

namespace App\Http\Livewire;

use App\Models\GPX;
use App\Models\User;
use DirectoryIterator;
use Livewire\Component;
use phpGPX\phpGPX;
use Storage;

class IndividueleTrajecten extends Component
{


    public function export($card_title)
    {

        return Storage::disk('public')->download('gpx/' . $card_title . '.gpx');
    }

    public function render()
    {

        $trajecten = GPX::orderBy('name')->with('user')->get();
//        dd($trajecten);


        return view('livewire.individuele-trajecten', compact('trajecten'));
    }
}
