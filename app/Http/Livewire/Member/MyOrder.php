<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;

class MyOrder extends Component
{

    public $orders;

    public function mount()
    {
        $this->orders = auth()->user()->orders;
    }

    public function render()
    {
        return view('livewire.member.my-order')
            ->layout('layouts.templatelayout');
    }
}
