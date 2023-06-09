<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Text;

class Texts extends Component
{
    public $editText = [
        'id' => null,
        'description' => null
    ];

    protected $rules = [
        'editText.description' => 'required|unique:texts,location',
    ];

    public function editExistingText(Text $text)
    {
        $this->editText = [
            'id' => $text->id,
            'description' => $text->description,
        ];
    }

    public function resetEditText()
    {
        $this->reset('editText');
        $this->resetErrorBag();
    }

    public function updateText(Text $text)
    {
        $this->validateOnly('description');

        $text->update([
            'description' => $this->editText['description'],
        ]);

        $this->resetEditText();
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html' => " De tekst op de $text->location-pagina werd aangepast!",
        ]);
    }


    public function render()
    {
        $texts = Text::orderBy('id')->get();
        $home = Text::where('id', 1)->first();
        $contact = Text::where('id', 2)->first();
        $individuele_trajecten = Text::where('id', 3)->first();
        $kleding = Text::where('id', 4)->first();
        $groep = Text::where('id', 5)->first();

        return view('livewire.admin.texts', compact('texts', 'home','contact','individuele_trajecten','kleding','groep'));
    }
}
