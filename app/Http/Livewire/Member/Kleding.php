<?php

namespace App\Http\Livewire\Member;

use App\Models\Product;
use App\Models\Size;
use Livewire\Component;

class Kleding extends Component
{
    public $sizes;
    public $selectedSize;
    public $items;
    public $selectedItem;
    public $amount;
    public $order;

    public function mount()
    {
        $this->sizes = Size::all();
        $this->items = Product::all();
    }


    public function render()
    {
        return view('livewire.member.kleding');
    }
}
