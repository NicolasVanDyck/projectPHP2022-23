<?php

namespace App\Http\Livewire;

use App\Models\GroupTour;
use Livewire\Component;
use App\Models\UserTour;
use App\Models\User;

class AdminAanwezigheden extends Component
{

    public $deelname;
    public $showModal = false;
    public $grouptourid;

    public function addDeelname($grouptourid, $tourid)
    {
        UserTour::create([
            'user_id' => $this->deelname,
            'group_tour_id' => $grouptourid,
            'tour_id' => $tourid,
        ]);
    }

    public function deleteDeelname(UserTour $usertour)
    {
        $usertour->delete();
    }

    public function render()
    {
        $today = today();
        $users = User::all();
        $usertours = UserTour::with('user')->get();
        $grouptours = GroupTour::with('usertours.user')
            ->orderBy('start_date')
//            Aangeven tussen dit en twee weken. Om te testen zetten we dit af.
//            ->whereBetween('start_date', [$today, today()->addDays(14)])
            ->get();
        return view('livewire.admin-aanwezigheden', compact('users','grouptours','usertours'));
    }
}
