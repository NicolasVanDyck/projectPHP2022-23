<?php

namespace App\Http\Livewire;

use App\Mail\WelcomeMail;
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

    protected $listeners = [
        'delete-genre' => 'deleteUser',
    ];

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
    protected $rules = [
            'newUser.name' => 'required|string|max:255',
            'newUser.username' => 'required|alpha_dash|max:255|unique:users,username,',
            'newUser.birthdate' => 'required',
//            'newUser.email' => 'required|email|max:255|unique:users,email,',
            // Write regex for email
            'newUser.email' => 'required|email|max:255|unique:users,email,',
            'newUser.postal_code' => 'required|digits:4',
            'newUser.city' => 'required|string|max:255',
            'newUser.address' => 'required|string|max:255',
            'newUser.phone_number' => 'nullable|digits:9',
            'newUser.mobile_number' => 'nullable|digits:10',
        ];

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
    ];
    private User $user;

    /**
     * Toggles the modal
     *
     * @return void
     */
    public function toggleModal(): void
    {
        $this->showModal = !$this->showModal;
    }

//    User aanmaken
    public function createUser()
    {
        $this->validate();
        if($this->newUser['is_admin'] == null) {
            $this->newUser['is_admin'] = false;
        }
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

//        Stuur mail ter bevestiging van registratie
        \Mail::to($this->newUser['email'])
            ->send(new WelcomeMail($this->newUser['name']));

        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html' => "Gebruiker <b><i>{$this->newUser['name']}</i></b> werd succesvol toegevoegd!",
        ]);

        $this->showModal = false;
    }

    public function setNewUser(User $user = null)
    {
        $this->showModal = true;

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
    }

//    Pagination updaten

    /**
     * Updates the pagination when the perPage variable is changed
     *
     * @param string $propertyName
     * @param $propertyValue
     * @return void
     */
    public function updated(string $propertyName, $propertyValue): void
    {
        if ($propertyName == 'perPage') {
          $this->resetPage();
        }

    }

    /**
     * Shows the modal with the user information and prefills the form
     *
     * @param User $user
     * @return void
     */
    public function showUser(User $user): void
    {
        $this->toggleModal();
        $this->user = $user;
        $this->newUser = $user->toArray();
    }


    /**
     * Updates the user information
     *
     * @param User $user
     * @return void
     */
    public function updateUser(User $user): void
    {
        $this->resetErrorBag();
        $this->rules['newUser.email'] = 'required';
        $this->rules['newUser.username'] = 'required';
        $this->validate($this->rules, $this->messages);

        $user->update([
            'id' => $this->newUser['id'],
            'name' => $this->newUser['name'],
            'username' => $this->newUser['username'],
            'birthdate' => $this->newUser['birthdate'],
            'email' => $this->newUser['email'],
            'postal_code' => $this->newUser['postal_code'],
            'city' => $this->newUser['city'],
            'address' => $this->newUser['address'],
            'phone_number' => $this->newUser['phone_number'],
            'mobile_number' => $this->newUser['mobile_number'],
            'is_admin' => $this->newUser['is_admin'],
        ]);

        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html' => "Aanpassingen voor <b><i>{$this->newUser['name']}</i></b> doorgevoerd.",
        ]);


        $this->toggleModal();
    }

    /**
     * Deletes the user
     *
     * @param User $user
     * @return void
     */
    public function deleteUser(User $user): void
    {
        $user->delete();
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'danger',
            'html' => "$user->name verwijderd!",
        ]);
    }

    /**
     * Sorts the table by the given column
     *
     * @param string $column
     * @return void
     */
    public function resort(string $column): void
    {
        if ($this->orderBy === $column)
        {
            $this->orderAsc = !$this->orderAsc;
        } else {
            $this->orderAsc = true;
        }
        $this->orderBy = $column;
    }

    public function resetSearch()
    {
        $this->search = '';
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
