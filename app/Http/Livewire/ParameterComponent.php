<?php

namespace App\Http\Livewire;

use App\Models\Parameter;
use DB;
use Livewire\Component;
use Illuminate\Support\Facades\Log;


class ParameterComponent extends Component
{

    public $parameters;
    public $end_date_order;


    public function mount()
    {
        $this->parameters = Parameter::all(['end_date_order', 'id']);
    }

    /**
     * Gets the enddate from the parameters table
     *
     * @return string
     */
    public function getEndDateOrder(): string
    {
        $parameter = Parameter::find(1);

        if ($parameter == null) {
            return "Geen einddatum gevonden";
        } else {
            return date('d/m/Y', strtotime($parameter->end_date_order));
        }
    }


    /**
     * Updates the parameter. The table is first truncated so there can always be only one end date.
     * Then the new parameter is inserted.
     *
     * @return void
     */
    public function update(): void
    {
        $this->validate([
            'end_date_order' => 'required|date',
        ]);

        DB::table('parameters')->truncate();
        DB::table('parameters')->insert([
                'end_date_order' => $this->end_date_order,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $this->emit('parameterUpdated');

        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html' => "Parameter werd aangepast naar " . date('d/m/Y', strtotime($this->end_date_order)) . "!",
        ]);
        $this->reset(['end_date_order']);




    }

    public function render()
    {
        return view('livewire.parameter-component', [
            'parameters' => Parameter::all()
        ]);
    }
}
