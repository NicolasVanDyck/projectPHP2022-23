<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\User;
use Livewire\Component;

class Kledingbestelling extends Component
{
    public $amount;
    public $productId;
    public $ordersCollection;


    public function mount(): void
    {
        $this->amount = 0;
        $this->productId = 0;
        $this->ordersCollection = $this->getOrders();
    }

    public function getProductIDFromOrder(Order $order)
    {
        $productId = ProductSize::find($order->product_size_id)->product_id;
        return $productId;
    }

    public function getProductNameFromOrder(Order $order)
    {
        $productId = $this->getProductIDFromOrder($order);

        $productName = Product::find($productId)->name;
        return $productName;
    }

    public function getSizeNameFromOrder(Order $order)
    {
        $sizeName = Size::find(ProductSize::find($order->product_size_id)->size_id)->size;
        return $sizeName;
    }

    public function getUserNameFromOrder(Order $order)
    {
        $userId = $order->user_id;

        $user = User::find($userId)->name;
        return $user;
    }

    public function getTotalForProduct(Order $order): int
    {
        $productId = $this->getProductIDFromOrder($order);

        $price = Product::select('price')->where('id', $productId)->value('price');

        return $order->quantity * $price;
    }


    // Make a collection of the orders, the product name, the size name and the user name, the amount and the price.
    public function getOrders(): \Illuminate\Support\Collection
    {
        $orders = Order::get();

        $ordersCollection = collect();

        foreach ($orders as $order)
        {
            $ordersCollection->push([
                'id' => $order->id,
                'product_name' => $this->getProductNameFromOrder($order),
                'size_name' => $this->getSizeNameFromOrder($order),
                'user_name' => $this->getUserNameFromOrder($order),
                'amount' => $order->quantity,
                'price' => $this->getTotalForProduct($order),
            ]);
        }

        $this->ordersCollection = $ordersCollection;
        return $ordersCollection;
    }


    public function exportToExcel()
    {
        //
    }



    public function render()
    {
        $orders = Order::get();

        return view('livewire.admin.kledingbestelling', compact('orders'));
    }
}
