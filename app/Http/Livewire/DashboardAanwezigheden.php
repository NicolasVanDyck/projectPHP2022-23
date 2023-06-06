<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\UserTour;

class DashboardAanwezigheden extends Component
{
    public $perpage = 3;

    public function render()
    {
        $userAanwezigheden = UserTour::join('users', 'user_tours.user_id', '=', 'users.id',)
            ->join('group_tours', 'user_tours.group_tour_id', '=', 'group_tours.id')
            ->join('tours', 'user_tours.tour_id', '=', 'tours.id')
            ->where('user_id', Auth::id())
            ->paginate($this->perpage);
        return view('livewire.dashboard-aanwezigheden', compact('userAanwezigheden'));
    }
}
