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

    public $type = 1;

    public $tour = '%';
    public $photos = [];
    public $showModal = false;

    protected $listeners = [
        'delete-image' => 'deleteImage',
    ];

//    Op 0, zodat checkbox standaard niet aangevinkt staat.
    public $homecarousel = 0;

//    Op 1, omdat gewone images meer zullen voorkomen dan sponsorimages.
    public $uploadType = 1;

//    Waarde invullen, anders null en dan toont hij de images niet.
    public $uploadTour = 1;

    public $newImage = [
        'id' => null,
        'image_type_id' => null,
        'tour_id' => null,
        'name' => null,
        'description' => null,
        'path' => null,
        'in_carousel' => false,
    ];

//    Validationrules
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

//    Validationberichten
    protected $messages = [
        'photos.*.required' => 'Een foto is verplicht',
        'photos.*.mimes' => 'Een foto moet een jpeg of png zijn',
        'photos.*.max' => 'Een foto mag maximaal 1MB groot zijn',
        'newImage.image_type_id.required' => 'Een type is verplicht',
        'newImage.name.required' => 'Een naam is verplicht',
        'newImage.name.unique' => 'Deze naam bestaat al. Je geeft je foto best een andere naam.',
        'newImage.description.required' => 'Een beschrijving is verplicht',
        'newImage.path.unique' => 'Het pad naar deze foto bestaat al. Je geeft je foto best een andere naam.',
    ];

    public function saveImage()
    {
        $this->validate([
            'photos.*' => 'required|file|mimes:jpg,png|max:1024',
            ]);

//        Alle images overlopen en opslaan in de database en de juiste storagefolder.
        foreach($this->photos as $photo) {
            $name = $photo->getClientOriginalName();
//            Onderstaande code is nodig om de extensie van de foto te verwijderen. Parameter die je opgeeft aan basename wordt verwijderd.
            $name = Str::of($name)->basename('.' . $photo->getClientOriginalExtension());
//            Opslaan in sponsor of imagefolder van de storage:
            if($this->uploadType == '') {
                $path = '/storage/galerij/' . $photo->getClientOriginalName();
                $photo->storeAs('public/galerij', $photo->getClientOriginalName());
                Image::create([
                    'name' => $name,
                    'description' => $name,
                    'path' => $path,
                    'in_carousel' => 1,
                ]);
            } elseif ($this->uploadType == 1){
                $path = '/storage/galerij/' . $photo->getClientOriginalName();
                $photo->storeAs('public/galerij', $photo->getClientOriginalName());
                Image::create([
                    'image_type_id' => $this->uploadType,
                    'tour_id' => $this->uploadTour,
                    'name' => $name,
                    'description' => $name,
                    'path' => $path,
                    'in_carousel' => 1,
                ]);
            } else {
                $path = '/storage/sponsor/' . $photo->getClientOriginalName();
                $photo->storeAs('public/sponsor', $photo->getClientOriginalName());
                Image::create([
                    'image_type_id' => $this->uploadType,
                    'name' => $name,
                    'description' => $name,
                    'path' => $path,
                    'in_carousel' => 1,
                ]);
            }
            $this->dispatchBrowserEvent('swal:toast', [
                'background' => 'success',
                'html' => "Foto('s) werd(en) succesvol toegevoegd!",
            ]);
        }
    }

//    Afbeelding aanpassen. Geef de juiste waarden mee aan de variabelen + toon modal.
    public function editImage(Image $image)
    {
        $this->resetErrorBag();

        $this->newImage['id'] = $image->id;
        $this->newImage['image_type_id'] = $image->image_type_id;
        $this->newImage['tour_id'] = $image->tour_id;
        $this->newImage['name'] = $image->name;
        $this->newImage['description'] = $image->description;
        $this->newImage['path'] = $image->path;
        $this->newImage['in_carousel'] = $image->in_carousel;

        $this->showModal = true;
    }

//    Vul de aangepaste waarden in en update de image.
    public function updateImage(Image $image)
    {
        $this->validate();

        $image->update([
            'image_type_id' => $this->newImage['image_type_id'],
            'tour_id' => $this->newImage['tour_id'],
            'name' => $this->newImage['name'],
            'description' => $this->newImage['description'],
            'path' => $this->newImage['path'],
            'in_carousel' => $this->newImage['in_carousel'],
        ]);

//        Als de waarde van de optie 0 is, zal er 'null' in de database komen te staan.
        if ($this->newImage['tour_id'] == 0) {
            $image->update([
                'tour_id' => null,
            ]);
        }
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html' => $this->newImage['name'] . " werd aangepast!",
        ]);
    }

//    Verwijder uit de database én de storage
    public function deleteImage($path)
    {
        $image = Image::where('path', $path)->first();
        $image->delete();
//        folder erafknippen om zo uit de storage te verwijderen
        $path = Str::after($path, '/storage/');
        Storage::disk('public')->delete($path);
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'danger',
            'html' => "$image->name verwijderd!",
        ]);

    }

//    Paginator bijwerken
    public function updated($propertyName, $propertyValue)
    {
        // dump($propertyName, $propertyValue);
        if (in_array($propertyName, ['perPage']))
            $this->resetPage();
    }

    public function render()
    {
        $tours = Tour::get();

//      Ritten ophalen
        if($this->type == 1) {
            $images = Image::orderBy('created_at', 'desc')
                ->where('tour_id', 'like', $this->tour)
                ->when($this->homecarousel == 1, function($query) {
                    return $query->where('in_carousel', '=', $this->homecarousel);
                })
                ->paginate($this->perPage);
        }
        //        Sponsor ophalen, houdt verder geen rekening met tour_id, want is niet nodig.
        elseif($this->type == 2) {
            $images = Image::where('image_type_id', '=', $this->type)
                ->orderBy('created_at', 'desc')
                ->when($this->homecarousel == 1, function($query) {
                    return $query->where('in_carousel', '=', $this->homecarousel);
                })
                ->paginate($this->perPage);
//      Images zonder type ophalen (overige)
        } else {
            $images = Image::orderBy('created_at', 'desc')
                ->where('image_type_id', null)
                ->when($this->homecarousel == 1, function($query) {
                    return $query->where('in_carousel', '=', $this->homecarousel);
                })
                ->paginate($this->perPage);
        }
        $imagetypes = ImageType::get();
        return view('livewire.foto-upload', compact('images', 'imagetypes','tours'));
    }
}
