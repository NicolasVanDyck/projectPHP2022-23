<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Size;
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
    }

    public $newProduct = [
        'id' => null,
        'name' => null,
        'price' => null,
        'size' => null,
    ];

    protected function rules() {
        return [
            'newProduct.name' => 'required|string|max:255',
            'newProduct.price' => 'required|integer',
            'newProduct.size' => 'required|string|max:255',
        ];
    }

    // Validation messages
    protected $messages = [
        'newProduct.name.required' => 'Dit veld mag niet leeg zijn.',
        'newProduct.price.required' => 'Dit veld mag niet leeg zijn.',
        'newProduct.size.required' => 'Dit veld mag niet leeg zijn.',
    ];

    public function createNewProduct()
    {
        $this->validate();

        Product::create([
            'name' => $this->newProduct['name'],
            'price' => $this->newProduct['price'],
        ]);

        $this->reset(['productName', 'productPrice', 'selectedSizes']);
    }

    public function setNewProduct(Product $product = null)
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

    public function updated($propertyName, $value,)
    {
        if (in_array($propertyName, ['perPage']))
            $this->resetPage();

        $this->validate();
    }

    public function updateProduct(Product $product)
    {
        $this->validate();

        $product->update([
            'name' => $this->newProduct['name'],
            'price' => $this->newProduct['price'],
//            'size' => $this->newProduct['size'],
        ]);

//        $this->showModal = true;

//        $this->reset(['productName', 'productPrice', 'selectedSizes']);
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
