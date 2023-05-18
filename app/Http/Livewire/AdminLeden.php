<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Text;

class AdminLeden extends Component
{
    public $newText;

    protected $rules = [
        'newText.location' => 'required|unique:texts,location',
        'newText.description' => 'required|unique:texts,description',
    ];

    public function createText()
    {
        $this->validateOnly('description');

        Text::create([
            'location' => $this->newText['location'],
            'description' => $this->newText['description'],
        ]);
    }

    public function render()
    {
        $texts = Text::orderBy('id')->get();
        return view('livewire.admin-leden', compact('texts'));
    }
}
