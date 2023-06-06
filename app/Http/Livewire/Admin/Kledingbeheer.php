<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Kledingbeheer extends Component
{
    public $sizes = [];
    public $selectedSizes = [];
    public string $productName;
    public int $productPrice;
    public $sortField;
    public $search;
    public $sortAsc = true;
    public $active = true;
    public bool $showModal = false;
    public bool $errorModal = false;

    protected $listeners = [
        'delete-product' => 'deleteProduct',
    ];

    public function mount(): void
    {
        $this->productName = '';
        $this->productPrice = 0;
        $this->getSizes();
    }

    public $newProduct = [
        'id' => null,
        'name' => null,
        'price' => null,
        'size' => null,
    ];

    // Validation rules
    protected $rules = [
        'newProduct.name' => 'required|string|max:255',
        'newProduct.price' => 'required|numeric',
    ];

    // Validation messages
    protected $messages = [
        'newProduct.name.required' => 'Dit veld mag niet leeg zijn.',
        'newProduct.price.required' => 'Dit veld mag niet leeg zijn.',
        'newProduct.price.numeric' => 'Dit veld moet een geldig getal bevatten.',
    ];

    /**
     * Shows the modal
     *
     * @return void
     */
    public function showModal(): void
    {
        $this->showModal = !$this->showModal;
        $this->reset(['newProduct', 'selectedSizes']);
    }

    /**
     * Closes the error modal.
     *
     * @return void
     */
    public function closeErrorModal(): void
    {
        $this->errorModal = false;
    }

    /**
     * Creates a new product.
     *
     * @return Void
     */
    public function createNewProduct(): void
    {
        $this->resetErrorBag();
        $this->validate($this->rules, $this->messages);

        $newProduct = Product::create([
            'name' => $this->newProduct['name'],
            'price' => $this->newProduct['price'],
        ]);

        $newProduct->sizes()->sync($this->selectedSizes);

        $this->showModal = false;

        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html' => $this->newProduct['name'] . " werd aangemaakt!",
        ]);
    }

    /**
     * Deletes the product.
     *
     * @param Product $product
     * @return void
     */
    public function deleteProduct(Product $product): void
    {
        try {
            $product->sizes()->detach();
            $product->delete();
            $this->dispatchBrowserEvent('swal:toast', [
                'background' => 'danger',
                'html' => "$product->name werd verwijderd!",
            ]);
        } catch (QueryException $exception) {
            if ($exception->getCode() === '23000') {
                $this->errorModal = true;
            } else {
                throw $exception;
            }
        }
    }

    /**
     * Sets the values for the new product.
     *
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
            $this->selectedSizes = $this->getSizesForSelectedProduct($product->id)->pluck('id')->toArray();
        } else {
            $this->reset(['newProduct']);
        }

        $this->showModal = true;
    }

    /**
     * @param $propertyName
     * The name of the property that is updated.
     * @param $value
     * @return void
     */
    public function updated($propertyName, $value,): void
    {
        $this->validateOnly($propertyName);
    }

    /**
     * Updates the product.
     *
     * @param Product $product
     * @return void
     */
    public function updateProduct(Product $product): void
    {
        // Validation
        $this->validate($this->rules, $this->messages);

        try {
            $product->update([
                'name' => $this->newProduct['name'],
                'price' => $this->newProduct['price'],
            ]);

            $product->sizes()->sync($this->selectedSizes);

            $this->showModal = false;
            $this->dispatchBrowserEvent('swal:toast', [
                'background' => 'success',
                'html' => "$product->name werd aangepast!",
            ]);
            $this->reset(['newProduct', 'selectedSizes']);
        } catch (QueryException $exception) {
            if ($exception->getCode() === '23000') {
                $orderSizes = $this->getSizesForSelectedProduct($product->id)->pluck('size')->toArray();

                $orderSizesString = implode(', ', $orderSizes);
                $this->dispatchBrowserEvent('swal:toast', [
                    'background' => 'warning',
                    'html' => "'De volgende maten zitten al in een bestelling: ' . $orderSizesString . '. Je kan deze maten niet meer verwijderen.
                                  Vink de maat aan of breng de klant op de hoogte.'",
                ]);
//                session()->flash('message', 'De volgende maten zitten al in een bestelling: ' . $orderSizesString . '. Je kan deze maten niet meer verwijderen.
//                                  Vink de maat aan of breng de klant op de hoogte.');

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

        return Size::whereIn('id', function ($query) use ($productId) {
            $query->select('size_id')->from('product_size')->where('product_id', $productId);
        })->get();
    }

    /**
     * Gets all the sizes from the database.
     *
     * @return void
     */
    public function getSizes(): void
    {
        $this->sizes = Size::all();
    }

    /**
     * Sorts the table by the given field.
     *
     * @param string $field
     * @return void
     */
    public function sortBy(string $field): void
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
