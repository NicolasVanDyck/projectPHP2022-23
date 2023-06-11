<?php

namespace App\Http\Livewire\Admin;

use App\Exports\OrderExport;
use App\Models\Order;
use App\Models\Parameter;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Kledingbestelling extends Component
{
    public $amount;
    public $productId;
    public $ordersCollection;
    public $showInfoModal = false;


    public function mount(): void
    {
        $this->amount = 0;
        $this->productId = 0;
        $this->ordersCollection = $this->getOrders();

//        dd($this->ordersCollection);
    }

    /**
     * Shows the info modal
     *
     * @return void
     */
    public function showInfoModal(): void
    {
        $this->showInfoModal = !$this->showInfoModal;
    }

    /**
     * Gets the product id from the order.
     *
     * @param Order $order
     * @return int
     */
    public function getProductIDFromOrder(Order $order): int
    {
        $productId = ProductSize::find($order->product_size_id)->product_id;
        return $productId;
    }

    /**
     * Gets the product name from the order.
     *
     * @param Order $order
     * @return string
     */
    public function getProductNameFromOrder(Order $order): string
    {
        $productId = $this->getProductIDFromOrder($order);

        $productName = Product::find($productId)->name;
        return $productName;
    }

    /**
     * Gets the size name from the order.
     *
     * @param Order $order
     * @return string
     */
    public function getSizeNameFromOrder(Order $order): string
    {
        $sizeName = Size::find(ProductSize::find($order->product_size_id)->size_id)->size;
        return $sizeName;
    }

    /**
     * Gets the username from the order.
     *
     * @param Order $order
     * @return string
     */
    public function getUserNameFromOrder(Order $order): string
    {
        $userId = $order->user_id;

        $user = User::find($userId)->name;
        return $user;
    }

    /**
     * Gets the total price for the product.
     *
     * @param Order $order
     * @return int
     */
    public function getTotalForProduct(Order $order): int
    {
        $productId = $this->getProductIDFromOrder($order);

        $price = Product::select('price')->where('id', $productId)->value('price');

        return $order->quantity * $price;
    }


    /**
     * Makes a collection of the orders, the product name, the size name and the username, the amount and the price.
     *
     *  @return Collection
     */
    public function getOrders(): Collection
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

    /**
     * Exports the orders to an Excel file.
     *
     * @return BinaryFileResponse
     */
    public function exportToExcel(): BinaryFileResponse
    {
        return \Excel::download(new OrderExport, 'orders.xlsx');
    }

    public function render()
    {
        $orders = Order::get();

        return view('livewire.admin.kledingbestelling', compact('orders'));
    }
}
