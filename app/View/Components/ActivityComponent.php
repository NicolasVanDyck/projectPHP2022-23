<?php

namespace App\View\Components;
use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class ActivityComponent extends Component
{
    public $activities;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($activities)
    {
        $this->activities = $activities;
    }

    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render(): Closure
    {
        return function (array $data) {
            $activities = $this->activities;
            return view('components.activities');
        };
    }
}
