<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Ledenbeheer extends Component
{
    use WithPagination;
    public $search;
    public $orderBy = 'name';
    public $orderAsc = true;
    public $perPage = 10;
    public $showModal = false;

    public $newUser = [
        'id' => null,
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
        'is_admin' => false,
    ];


// Validation rules
    protected function rules()
    {
        return [
            'newUser.name' => 'required|string|max:255',
            'newUser.username' => 'required|alpha_dash|max:255|unique:users,username,' . $this->newUser['id'],
            'newUser.birthdate' => 'required',
            'newUser.email' => 'required|email|max:255|unique:users,email,' . $this->newUser['id'],
            'newUser.postal_code' => 'required|digits:4',
            'newUser.city' => 'required|string|max:255',
            'newUser.address' => 'required|string|max:255',
            'newUser.phone_number' => 'nullable|digits:9',
            'newUser.mobile_number' => 'nullable|digits:10',
            'newUser.password' => 'required|min:8',
        ];
    }

// Validation messages
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

//    User aanmaken
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
            'is_admin' => $this->newUser['is_admin'],
        ]);
    }

    public function setNewUser(User $user = null)
    {
        $this->resetErrorBag();
        if($user) {
            $this->newUser['id'] = $user->id;
            $this->newUser['name'] = $user->name;
            $this->newUser['username'] = $user->username;
            $this->newUser['birthdate'] = $user->birthdate;
            $this->newUser['email'] = $user->email;
            $this->newUser['postal_code'] = $user->postal_code;
            $this->newUser['city'] = $user->city;
            $this->newUser['address'] = $user->address;
            $this->newUser['phone_number'] = $user->phone_number;
            $this->newUser['mobile_number'] = $user->mobile_number;
            $this->newUser['password'] = $user->password;
            $this->newUser['is_admin'] = $user->is_admin;
        } else {
            $this->reset('newUser');
        }
        $this->showModal = true;
    }

//    Pagination updaten
    public function updated($propertyName, $propertyValue)
    {
        // dump($propertyName, $propertyValue);
        if (in_array($propertyName, ['perPage']))
            $this->resetPage();
    }

//    User updaten
    public function updateUser(User $user)
    {
        $this->validate();
        $user->update([
//            'id' => $this->newUser['id'],
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
            'is_admin' => $this->newUser['is_admin'],
        ]);

    }

//    User verwijderen
    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function resort($column)
    {
        if ($this->orderBy === $column) {
            $this->orderAsc = !$this->orderAsc;
        } else {
            $this->orderAsc = true;
        }
        $this->orderBy = $column;
    }


    public function render()
    {
        $users = User::orderBy('is_admin', 'desc')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->where('name', 'like', "%{$this->search}%")
            ->orWhere('username', 'like', "%{$this->search}%")
            ->paginate($this->perPage);
        return view('livewire.ledenbeheer', compact('users'));
    }

}