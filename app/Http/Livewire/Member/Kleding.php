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
    public \Illuminate\Database\Eloquent\Collection $productSizes;

    protected $rules = [
        'products' => 'array',
        'amounts.*' => 'required|integer|min:0',
        'amount' => 'required|integer|min:1',
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
//        $this->productSizes = ProductSize::all();

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
//        dd($this->amounts);
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
//        dd($this->amounts[$productId]);
//        dd($this->amounts[$productId] ?? 0);
//        dd($this->selectedProduct[$productId]['amount'] ?? 0);
    }

    /**
     * Returns all the sizes from the ProductSize associated with one product.
     *
     * @param $productId
     * @return Collection
     */
    public function getSizesForSelectedProduct($productId, $index): Collection
    {
//        $index = $productId - 1;
        $this->selectedProduct[$index] = $productId;
//        $this->productSizes = ProductSize::all();

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
        $sizeCollection = Size::whereIn('id', $sizes)->get();

        $this->sizeNames = $sizeCollection;
        return $sizeCollection;
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
//        dd($selectedProductSize, $selectedAmount);
        // If the selected product size is not null, update the order.
        if ($selectedProductSize !== null)
        {
            // Find the order in the database (if it exists
            $this->order = DB::table('orders')->where('user_id', auth()->user()->id)->first();
        }

        // TODO: update this so a new order gets placed if the productsize id and the user id are not in the order table.

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
            DB::table('orders')->where('user_id', auth()->user()->id)->update([
                'product_size_id' => $selectedProductSize,
                'quantity' => $selectedAmount,
                'order_date' => now(),
                'updated_at' => now(),
            ]);
        }
    }


    public function submitForm(): void
    {
        foreach ($this->selectedProduct as $index => $productId)
        {
//            $selectedSize = $this->selectedSize[$index] ?? null;
////            dd($selectedSize, $productId);
//            if (null !== $selectedSize)
//            {
            if (isset($this->selectedSize[$index]))
            {
                $selectedSize = $this->selectedSize[$index];

//                dd($selectedSize, $productId);

                // Find the corresponding product size
                $selectedProductSize = ProductSize::where('product_id', $productId)
                    ->where('size_id', $selectedSize)
                    ->value('id');

                $selectedAmount = $this->getAmount($productId);
//                dd($selectedProductSize, $selectedAmount);
                $this->updateOrder($selectedProductSize, $selectedAmount);
            } else {
                session()->flash('message', 'Je hebt geen maat geselecteerd!');
            }

        }

        $this->reset(['selectedSize', 'selectedProduct', 'amounts']);

        session()->flash('message', 'Je bestelling is geplaatst!');
    }


    public function render()
    {
        return view('livewire.member.kleding', [
            'amounts' => $this->amounts,
        ])->layout('layouts.templatelayout');
    }
}
