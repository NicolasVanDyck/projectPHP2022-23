<?php

namespace App\Http\Livewire;

use App\Models\ImageType;
use App\Models\Tour;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Image;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Str;

class FotoUpload extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $perPage = 8;
    public $attachment;
    public $iteration = 0;

    public $type = '%';
    public $photos = [];
    public $showModal = false;
    public $homecarousel = 0;

    public $uploadType = 2;

    public $newImage = [
        'id' => null,
        'image_type_id' => null,
        'tour_id' => null,
        'name' => null,
        'description' => null,
        'path' => null,
        'in_carousel' => false,
    ];

    protected function rules()
    {
        return [
            'photos.*' => 'required|file|mimes:jpg,png|max:1024', // 1MB Max
//            'newImage.image' => 'required|image:jpeg,png|size:1024',
            'newImage.image_type_id' => 'required',
            'newImage.tour_id' => 'nullable',
            'newImage.name' => 'required|string|max:255|unique:images,name,' . $this->newImage['id'] . ',id',
            'newImage.description' => 'required|string|max:255',
//            Hoe werkt dit na het punt?
            'newImage.path' => 'nullable|string|max:255|unique:images,path,' . $this->newImage['id'] . ',id',
        ];
    }

    protected $messages = [
        'photos.*.required' => 'Een foto is verplicht',
        'photos.*.mimes' => 'Een foto moet een jpeg of png zijn',
        'photos.*.max' => 'Een foto mag maximaal 1MB groot zijn',
//        'newImage.image.required' => 'Een foto is verplicht',
//        'newImage.image.image' => 'Een foto moet een jpeg of png zijn',
//        'newImage.image.size' => 'Een foto mag maximaal 1MB groot zijn',
        'newImage.image_type_id.required' => 'Een type is verplicht',
        'newImage.name.required' => 'Een naam is verplicht',
        'newImage.description.required' => 'Een beschrijving is verplicht',
        'newImage.path.unique' => 'Het pad naar deze foto bestaat al. Je geeft je foto best een andere naam.',
    ];

    public function saveImage()
    {
        $this->validate([
            'photos.*' => 'required|file|mimes:jpg,png|max:1024',
            ]);

        foreach($this->photos as $photo) {
            $name = $photo->getClientOriginalName();
            $path = '/storage/galerij/' . $photo->getClientOriginalName();
            $photo->storeAs('public/galerij', $photo->getClientOriginalName());

            Image::create([
                'image_type_id' => $this->uploadType,
                'name' => $name,
                'description' => $name,
                'path' => $path,
                'in_carousel' => 1,
            ]);

        }
        $this->attachment = null;
        $this->iteration++;
    }

//    image.intervention.io

    public function setNewImage(Image $image = null)
    {
        $this->resetErrorBag();
        if($image) {
            $this->newImage['id'] = $image->id;
            $this->newImage['image_type_id'] = $image->image_type_id;
            $this->newImage['tour_id'] = $image->tour_id;
            $this->newImage['name'] = $image->name;
            $this->newImage['description'] = $image->description;
            $this->newImage['path'] = $image->path;
//            Waarom werkt in carousel hier niet?
            $this->newImage['in_carousel'] = $image->in_carousel;
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
            'image_type_id' => $this->newImage['image_type_id'],
            'tour_id' => $this->newImage['tour_id'],
            'name' => $this->newImage['name'],
            'description' => $this->newImage['description'],
            'path' => $this->newImage['path'],
            'in_carousel' => $this->newImage['in_carousel'],
        ]);
    }


//  Delete (Of zoals bij Individuele trajecten??)
    public function deleteImage(Image $image)
    {
        if(Storage::exists( $image->path)){
            Storage::delete($image->path);

        }else{
            dd($image->path . ' does not exists.');
        }
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
        $tours = Tour::get();
        $images = Image::where('image_type_id', 'like', $this->type)
                ->when($this->homecarousel == 1, function($query) {
                    return $query->where('in_carousel', '=', $this->homecarousel);
                })
            ->paginate($this->perPage);
        $imagetypes = ImageType::get();
        return view('livewire.foto-upload', compact('images', 'imagetypes','tours'));
    }

}
