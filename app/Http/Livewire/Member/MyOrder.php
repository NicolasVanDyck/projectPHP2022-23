<?php

namespace App\Http\Livewire\Member;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Livewire\Component;

class MyOrder extends Component
{

    public $orders;
    public $sizes;
    public $products;
    public bool $myOrderInfoModal = false;

    private \Illuminate\Support\Collection $product;
    public int|float $sumOfOrders;

    public function mount()
    {
        $this->orders = $this->getOrdersForUser();

    }

    public function myOrderInfoModal(): void
    {
        $this->myOrderInfoModal = !$this->myOrderInfoModal;
    }

    public function getOrdersForUser()
    {
        $orders = auth()->user()->orders;
        return $orders;
    }


    public function getSizeFromProductSize($productSizeId)
    {
        $sizeID = ProductSize::where('id', $productSizeId)->pluck('size_id');

        $sizeName = Size::where('id', $sizeID)->value('size');

        return $sizeName;
    }

    public function getProductsFromOrder($productSizeId)
    {
        $productID = ProductSize::where('id', $productSizeId)->pluck('product_id');

        $productName = Product::where('id', $productID)->value('name');

        $this->product = $productID;

        return $productName;
    }

    public function getPriceFromOrder($productSizeId)
    {
        $productID = ProductSize::where('id', $productSizeId)->pluck('product_id');

        $productPrice = Product::where('id', $productID)->value('price');

        return $productPrice;
    }

    public function returnTotalPrice($productSizeId, $amount): float|int
    {
        $price = $this->getPriceFromOrder($productSizeId);

        return $price * $amount;
    }

    public function sumOfOrders($orders): int|float
    {
        $sumOfOrders = 0;

        foreach($orders as $order)
        {
            $productSizeId = $order->product_size_id;
            $amount = $order->quantity;

            $price = $this->getPriceFromOrder($productSizeId);
            $sumOfOrders += $price * $amount;
        }

        $this->sumOfOrders = $sumOfOrders;

        return $sumOfOrders;
    }

    public function deleteOrder($orderId): void
    {
        $order = auth()->user()->orders()->where('id', $orderId)->first();

        if (!$order) {
            return;
        } else {
            $order->delete();
        }


        $this->orders = $this->getOrdersForUser();
    }

    public function redirectToOrder()
    {
        return redirect()->route('kleding');
    }


    public function render()
    {
        return view('livewire.member.my-order')
            ->layout('layouts.templatelayout');
    }
}
