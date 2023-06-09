<?php

namespace App\Http\Livewire;

use App\Models\GPX;
use App\Models\Tour;
use App\Models\User;
use Livewire\Component;
use Storage;
use Livewire\WithPagination;

class IndividueleTrajecten extends Component
{
    use WithPagination;

    public $afstand;
    public $afstandMin, $afstandMax;
    public $user = "%";
    public $perPage = 1;

    public function updated($propertyName, $propertyValue)
    {
        if (in_array($propertyName, ['user', 'afstand', 'perPage'])) {
            $this->resetPage();
        }
    }

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
        $users = User::orderBy('name')->where('name', 'like', $this->user)->get();


        $trajecten = GPX::orderBy('name')->with('user')
            ->where('amount_of_km', '<=', $this->afstand)
            ->whereRelation('user', 'name', 'like', $this->user)
            ->paginate($this->perPage);

        return view('livewire.individuele-trajecten', compact('trajecten', 'users'));
    }
}
