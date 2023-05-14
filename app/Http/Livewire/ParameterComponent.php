<?php

namespace App\Http\Livewire;

use App\Models\Parameter;
use DB;
use Livewire\Component;
use Illuminate\Support\Facades\Log;


class ParameterComponent extends Component
{

    public $parameters;
    public  $selectedParameterId;

    public $parameter_id_delete;
    public $end_date_order;
    public $parameter_id;

    public function mount()
    {
        $this->parameters = Parameter::all(['end_date_order', 'id']);
    }

    public function store()
    {
        $this->validate([
            'end_date_order' => 'required',
        ]);

        Parameter::create([
            'end_date_order' => $this->end_date_order,
        ]);

        session()->flash('message', 'Parameter created successfully.');

        $this->reset();
        $this->mount();
    }

    public function destroy()
    {
        $parameter = Parameter::findOrFail($this->parameter_id_delete);
        $parameter->delete();

        session()->flash('message', 'Parameter deleted successfully.');

        $this->reset('parameter_id_delete');
        $this->reset();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.parameter-component' , [
            'parameters' => Parameter::all()
        ]);
    }

    public function update()
    {
        $this->validate([
            'selectedParameterId' => 'required',
            'end_date_order' => 'required|date',
        ]);

        $parameter = Parameter::findOrFail($this->selectedParameterId);

        $parameter->update([
            'end_date_order' => $this->end_date_order,
        ]);

        $this->emit('parameterUpdated');

        session()->flash('message', 'Parameter updated successfully.');
        $this->reset(['selectedParameterId', 'end_date_order']);
    }

}