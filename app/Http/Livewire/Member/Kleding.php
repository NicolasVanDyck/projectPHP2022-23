<?php

namespace App\Http\Livewire\Member;

use App\Models\Order;
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
     *
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateOrder(): void
    {
        $this->validate([
            'amount' => 'required|integer|min:1',
        ]);

        $this->order = DB::table('orders')->where('user_id', auth()->user()->id)->first();

        // If the order is not in the database, create it.
        if (!$this->order) {
            DB::table('orders')->insert([
                'user_id' => auth()->user()->id,
                'product_size_id' => $this->selectedSize,
                'amount' => $this->amount,
                'order_date' => now(),
            ]);
        } else {
            // Else, update the order.
            DB::table('orders')->where('user_id', auth()->user()->id)->update([
                'product_size_id' => $this->selectedSize,
                'amount' => $this->amount,
                'order_date' => now(),
            ]);
        }

        session()->flash('message', 'Je bestelling is geplaatst!');
    }

    /**
     * Get the orders for the current logged-in user.
     *
     * @return string
     */
    public function getOrderProductName(): string
    {
        $productName = Order::with('productsizes.products')->where('user_id', auth()->user()->id);

        return $productName->productsizes->product->name;

        //TODO get all the orders.
    }

    /**
     * Get the order amount for the current logged-in user.
     *
     * @return int
     */
    public function getOrderAmount(): int
    {
        $orderAmount = Order::where('user_id', auth()->user()->id)->quantity;

        return $orderAmount->quantity;

    }


    /**
     * Get the order size from the product_size_id for the current logged-in user.
     *
     * @return string
     */
    public function getOrderSize()
    {
        $orderSize = Order::with('productsizes.sizes')->where('user_id', auth()->user()->id)->first();

        return $orderSize;
    }


    public function render()
    {
        return view('livewire.member.kleding');
    }
}
