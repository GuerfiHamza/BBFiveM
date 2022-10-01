<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MapComponent extends Component
{
    public $position;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($position)
    {
        $this->position = $position;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.map-component');
    }
}
