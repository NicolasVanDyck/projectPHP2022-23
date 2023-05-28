<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Kledingbeheer extends Component
{
    public $sizes = [];
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

        $this->validate();
    }

    public function updateProduct(Product $product): void
    {

        try {
            $product->update([
                'name' => $this->newProduct['name'],
                'price' => $this->newProduct['price'],
            ]);

            $selectedSizes = $this->newProduct['size'] ?? [];

            // Find the product_size_id for each $selectedSize
            $productSizeIds = [];

            foreach ($selectedSizes as $selectedSize) {
                $product_size_id = $product->sizes()->where('size_id', $selectedSize)->first();
                $productSizeIds[] = $product_size_id;
            }

            $product->sizes()->sync($selectedSizes);

            $this->showModal = false;
            $this->reset(['newProduct']);
        } catch (QueryException $exception) {
            if ($exception->getCode() === '23000') {
                $existingSizes = [];
                foreach ($selectedSizes as $selectedSize) {
                    $size = Size::find($selectedSize);
                    $product_size_id = $product->sizes()->where('size_id', $selectedSize)->first();
                    if ($this->isInOrder($product_size_id)) {
                        $existingSizes[] = $size->size;
                    }

                    // TODO breng deze code nog op orde, de maten uit de order moeten nog in de flash message komen
                    // TODO prefill van de checkboxes moet nog gebeuren
                }
                $existingSizesString = implode(', ', $existingSizes);
                session()->flash('message', 'De volgende maten zitten al in een bestelling: ' . $existingSizesString . '. Je kan deze maten niet meer verwijderen. Breng de klant op de hoogte.');
            } else {
                throw $exception;
            }
        }
    }

    public function isInOrder($product_size_id): bool
    {
        return Order::where('product_size_id', $product_size_id)->exists();
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
//        dd($products);

        return view('livewire.admin.kledingbeheer', compact('products', ));
    }
}
