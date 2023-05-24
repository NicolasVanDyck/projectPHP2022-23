<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Size;
use Livewire\Component;

class Kledingbeheer extends Component
{
    public $sizes = [];
    public $products = [];
    public string $productName;
    public int $productPrice;
    public string $size;

    public function mount()
    {
        $this->productName = '';
        $this->productPrice = 0;
        $this->size = '';

        $this->sizes = Size::all();
        $this->products = Product::with('sizes')->get();
    }

    protected $rules = [
        'clothingName' => 'required|string',
        'clothingPrice' => 'required|integer',
        'size' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        $clothing = new Product();
        $clothing->name = $this->productName;
        $clothing->price = $this->productPrice;
        $clothing->save();

        $size = new Size();
        $size->size = $this->size;
        $size->save();

        session()->flash('message', 'Kledingstuk toegevoegd!');
    }







    public function render()
    {
        return view('livewire.admin.kledingbeheer');
    }
}
