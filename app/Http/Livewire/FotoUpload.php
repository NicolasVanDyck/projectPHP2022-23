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
//            MIME = multipurpose internet mail extensions
            'photos.*' => 'required|file|mimes:jpg,png|max:1024', // 1MB Max
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
//            Onderstaande code is nodig om de extensie van de foto te verwijderen. Parameter die je opgeeft aan basename wordt verwijderd.
            $name = Str::of($name)->basename('.' . $photo->getClientOriginalExtension());
//            Opslaan in sponsor of imagefolder van de storage:
            if($this->uploadType == 1) {
                $path = '/storage/sponsor/' . $photo->getClientOriginalName();
                $photo->storeAs('public/sponsor', $photo->getClientOriginalName());
            } else {
                $path = '/storage/galerij/' . $photo->getClientOriginalName();
                $photo->storeAs('public/galerij', $photo->getClientOriginalName());
            }

            Image::create([
                'image_type_id' => $this->uploadType,
                'name' => $name,
                'description' => $name,
                'path' => $path,
                'in_carousel' => 1,
            ]);

        }
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

//    public function deleteImage(Image $image)
//    {
////        Op deze manier wordt de foto uit de storage verwijderd na upload.
//        $image = Image::find($image->id);
//        if($image->image_type_id == 1) {
//            Storage::disk('local')->delete('public/sponsor/' . $image->name . '.jpg');
//        }
//        if($image->image_type_id == 2) {
//            Storage::disk('local')->delete('public/galerij/' . $image->name . '.jpg');
//        }
//        $image->delete();
//    }

    public function deleteImage($path)
    {
        $image = Image::where('path', $path)->first();
        $image->delete();
        $path = Str::after($path, '/storage/');
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
        $tours = Tour::get();
        $images = Image::where('image_type_id', 'like', $this->type)
//            Zodat de laatste foto's eerst getoond worden
            ->orderBy('created_at', 'desc')
            ->when($this->homecarousel == 1, function($query) {
                    return $query->where('in_carousel', '=', $this->homecarousel);
                })
            ->paginate($this->perPage);
        $imagetypes = ImageType::get();
        return view('livewire.foto-upload', compact('images', 'imagetypes','tours'));
    }

}
