<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\UserTour;
use App\Models\Tour;
use App\Models\GPX;
use App\Models\GroupTour;

class DashboardAanwezigheden extends Component
{
    public $perpage = 3;

    public function render()
    {
        $aanwezigheden = UserTour::orderBy('id')->has('user')->paginate($this->perpage);
        $starturen = GroupTour::orderBy('id')->get();
        $tours = Tour::orderBy('id')->get();
        $gpxes = GPX::orderBy('id')->has('tour')->get();
        $userAanwezigheden = UserTour::join('users', 'user_tours.user_id', '=', 'users.id',)
            ->join('group_tours', 'user_tours.group_tour_id', '=', 'group_tours.id')
            ->join('tours', 'user_tours.tour_id', '=', 'tours.id')
            ->join('g_p_x_e_s', 'user_tours.g_p_x_id', '=', 'g_p_x_e_s.id')
            ->where('user_id', Auth::id())->paginate($this->perpage);
        dd($userAanwezigheden);
        return view('livewire.dashboard-aanwezigheden', compact('aanwezigheden', 'starturen', 'tours', 'gpxes', 'userAanwezigheden'));
    }
}
