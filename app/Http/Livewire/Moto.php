<?php

namespace App\Http\Livewire;

use App\Models\ConcessMoto;
use Livewire\Component;

class Moto extends Component
{
    public function render()
    {
        return view('livewire.moto',[
            'motos' => ConcessMoto::Paginate(10),
        ]);
    }
}
