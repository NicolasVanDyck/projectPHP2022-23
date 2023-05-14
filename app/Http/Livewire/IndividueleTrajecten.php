<?php

namespace App\Http\Livewire;

use DirectoryIterator;
use Livewire\Component;
use phpGPX\phpGPX;
use Storage;

class IndividueleTrajecten extends Component
{


    public function export()
    {
        
        return Storage::disk('public')->download('gpx/' . $card_title . '.gpx');
    }

    public function render()
    {
        $gpx = new phpGPX();
        $fileArray = [];

        $directory = Storage::files('public/gpx');

        foreach ($directory as $file) {
//            dd(Storage::url($file));
            array_push($fileArray, $gpx->load('../storage/app/' . $file));
        }
//        $file = $gpx->load('../storage/app/public/gpx/Bokrijk 93 km.gpx');
//        dd($testArray);
//        dd($track->name);

        return view('livewire.individuele-trajecten', compact('fileArray'));
    }
}
