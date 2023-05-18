<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AdminLeden extends Component
{

    public $newUser;

    protected function rules()
{
    return [
        'newUser.name' => 'required|string|max:255',
        'newUser.username' => 'required|alpha_dash|max:255|unique:users,username',
        'newUser.birthdate' => 'required',
        'newUser.email' => 'required|email|max:255|unique:users,email',
        'newUser.postal_code' => 'required|digits:4',
        'newUser.city' => 'required|string|max:255',
        'newUser.address' => 'required|string|max:255',
        'newUser.phone_number' => 'nullable|digits:9',
        'newUser.mobile_number' => 'nullable|digits:10',
        'newUser.password' => 'required|min:8',
    ];
    }

    public function createUser()
    {
        $this->validateOnly('newUser');
        User::create([
            'name' => $this->newUser['name'],
            'username' => $this->newUser['username'],
            'birthdate' => $this->newUser['birthdate'],
            'email' => $this->newUser['email'],
            'postal_code' => $this->newUser['postal_code'],
            'city' => $this->newUser['city'],
            'address' => $this->newUser['address'],
            'phone_number' => $this->newUser['phone_number'],
            'mobile_number' => $this->newUser['mobile_number'],
            'password' => bcrypt($this->newUser['password']),
        ]);


    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        $users = User::orderBy('is_admin', 'desc')->orderBy('name')->get();
        return view('livewire.admin-leden', compact('users'));
    }
}
