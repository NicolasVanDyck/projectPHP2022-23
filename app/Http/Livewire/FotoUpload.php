<?php

namespace App\Http\Livewire;

use App\Models\ImageType;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Image;
use Livewire\WithPagination;

class FotoUpload extends Component
{

    use WithPagination;

    public $perPage = 8;

    public $type = '%';

    public $newImage = [
        'id' => null,
        'image' => null,
        'image_type_id' => null,
        'name' => null,
        'description' => null,
    ];

    public $showModal = false;


    protected function rules()
    {
        return [
            'newImage.image' => 'required|image:jpeg,png|size:1024',
            'newImage.image_type_id' => 'required',
            'newImage.name' => 'required|string|max:255',
            'newImage.description' => 'required|string|max:255',
        ];
    }

    protected $messages = [
        'newImage.image.required' => 'Een foto is verplicht',
        'newImage.image.image' => 'Een foto moet een jpeg of png zijn',
        'newImage.image.size' => 'Een foto mag maximaal 1MB groot zijn',
        'newImage.image_type_id.required' => 'Een type is verplicht',
        'newImage.name.required' => 'Een naam is verplicht',
        'newImage.description.required' => 'Een beschrijving is verplicht',
    ];

//    Nog toevoegen tour_id, gallery=bool, sponsor=bool?

//    public function createImage(??Request $request??)
//    {
//        $this->validate();
//        $image = $this->newImage['image'];
//        $imageName = $image->hashName();
//        $image->store('public/images');
//
//        $data = new Image();
//        $data->image_path = $imageName;
//        $data->image_type_id = $this->newImage['image_type_id'];
//        $data->name = $this->newImage['name'];
//        $data->description = $this->newImage['description'];
//        $data->save();
//
//        $this->showModal = false;
//        $this->reset('newImage');
//    }

    public function setNewImage(Image $image = null)
    {
        $this->resetErrorBag();
        if($image) {
            $this->newImage['id'] = $image->id;
            $this->newImage['name'] = $image->name;
            $this->newImage['description'] = $image->description;
            $this->newImage['image_type_id'] = $image->image_type_id;
            $this->newImage['path'] = $image->path;
        } else {
            $this->reset('newImage');
        }
        $this->showModal = true;
    }

    public function updateImage(Image $image)
    {
        $this->validate();
        $image->update([
//            'id' => $this->newImage['id'],
            'name' => $this->newImage['name'],
            'description' => $this->newImage['description'],
            'image_type_id' => $this->newImage['image_type_id'],
        ]);
    }


//  Delete (Of zoals bij Individuele trajecten??)
    public function deleteImage(Image $image, $path)
    {
        $image = Image::where('path', $image->path)->first();
        $image->delete();
        Storage::disk('public')->delete($path);
    }

    public function updated($propertyName, $propertyValue)
    {
        // dump($propertyName, $propertyValue);
        if (in_array($propertyName, ['perPage']))
            $this->resetPage();
    }

    public function render()
    {
//        is imagetype route nog wel nuttig?
        $images = Image::where('image_type_id', 'like', $this->type)->paginate($this->perPage);
        $imagetypes = ImageType::get();
        return view('livewire.foto-upload', compact('images', 'imagetypes'));
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
