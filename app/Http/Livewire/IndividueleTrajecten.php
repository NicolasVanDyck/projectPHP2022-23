<?php

namespace App\Http\Livewire;

use App\Models\GPX;
use Livewire\Component;
use Storage;

class IndividueleTrajecten extends Component
{
    public $afstand;
    public $afstandMin, $afstandMax;

    public function mount()
    {
        $this->afstandMin = ceil(GPX::min('amount_of_km'));
        $this->afstandMax = ceil(GPX::max('amount_of_km'));
        $this->afstand = $this->afstandMax;
    }

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

        $trajecten = GPX::orderBy('name')->with('user')->where('amount_of_km', '<=', $this->afstand)->get();
//        dd($trajecten);
//        $gpxes = GPX::orderBy('id')->where('amount_of_km', '<=', $this->afstand)->get();
//        dd($gpxes);


        return view('livewire.individuele-trajecten', compact('trajecten'));
    }
}
