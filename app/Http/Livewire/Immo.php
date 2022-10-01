<?php

namespace App\Http\Livewire;

use App\Models\Immobilier;
use Livewire\Component;

class Immo extends Component
{
    public function render()
    {
        return view('livewire.immo',[
            'immos' => Immobilier::Paginate(10),
        ]);
    }
}
