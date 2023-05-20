<?php

namespace App\Http\Livewire;

use App\Models\GPX;
use Livewire\Component;
use Storage;

class IndividueleTrajecten extends Component
{

    public function delete($path)
    {
        $gpx = GPX::where('path', $path)->first();
        $gpx->delete();
        Storage::disk('public')->delete($path);
    }

    public function download($path)
    {

        return Storage::disk('public')->download($path);
    }

    public function render()
    {

        $trajecten = GPX::orderBy('name')->with('user')->get();
//        dd($trajecten);


        return view('livewire.individuele-trajecten', compact('trajecten'));
    }
}
