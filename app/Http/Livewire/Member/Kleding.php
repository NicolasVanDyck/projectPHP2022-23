<?php

namespace App\Http\Livewire\Member;

use App\Models\Order;
use App\Models\Parameter;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use LaravelIdea\Helper\App\Models\_IH_Size_C;
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
    public $deadlineDate;

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
        $this->getDeadlineDate();
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
     * @param $index
     * @return Collection
     */
    public function getSizesForSelectedProduct($productId, $index): Collection
    {
        $this->selectedProduct[$index] = $productId;

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
    public function getTotalForProduct($productId): int|float
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
     * Gets the deadline date from the database.
     */
    public function getDeadlineDate()
    {
        $deadline = Parameter::get()->value('end_date_order');

        $this->deadlineDate = $deadline;

        return $deadline;
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
        $this->validate($this->rules);
        // If the selected product size is not null, the order is updated.
        if ($selectedProductSize !== null)
        {
            // Finds the order in the database (if it exists)
            $this->order = DB::table('orders')->where('user_id', auth()->user()->id)->where('product_size_id', $selectedProductSize)->first();
        }

        try {
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
        } catch (QueryException $exception) {
            if ($exception->getCode() === '23000') {
                $this->dispatchBrowserEvent('swal:toast', [
                    'background' => 'error',
                    'html' => "Er is iets misgegaan. Probeer het opnieuw.",
                ]);
            } else {
                throw $exception;
            }
        }

    }


    /**
     * Submit the form and update the order table.
     *
     * @return void
     */
    public function submitForm(): void
    {
        $todaysDate = now()->format('Y-m-d');

        $arrayOfOrders = []; // Key value pair array for orders containing selected ProductSize and SelectedAmount

        if ($todaysDate > $this->deadlineDate)
        {
            $this->dispatchBrowserEvent('swal:toast', [
                'background' => 'error',
                'html' => "De deadline is verstreken! Je kunt nu geen bestellingen meer plaatsen.",
            ]);
        } else {
            foreach ($this->selectedProduct as $index => $productId) {

                if (isset($this->selectedSize[$index])) {
                    $selectedSize = $this->selectedSize[$index];

                    // Find the corresponding product size
                    $selectedProductSize = ProductSize::where('product_id', $productId)
                        ->where('size_id', $selectedSize)
                        ->value('id');

                    $selectedAmount = $this->getAmount($productId);

                    if ($selectedAmount === 0) {

                        $this->dispatchBrowserEvent('swal:toast', [
                            'background' => 'error',
                            'html' => "Je hebt geen aantal ingevuld voor " . Product::where('id', $productId)->value('name') . ".",
                        ]);

                        $this->reset('selectedSize', 'selectedProduct', 'amounts');

                        // Abort everything
                        return;
                    } else {
                        $arrayOfOrders[$selectedProductSize] = $selectedAmount;
                    }
                }
            }
        }

        foreach ($arrayOfOrders as $size => $amount)
        {
            $this->updateOrder($size, $amount);
            $this->dispatchBrowserEvent('swal:toast', [
                'background' => 'success',
                'html' => "Je bestelling is geplaatst!",
            ]);
        }

        $this->reset(['selectedSize', 'selectedProduct', 'amounts']);

    }

    /**
     * Checks if auth user has orders
     *
     * @return bool
     */
    public function hasOrders(): bool
    {
        return Order::where('user_id', auth()->user()->id)->exists();
    }


    public function redirectToMyOrder()
    {
        return redirect()->route('mijn-bestelling');
    }


    public function render()
    {
        return view('livewire.member.kleding', [
            'amounts' => $this->amounts,
        ])->layout('layouts.templatelayout');
    }
}
