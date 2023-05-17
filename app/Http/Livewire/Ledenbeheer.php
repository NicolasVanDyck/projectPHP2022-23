<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Ledenbeheer extends Component
{

    use WithPagination;

//    Naamfilter als tijd over is!
    public $perPage = 8;


    public $newUser =
    [
        'name' => null,
        'username' => null,
        'birthdate' => null,
        'email' => null,
        'postal_code' => null,
        'city' => null,
        'address' => null,
        'phone_number' => null,
        'mobile_number' => null,
        'password' => null,
    ];

    protected $rules = [
      'newUser.name' => 'required',
        'newUser.username' => 'required|min:5|max:30|unique:users,username',
        'newUser.birthdate' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
        'newUser.postal_code' => 'required',
        'newUser.city' => 'required',
        'newUser.address' => 'required',
        'newUser.phone_number' => 'nullable',
        'newUser.mobile_number' => 'nullable|unique:users,mobile_number',
        'newUser.password' => 'required|min:8',
    ];

    public function createUser()
    {
        $this->validate();

        User::create([
            'name' => trim($this->newUser['name']),
            'username' => trim($this->newUser['username']),
            'birthdate' => $this->newUser['birthdate'],
            'email' => $this->newUser['email'],
            'postal_code' => $this->newUser['postal_code'],
            'city' => $this->newUser['city'],
            'address' => $this->newUser['address'],
            'phone_number' => $this->newUser['phone_number'],
            'mobile_number' => $this->newUser['mobile_number'],
            'password' => bcrypt($this->newUser['password']),
        ]);

        $this->setNewUser();

    }

    public function setNewUser()
    {
        $this->resetErrorBag();
        $this->reset('newUser');
    }

//    Ander bericht dan SQL error als User gekoppeld is aan een order?

    public function deleteUser(User $user)
    {
        $user->delete();
    }


    public function render()
    {
        $users = User::orderBy('is_admin', 'desc')->paginate($this->perPage);
        return view('livewire.ledenbeheer', compact('users'));
    }
}
