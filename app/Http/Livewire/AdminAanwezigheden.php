<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserTour;
use App\Models\User;

class AdminAanwezigheden extends Component
{
    public function render()
    {
        $users = User::all();
        $usertours = UserTour::has('user')->get();
        return view('livewire.admin-aanwezigheden', compact('users','usertours'));
    }
}
