<?php

namespace App\Http\Livewire;

use App\Models\GroupTour;
use Livewire\Component;
use App\Models\UserTour;
use App\Models\User;

class AdminAanwezigheden extends Component
{

    public $deelname;
    public $grouptourid;

    public $grouptour;

    public function mount()
    {
        $this->grouptour = GroupTour::orderBy('start_date')->first()->id;
    }

    public function addDeelname($grouptourid, $tourid)
    {
        UserTour::create([
            'user_id' => $this->deelname,
            'group_tour_id' => $grouptourid,
            'tour_id' => $tourid,
        ]);

        $this->reset('deelname');
    }

    public function deleteDeelname(UserTour $usertour)
    {
        $usertour->delete();
    }

    public function render()
    {
        $startdate = today()->subDays(1);
        $enddate = today()->addDays(14);
        $users = User::all();
        $usertours = UserTour::with('user')->get();
        $grouptours = GroupTour::with('usertours.user')
            ->orderBy('start_date')
            ->where('id', $this->grouptour)
            ->whereBetween('start_date', [$startdate, $enddate])
            ->get();
        $grouptourdropdowns = GroupTour::orderBy('start_date')
            ->whereBetween('start_date', [$startdate, $enddate])
            ->get();
        return view('livewire.admin-aanwezigheden', compact('startdate','enddate', 'users','grouptours','usertours','grouptourdropdowns'));
    }
}
