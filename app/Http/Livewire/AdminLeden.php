<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AdminLeden extends Component
{

    public $newUser;

    public $perPage = 7;

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
        'newUser.birthdate.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.birthdate.date_format' => 'Dit veld moet een geldige geboortedatum bevatten.',
        'newUser.username.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.email.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.email.email' => 'Dit veld moet een geldig e-mailadres bevatten.',
        'newUser.email.unique:users,email' => 'Dit e-mailadres is al in gebruik.',
        'newUser.address.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.city.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.postal_code.required' => 'Dit veld mag niet leeg zijn.',
        'newUser.postal_code.digits' => 'Dit veld moet een geldige postcode bevatten.',
        'newUser.phone_number.digits' => 'Dit veld moet een geldig telefoonnummer bevatten.',
        'newUser.mobile_number.digits' => 'Dit veld moet een geldig gsm-nummer bevatten.',
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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }



    public function showTracks(User $user)
    {
        $this->selectedUser = $user;
        $this->showModal = true;
//        dump($this->selectedRecord->toArray());
    }

    public function render()
    {
        $users = User::orderBy('is_admin', 'desc')
            ->orderBy('name')->paginate($this->perPage);
        return view('livewire.admin-leden', compact('users'));
    }

}


//class Ledenbeheer extends Component
//{
//
//    use WithPagination;
//
////    Naamfilter als tijd over is!
//    public $perPage = 8;
//
//
//    public $newUser;
//
//    public $editUser = [
//        'id' => null,
//        'name' => null,
//        'username' => null,
//        'birthdate' => null,
//        'email' => null,
//        'postal_code' => null,
//        'city' => null,
//        'address' => null,
//        'phone_number' => null,
//        'mobile_number' => null,
//        'password' => null,
//    ];
//
//    protected function rules()
//    {
//        return [
//            'newUser.name' => 'required|string|max:255',
//            'newUser.username' => 'required|alpha_dash|max:255|unique:users,username',
//            'newUser.birthdate' => 'required',
//            'newUser.email' => 'required|email|max:255|unique:users,email',
//            'newUser.postal_code' => 'required|digits:4',
//            'newUser.city' => 'required|string|max:255',
//            'newUser.address' => 'required|string|max:255',
//            'newUser.phone_number' => 'nullable|digits:9',
//            'newUser.mobile_number' => 'nullable|digits:10',
//            'newUser.password' => 'required|min:8',
//        ];
//    }
//
//    protected $validationAttributes = [
//        'newUser.postal_code' => 'postal code',
//    ];
//
////    protected $rules = [
////        'newUser.name' => 'required|string|max:255',
////        'newUser.username' => 'required|alpha_dash|max:255|unique:users,username',
////        'newUser.birthdate' => 'required',
////        'newUser.email' => 'required|email|max:255|unique:users,email',
////        'newUser.postal_code' => 'required|digits:4',
////        'newUser.city' => 'required|string|max:255',
////        'newUser.address' => 'required|string|max:255',
////        'newUser.phone_number' => 'nullable|digits:9',
////        'newUser.mobile_number' => 'nullable|digits:10',
////        'newUser.password' => 'required|min:8',
////    ];
//
//
//    protected $messages = [
//        'name.required' => 'Dit veld mag niet leeg zijn.',
//        'birthdate.required' => 'Dit veld mag niet leeg zijn.',
//        'birthdate.date_format' => 'Dit veld moet een geldige geboortedatum bevatten.',
//        'username.required' => 'Dit veld mag niet leeg zijn.',
//        'email.required' => 'Dit veld mag niet leeg zijn.',
//        'email.email' => 'Dit veld moet een geldig e-mailadres bevatten.',
//        'address.required' => 'Dit veld mag niet leeg zijn.',
//        'postal_code.required' => 'Dit veld mag niet leeg zijn.',
//        'postal_code.digits' => 'Dit veld moet een geldige postcode bevatten.',
//        'phone_number.digits' => 'Dit veld moet een geldig telefoonnummer bevatten.',
//        'mobile_number.digits' => 'Dit veld moet een geldig gsm-nummer bevatten.',
//        'password.required' => 'Dit veld mag niet leeg zijn.',
//    ];
//
//    public function createUser()
//    {
//        $validateData = $this->validate();
//        User::create([
//            'name' => $this->newUser['name'],
//            'username' => $this->newUser['username'],
//            'birthdate' => $this->newUser['birthdate'],
//            'email' => $this->newUser['email'],
//            'postal_code' => $this->newUser['postal_code'],
//            'city' => $this->newUser['city'],
//            'address' => $this->newUser['address'],
//            'phone_number' => $this->newUser['phone_number'],
//            'mobile_number' => $this->newUser['mobile_number'],
//            'password' => bcrypt($this->newUser['password']),
//        ]);
//    }
//
//    public function updated($propertyName)
//    {
//        $this->validateOnly($propertyName);
//    }
//
//    public function resetNewUser()
//    {
//        $this->reset('newUser');
//        $this->resetErrorBag();
//    }
//
//    public function setNewUser()
//    {
//        $this->resetErrorBag();
//        $this->reset('newUser');
//        $this->showModal = true;
//    }
//
//    public function editExistingUser(User $user)
//    {
//        $this->editUser = [
//            'id' => $user->id,
//            'name' => $user->name,
//            'username' => $user->username,
//            'birthdate' => $user->birthdate,
//            'email' => $user->email,
//            'postal_code' => $user->postal_code,
//            'city' => $user->city,
//            'address' => $user->address,
//            'phone_number' => $user->phone_number,
//            'mobile_number' => $user->mobile_number,
//            'password' => $user->password,
//        ];
//    }
//
//    public function resetEditUser()
//    {
//        $this->reset('editUser');
//        $this->resetErrorBag();
//    }
//
//    public function updateUser(User $user)
//    {
//        $this->validateOnly('editUser.name');
//        $user->update(['name' => trim($this->editUser['name'])]);
//        $this->resetEditUser();
//    }
//
////    Ander bericht dan SQL error als User gekoppeld is aan een order?
//    public function deleteUser(User $user)
//    {
//        $user->delete();
//    }
//
////    public function updated($propertyName, $propertyValue)
////    {
////        if (in_array($propertyName, ['perPage']))
////            $this->resetPage();
////    }
//
//
//    public function render()
//    {
//        $users = User::orderBy('is_admin', 'desc')->paginate($this->perPage);
////        dd($users);
//        return view('livewire.ledenbeheer', compact('users'));
//    }
//}
