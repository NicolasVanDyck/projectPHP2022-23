<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Image;
use Livewire\WithPagination;

class FotoUpload extends Component
{

    use WithPagination;

    public $perPage = 8;

    protected function rules()
    {
        return [
            'image' => 'required|image:jpeg,png|size:1024',
            'image_type_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ];
    }

    protected $messages = [
        'image.required' => 'Een foto is verplicht',
        'image.image' => 'Een foto moet een jpeg of png zijn',
        'image.size' => 'Een foto mag maximaal 1MB groot zijn',
        'image_type_id.required' => 'Een type is verplicht',
        'name.required' => 'Een naam is verplicht',
        'description.required' => 'Een beschrijving is verplicht',
    ];


//  Delete (Of zoals bij Individuele trajecten??)
    public function deleteImage(Image $image)
    {
        $image->delete();
    }

    public function updated($propertyName, $propertyValue)
    {
        // dump($propertyName, $propertyValue);
        if (in_array($propertyName, ['perPage']))
            $this->resetPage();
    }

    public function render()
    {
        $images = Image::where('image_type_id', 3)->paginate($this->perPage);

        return view('livewire.foto-upload', compact('images'));
    }

//    public function store(Request $request)
//    {
//        $image = $request->file('image');
//        $imageName = $image->hashName();
//        $image->store('public/images');
//
//        $data = new Image();
//        $data->image_path = $imageName;
//        $data->save();
//
//        return redirect()->back()->with('success', 'Image uploaded successfully');
//    }
}
