<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Text;

class Texts extends Component
{
    public $editText = ['id' => null, 'description' => null];

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
//        $this->emit('saved');
    }


    public function render()
    {
        $texts = Text::orderBy('id')->get();


        return view('livewire.admin.texts', compact('texts'));


    }



}
