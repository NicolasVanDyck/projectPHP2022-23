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
    public array $amounts = [];
    protected $order;
    private array $totals = [];
    public $productSizes;

    protected $rules = [
        'products' => 'array',
        'amounts.*' => 'required|integer|min:0',
        'selectedSize' => 'required',
        'selectedProduct' => 'required',
    ];

    public function mount(): void
    {
        $this->productSizes = ProductSize::all();
        $this->products = new Collection();
        $this->getProducts();
    }

    /**
     * Returns all the products from the ProductSize table.
     *
     * @return Collection
     */
    public function getProducts(): Collection
    {

        $products = [];
        foreach ($this->productSizes as $productSize)
        {
            // If the product is not in the array, add it. Else, skip it.
            if (!in_array($productSize->product_id, $products)) {
                $products[] = $productSize->product_id;
            }
        }

        // Select all the products from the product table that are in the productsize table.
        $products = Product::whereIn('id', $products)->get();

        $this->products = $products;

        $this->amounts = $products->pluck('id')->mapWithKeys(fn ($id) => [$id => 0])->toArray();
        $this->totals = $products->pluck('id')->mapWithKeys(fn ($id) => [$id => 0])->toArray();
        return $products;
    }

    /**
     * Returns the amount for a selected product.
     *
     * @param int $productId
     * @return int
     */
    public function getAmount(int $productId): int
    {
        return $this->amounts[$productId] ?? 0;
    }

    /**
     * Returns all the sizes from the ProductSize associated with one product.
     *
     * @param $productId
     */
    public function getSizesForSelectedProduct($productId, $index)
    {
        $this->selectedProduct[$index] = $productId;

        // Return all the sizes associated with the selected product.
        $sizes = [];
        foreach ($this->productSizes as $productSize)
        {
            if ($productSize->product_id == $productId)
            {
                $sizes[] = $productSize->size_id;
            }
        }

        // Select all the sizes from the size table that are in the productsize table.
//        $sizeCollection = Size::whereIn('id', $sizes)->get();

        // Make above query more efficient:
        $sizeCollection = Size::whereIn('id', function ($query) use ($productId) {
            $query->select('size_id')->from('product_size')->where('product_id', $productId);
        })->get();

        $this->sizeNames = $sizeCollection;
        return $sizeCollection;
    }

    /**
     * Get the total price of the order/selected products.
     *
     * @param $productId
     * @return int
     */
    public function getTotalForProduct($productId): int
    {
        if (isset($this->amounts[$productId])) {
            $amount = $this->amounts[$productId];

            $price = Product::select('price')->where('id', $productId)->value('price');

            return $amount * $price;
        }

        return 0;
    }

    /**
     * Get the total price of the order/selected products.
     *
     * @return int
     */
    public function getTotal(): int
    {
        $total = 0;
        foreach ($this->products as $product)
        {
            $total += $this->getTotalForProduct($product->id);
        }

        return $total;
    }

    /**
     * Update the Order table with the selected product_size id and amount.
     *
     * @param int|null $selectedProductSize
     * @param int $selectedAmount
     * @return void
     */
    public function updateOrder(?int $selectedProductSize, int $selectedAmount): void
    {
        // If the selected product size is not null, update the order.
        if ($selectedProductSize !== null)
        {
            // Find the order in the database (if it exists
            $this->order = DB::table('orders')->where('user_id', auth()->user()->id)->where('product_size_id', $selectedProductSize)->first();
        }

        // If the order is not in the database, create it.
        if (!$this->order)
        {
            DB::table('orders')->insert([
                'user_id' => auth()->user()->id,
                'product_size_id' => $selectedProductSize,
                'quantity' => $selectedAmount,
                'order_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            // Else, update the order.
            DB::table('orders')->where('user_id', auth()->user()->id)->where('product_size_id', $selectedProductSize)->update([
                'quantity' => $selectedAmount,
                'order_date' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Submit the form and update the order table.
     *
     * @return void
     */
    public function submitForm(): void
    {
        foreach ($this->selectedProduct as $index => $productId)
        {

            if (isset($this->selectedSize[$index]))
            {
                $selectedSize = $this->selectedSize[$index];

                // Find the corresponding product size
                $selectedProductSize = ProductSize::where('product_id', $productId)
                    ->where('size_id', $selectedSize)
                    ->value('id');

                $selectedAmount = $this->getAmount($productId);

                $this->updateOrder($selectedProductSize, $selectedAmount);
            } elseif (!empty($this->selectedSize) && empty($this->getAmount($productId))) {
//                dd($this->selectedSize, $this->getAmount($productId));
                session()->flash('message', 'Geef een hoeveelheid op voor het product.');
                return;
            } elseif (empty($this->selectedSize) && !empty($this->getAmount($productId))) {
                session()->flash('message', 'Geef een maat op voor het product.');
                return;
            } else {
                session()->flash('message', 'Je bestelling is geplaatst!');
            }
        }

        $this->reset(['selectedSize', 'selectedProduct', 'amounts']);

    }

    public function render()
    {
        return view('livewire.member.kleding', [
            'amounts' => $this->amounts,
        ])->layout('layouts.templatelayout');
    }
}
