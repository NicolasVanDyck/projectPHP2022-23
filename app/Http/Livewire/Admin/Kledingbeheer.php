<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Kledingbeheer extends Component
{
    public $sizes = [];
    public $selectedSizes = [];
    public string $productName;
    public int $productPrice;
    public string $size;
    public $sortField;
    protected $queryString = ['sortField', 'sortAsc'];
    public $search;
    public $sortAsc = true;
    public $active = true;
    /**
     * @var true
     */
    public bool $showModal = false;

    public function mount()
    {
        $this->productName = '';
        $this->productPrice = 0;
        $this->getSizes();
        $this->selectedSizes = [];
    }

    public $newProduct = [
        'id' => null,
        'name' => null,
        'price' => null,
        'size' => null,
    ];

    /**
     * The rules for validation
     *
     * @return string[]
     */
    protected function rules(): array {
        return [
            'newProduct.name' => 'required|string|max:255',
            'newProduct.price' => 'required|numeric',
            'newProduct.size' => 'required',
        ];
    }

    // Validation messages
    protected $messages = [
        'newProduct.name.required' => 'Dit veld mag niet leeg zijn.',
        'newProduct.price.required' => 'Dit veld mag niet leeg zijn.',
        'newProduct.size.required' => 'Selecteer tenminste één maat',
    ];

    public function createNewProduct(): void
    {
        $this->validate();

        Product::create([
            'name' => $this->newProduct['name'],
            'price' => $this->newProduct['price'],
        ]);

        $this->reset(['productName', 'productPrice', 'selectedSizes']);
    }

    /**
     * @param Product|null $product
     * @return void Sets the new product
     */
    public function setNewProduct(Product $product = null): void
    {
        $this->resetErrorBag();
        if($product) {
            $this->newProduct = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
            ];
        } else {
            $this->reset(['newProduct']);
        }

        $this->showModal = true;
    }

    public function updated($propertyName, $value,): void
    {
        if ($propertyName == 'perPage')
            $this->resetPage();

        $this->validateOnly($propertyName);
    }

    public function updateProduct(Product $product): void
    {
        $this->selectedSizes = $this->getSizesForSelectedProduct($product->id);

        try {
            $product->update([
                'name' => $this->newProduct['name'],
                'price' => $this->newProduct['price'],
            ]);

            $selectedSizes = $this->newProduct['size'] ?? [];

            $product->sizes()->sync($selectedSizes);

            $this->showModal = false;
            $this->reset(['newProduct']);
        } catch (QueryException $exception) {
            if ($exception->getCode() === '23000') {

                $orderSizes = $this->getSizesFromOrders();

                $orderSizesString = implode(', ', $orderSizes);

                session()->flash('message', 'De volgende maten zitten al in een bestelling: ' . $orderSizesString . '. Je kan deze maten niet meer verwijderen.
                                  Vink de maat aan of breng de klant op de hoogte.');

            } else {
                throw $exception;
            }
        }
    }

    /**
     * Returns all the unique sizes in the Orders table.
     *
     * @return array
     */
    public function getSizesFromOrders(): array
    {
        // The product_size_id's from the Orders table
        $sizes = Order::with('productsizes.size')->get()->pluck('product_size_id')->unique();

        $sizeIds = [];

        // The size_id's from the ProductSize table
        foreach ($sizes as $size) {
            $sizeIds[] = DB::table('product_size')->where('id', $size)->pluck('size_id');
        }

        $sizeNames = [];

        // The size names from the Size table
        foreach ($sizeIds as $sizeId) {
            $sizeNames[] = Size::find($sizeId)->pluck('size')->first();
        }

        return $sizeNames;
    }

    /**
     * Returns all the sizes from the ProductSize associated with one product.
     *
     * @param int $productId
     * @return \Illuminate\Support\Collection
     */
    public function getSizesForSelectedProduct(int $productId): \Illuminate\Support\Collection
    {

        $sizeCollection = Size::whereIn('id', function ($query) use ($productId) {
            $query->select('size_id')->from('product_size')->where('product_id', $productId);
        })->get();

        return $sizeCollection;
    }

    public function getSizes()
    {
        $this->sizes = Size::all();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }


    public function render()
    {
        $productsQuery = Product::with('sizes.products')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('price', 'like', '%' . $this->search . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });

        $products = $productsQuery->get();

        return view('livewire.admin.kledingbeheer', compact('products', ));
    }
}
