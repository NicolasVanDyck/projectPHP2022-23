<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\UserTour;
use Livewire\WithPagination;

class DashboardAanwezigheden extends Component
{
    use WithPagination;

    public $perpage = 3;

    public function render()
    {
        $userAanwezigheden = UserTour::join('users', 'user_tours.user_id', '=', 'users.id',)
            ->join('group_tours', 'user_tours.group_tour_id', '=', 'group_tours.id')
            ->join('tours', 'user_tours.tour_id', '=', 'tours.id')
            ->where('user_id', Auth::id())
            ->simplePaginate($this->perpage);
        return view('livewire.dashboard-aanwezigheden', compact('userAanwezigheden'));
    }
}
