<?php

namespace App\Http\Livewire;

use App\Models\GroupTour;
use Livewire\Component;
use App\Models\UserTour;
use App\Models\User;
use Symfony\Component\Console\Input\Input;

class AdminAanwezigheden extends Component
{

    public $deelname;
    public $showModal = false;
    public $grouptourid;

    public function addDeelname($grouptourid, $tourid)
    {
        if(UserTour::where([['user_id','=',$this->deelname],
            ['group_tour_id', '=', $grouptourid]])->exists());
//        Toastmessage, indien dit triggert?
        else
        UserTour::create([
            'user_id' => $this->deelname,
            'group_tour_id' => $grouptourid,
            'tour_id' => $tourid,
        ]);

    }

//    public function editDeelnemers()
//    {
//        $this->showModal = true;
////        $excludedUserIds = UserTour::where('group_tour_id', $grouptourid)
////            ->pluck('user_id')
////            ->toArray();
////        $users = User::whereNotIn('id', $excludedUserIds)->get();
//
//    }

    public function deleteDeelname(UserTour $usertour)
    {
        $usertour->delete();
    }

    public function render()
    {
//        $grouptourid = $this->grouptourid;
//        In this example, we first retrieve all user_ids that have a group_tour_id of 1 by using the pluck method to get a collection of just the user_id column, and then converting it to an array using the toArray method.
//    Then, we can exclude these user_ids from the User model by using the whereNotIn method, which only returns users whose ids are not in the array of excluded user_ids. We can then fetch all these users by calling the get method on the query.
//        $excludedUserIds = UserTour::where('group_tour_id', $grouptourid)
//            ->pluck('user_id')
//            ->toArray();
//        $users = User::whereNotIn('id', $excludedUserIds)->get();
        $today = today();
        $users = User::all();
        $usertours = UserTour::with('user')->get();
        $grouptours = GroupTour::orderBy('start_date')
//            Aangeven tussen dit en twee weken
            ->whereBetween('start_date', [$today, today()->addDays(14)])
            ->get();
        return view('livewire.admin-aanwezigheden', compact('users','usertours','grouptours'));
    }
}
