<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;

class Filter extends Component
{
    public function render()
    {
        $groups = Group::all();
//        $groups = Group::orderBy('id')->has('grouptours')->get();
        return view('livewire.filter', compact('groups'));
    }
}
