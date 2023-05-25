<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Size;
use Livewire\Component;

class Kledingbeheer extends Component
{
    public $sizes = [];
//    public array $products;
    public string $productName;
    public int $productPrice;
    public string $size;
    public $sortField;
    protected $queryString = ['sortField', 'sortAsc'];
    public $search;
    public $sortAsc = true;
    public $active = true;

    public function mount()
    {
        $this->productName = '';
        $this->productPrice = 0;
    }

    protected $rules = [
        'clothingName' => 'required|string',
        'clothingPrice' => 'required|integer',
        'selectedSizes' => 'required|array|min:1',
        'selectedSizes.*' => 'string',
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function store()
    {
        $this->validate();

        $product = new Product();
        $product->name = $this->productName;
        $product->price = $this->productPrice;
        $product->save();

        $product->sizes()->sync($this->sizes);

        session()->flash('message', 'Product toegevoegd!');
        $this->reset(['productName', 'productPrice', 'selectedSizes']);
    }

    public function render()
    {
        $sizes = Size::all();

        $productsQuery = Product::with('sizes')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('price', 'like', '%' . $this->search . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });

        $products = $productsQuery->get();
//        dd($products);

        return view('livewire.admin.kledingbeheer', compact('products', 'sizes'));
    }
}
