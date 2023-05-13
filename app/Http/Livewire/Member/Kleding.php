<?php

namespace App\Http\Livewire\Member;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Kleding extends Component
{
    public Collection $sizeNames;
    public array $selectedSize = [];
    public Collection $products;
    public array $selectedProduct = [];
    public int $selectedProductPrice;
    public $selectedProductSize;
    public array $amount;
    public array $amounts;
    public $order;
    public \Illuminate\Database\Eloquent\Collection $productSizes;

    protected $rules = [
        'products' => 'array',
        'amounts*' => 'required|integer|min:0',
        'amount' => 'required|integer|min:1',
        'selectedSize' => 'required',
        'selectedProduct' => 'required',
    ];


    public function mount(): void
    {
        $this->productSizes = ProductSize::all();
        $this->products = new Collection();
        $this->selectedSize = [];
        $this->selectedProduct = [];
        $this->amount = [];
        $this->getProducts();
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

        // Select all the products from the product table that are in the productsize table.
        $products = Product::whereIn('id', $products)->get();

        $this->products = $products;
        $this->amounts = $products->pluck('id')->mapWithKeys(fn ($id) => [$id => 0])->toArray();
        return $products;
    }

    /**
     * Returns all the sizes from the ProductSize associated with one product.
     *
     * @return Collection
     */
    public function getSizesForSelectedProduct($productId): Collection
    {
        $this->selectedProduct = [$productId];
        $this->productSizes = ProductSize::all();

        // Return all the sizes associated with the selected product.
        $sizes = [];
        foreach ($this->productSizes as $productSize) {
            if ($productSize->product_id == $productId) {
                $sizes[] = $productSize->size_id;
            }
        }

        // Select all the sizes from the size table that are in the productsize table.
        $sizeCollection = Size::whereIn('id', $sizes)->get();

        $this->sizeNames = $sizeCollection;
        return $sizeCollection;
    }


    /**
     * Update the Order table with the selected product_size id and amount.
     *
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateOrder(): void
    {
        $this->order = DB::table('orders')->where('user_id', auth()->user()->id)->first();


        foreach ($this->selectedProduct as $index => $productId) {
            $selectedSize = $this->selectedSize[$index];
            $selectedAmount = $this->amount[$index];

            // Find the corresponding product size
            $selectedProductSize = ProductSize::where('product_id', $productId)
                ->where('size_id', $selectedSize)
                ->value('id');

            // If the order is not in the database, create it.
            if (!$this->order) {
                DB::table('orders')->insert([
                    'user_id' => auth()->user()->id,
                    'product_size_id' => $selectedProductSize,
                    'quantity' => $selectedAmount,
                    'order_date' => now(),
                ]);
            } else {
                // Else, update the order.
                DB::table('orders')->where('user_id', auth()->user()->id)->update([
                    'product_size_id' => $selectedProductSize,
                    'quantity' => $selectedAmount,
                    'order_date' => now(),
                ]);
            }
        }

        // Find the product_size_id from the selected product and size.
//        $this->selectedProductSize = ProductSize::where('product_id', $this->selectedProduct)->where('size_id', $this->selectedSize)->value('id');


    }

    public function sendForm(): void
    {
        $this->updateOrder();

        $this->reset(['selectedSize', 'selectedProduct', 'amount']);

        session()->flash('message', 'Je bestelling is geplaatst!');
    }

    /**
     * Get the orders for the current logged-in user.
     *
     * @return array of products
     */
    public function getOrderProductNames(): array
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
        return view('livewire.member.kleding')->layout('layouts.templatelayout');
    }
}
