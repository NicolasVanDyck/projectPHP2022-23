<?php

namespace App\Http\Livewire;

use App\Models\GPX;
use Livewire\Component;
use App\Models\Group;
use Livewire\WithPagination;
class TrajectBeheer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $groups;
    public $routes;

    public function render()
    {
        return view('livewire.traject-beheer');
    }
    public function mount()
    {
        $this->groups = Group::pluck('group')->toArray(); // Fetch group names from the database
        $this->routes = GPX::all(); // Fetch all routes from the database
    }

}
