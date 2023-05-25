<?php

namespace App\Http\Livewire;

use App\Models\ImageType;
use App\Models\Tour;
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
        'image_type_id' => null,
        'tour_id' => null,
        'name' => null,
        'description' => null,
        'path' => null,
        'in_carousel' => false,
    ];

    public $showModal = false;

    public $homecarousel = 0;

    protected function rules()
    {
        return [
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
//        'newImage.image.required' => 'Een foto is verplicht',
//        'newImage.image.image' => 'Een foto moet een jpeg of png zijn',
//        'newImage.image.size' => 'Een foto mag maximaal 1MB groot zijn',
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
//        $data->image_type_id = $this->newImage['image_type_id'];
//        $data->name = $this->newImage['name'];
//        $data->description = $this->newImage['description'];
//        $data->path = $this->newImage['path'];
//        $data->tour_id = $this->newImage['tour_id'];
//        $data->in_carousel = $this->newImage['in_carousel'];
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

                ->when(request($this->homecarousel) == 1, function($query) {
                    return $query->where('in_carousel', '=', $this->homecarousel);
                })
//            ->where('in_carousel', '=', $this->homecarousel)
            ->paginate($this->perPage);
        $imagetypes = ImageType::get();
        return view('livewire.foto-upload', compact('images', 'imagetypes','tours'));
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
