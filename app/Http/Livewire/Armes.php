<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Armurier\Armes as ArmurierArmes;
use Livewire\Component;

class Armes extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.armes',[
            'armes' => ArmurierArmes::Paginate(10),
        ]);
    }
}
