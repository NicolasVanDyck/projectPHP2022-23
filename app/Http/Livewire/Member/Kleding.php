<?php

namespace App\Http\Livewire\Member;

use App\Models\Product;
use App\Models\ProductSize;
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
    public \Illuminate\Database\Eloquent\Collection $productSizes;

    public function mount()
    {
        $this->productSizes = ProductSize::all();
    }

    /**
     * Returns all the products from the ProductSize table.
     *
     * @return array
     */
    public function getProducts()
    {
        $this->productSizes = ProductSize::all();

        $products = [];
        foreach ($this->productSizes as $productSize) {
            $products[] = $productSize->product;
        }
        return $products;
    }


    public function render()
    {
        return view('livewire.member.kleding');
    }
}
