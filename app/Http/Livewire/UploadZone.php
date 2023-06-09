<?php

namespace App\Http\Livewire;


use App\Models\GPX;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use phpGPX\phpGPX;
use Str;

class UploadZone extends Component
{
    use WithFileUploads;

    public $files = [];
    public $attachment;
    public $iteration = 0;
    protected $gpx;
    protected $messages = [
        'files.*' => 'Only gpx files are allowed',
    ];
    protected $validationAttributes = [
        'files.*' => 'file'
    ];

    public function save()
    {
//        dd($this->files);
        $this->validate();

        foreach ($this->files as $file) {


            $path = $file->storeAs('public/gpx', $file->getClientOriginalName());
            $path = Str::after($path, 'public/');
            if (!GPX::where('path', $path)->exists()) {
                GPX::create([
                    'user_id' => auth()->user()->id,
                    'path' => $path,
                    'route' => $this->loadGpx($path)->tracks[0]->segments[0]->points,
                    'amount_of_km' => $this->loadGpx($path)->tracks[0]->segments[0]->stats->distance,
                    'name' => $this->loadGpx($path)->tracks[0]->name,
                ]);
                $gpx_id = GPX::where('path', $path)->pluck('id');
                Tour::create([
                    'g_p_x_id' => $gpx_id[0],
                ]);
            }
        }
        //clean up
        $this->attachment = null;
        $this->iteration++;

    }

    public function loadGpx($path)
    {
        $this->gpx = new phpGPX();
        $result = $this->gpx->load('../storage/app/public/' . $path);
//        dd($result);
        return $result;
    }

    public function render()
    {
        return view('livewire.upload-zone');
    }

    protected function rules()
    {
        return [
            'files.*' => 'required|file|mimes:gpx,xml',
        ];
    }
}
