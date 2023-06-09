<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class MyOrder extends Component
{

    public $orders;
    public $sizes;
    public $products;

    public function mount()
    {
        $this->orders = auth()->user()->orders;
        $this->sizes = auth()->user()->orders->pluck('product_size_id');
        dd($this->sizes);
        $this->products = $this->getProductProperty();
    }

    public function getSizesProperty()
    {
        return $this->orders;
    }

    public function getProductProperty()
    {
        return $this->orders->pluck('productsizes.product.name');
    }

    public function updateQuantity($id)
    {
        $order = auth()->user()->orders()->where('id', $id)->first();
        $order->update([
            'quantity' => $this->orders->quantity,
        ]);
    }

    public function deleteOrder($id)
    {
        $order = auth()->user()->orders()->where('id', $id)->first();
        $order->delete();
        $this->orders = auth()->user()->orders;
    }

    public function render()
    {
        return view('livewire.member.my-order')
            ->layout('layouts.templatelayout');
    }
}
