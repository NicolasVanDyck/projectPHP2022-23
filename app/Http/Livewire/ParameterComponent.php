<?php

namespace App\Http\Livewire;
use App\Models\Parameter;
use DB;
use Livewire\Component;

class ParameterComponent extends Component
{

    public  $parameters;
    public $end_date_order;
    public $parameter_id;
    public function mount()
    {
        $this->parameters = DB::table('parameters')->select('end_date_order', 'id')->get();
        return view('livewire.parameter-component');
    }

    public function store()
    {
        $this->validate([
            'end_date_order' => 'required',
        ]);

        Parameter::create([
            'end_date_order' => $this->end_date_order,
        ]);

        $this->reset();
    }

    public function destroy()
    {
        $parameter = Parameter::findOrFail($this->parameter_id);
        $parameter->delete();

        session()->flash('message', 'Parameter deleted successfully.');

        $this->reset('parameter_id');
    }

}
