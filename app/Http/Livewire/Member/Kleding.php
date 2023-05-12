<?php

namespace App\Http\Livewire\Member;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Kleding extends Component
{
    public $sizes;
    public $selectedSize;
    public $products;
    public $selectedProduct;
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
            // If the product is not in the array, add it. Else, skip it.
            if (!in_array($productSize->product_id, $products)) {
                $products[] = $productSize->product_id;
            }
        }

        $this->products = $products;
        return $products;
    }

    /**
     * Returns all the sizes from the ProductSize associated with one product.
     *
     * @return array
     */
    public function getSizesForSelectedProduct($productId): array
    {

        $this->productSizes = ProductSize::all();

        // Return all the sizes associated with the selected product.
        $sizes = [];
        foreach ($this->productSizes as $productSize) {
            if ($productSize->product_id == $productId) {
                $sizes[] = $productSize->size_id;
            }
        }

        return $sizes;
    }


    /**
     * Update the Order table with the selected product_size id and amount.
     */


    public function render()
    {
        return view('livewire.member.kleding');
    }
}
