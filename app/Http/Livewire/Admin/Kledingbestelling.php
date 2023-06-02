<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class Kledingbestelling extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::all();
    }

    public function users()
    {
        return User::with('orders')->get();
    }

    public function orders()
    {
        return Order::with('productsizes')->get();
    }

    public function render()
    {
        return view('livewire.admin.kledingbestelling');
    }
}
