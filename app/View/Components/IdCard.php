<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IdCard extends Component
{
    public $name;
    public $surname;
    public $birthdate;
    public $height;
    public $sex;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $surname, $birthdate, $height, $sex)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthdate = $birthdate;
        $this->height = $height;
        $this->sex = $sex;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.id-card');
    }
}
