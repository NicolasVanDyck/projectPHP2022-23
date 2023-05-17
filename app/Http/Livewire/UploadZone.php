<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class UploadZone extends Component
{
    use WithFileUploads;

    public $files = [];
    public $attachment;
    public $iteration = 0;
    protected $rules = [
        'files.*' => 'required|file|mimes:gpx,xml'
    ];
    protected $messages = [
        'files.*.mimes' => 'Only gpx files are allowed'
    ];
    protected $validationAttributes = [
        'files.*' => 'file'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();

        foreach ($this->files as $file) {
            $file->storeAs('public/gpx', Str::random(40) . '.gpx');
        }
        //clean up
        $this->attachment = null;
        $this->iteration++;

    }

    public function render()
    {
        return view('livewire.upload-zone');
    }
}
