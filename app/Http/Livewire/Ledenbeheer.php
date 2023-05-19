<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Ledenbeheer extends Component
{

    public $newUser;

    public $perPage = 10;

    public $selectedUser;

    public $showModal = false;

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

    protected $messages = [
        'newUser.name.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.username.alpha_dash' => 'Dit veld mag enkel letters, cijfers, underscores (_) en streepjes (-) bevatten.',
        'newUser.username.unique' => 'Dit veld moet een unieke gebruikersnaam bevatten.',
        'newUser.username.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.birthdate.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.birthdate.date_format' => 'Dit veld moet een geldige geboortedatum bevatten.',
        'newUser.email.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.email.email' => 'Dit veld moet een geldig e-mailadres bevatten.',
        'newUser.email.unique' => 'Dit e-mailadres is al in gebruik.',
        'newUser.address.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.city.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.postal_code.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.postal_code.digits' => 'Dit veld moet een geldige postcode bevatten.',
        'newUser.phone_number.digits' => 'Dit veld moet een geldig telefoonnummer bevatten (maximum 8 cijfers).',
        'newUser.mobile_number.digits' => 'Dit veld moet een geldig gsm-nummer bevatten (maximum 9 cijfers).',
        'newUser.password.required' => 'Dit veld mag niet leeg zijn.',
    ];

    public function createUser()
    {
        $this->validate();
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

    public function setNewUser()
    {
        $this->resetErrorBag();
        $this->reset('newUser');
        $this->showModal = true;
    }

    public function updated($propertyName, $propertyValue)
    {
        // dump($propertyName, $propertyValue);
        if (in_array($propertyName, ['perPage']))
            $this->resetPage();
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }



//    public function showTracks(User $user)
//    {
//        $this->selectedUser = $user;
//        $this->showModal = true;
////        dump($this->selectedRecord->toArray());
//    }

    public function render()
    {
        $users = User::orderBy('is_admin', 'desc')
            ->orderBy('name')->paginate($this->perPage);
        return view('livewire.ledenbeheer', compact('users'));
    }

}