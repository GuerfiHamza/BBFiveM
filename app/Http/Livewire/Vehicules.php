<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Concessvehicule;
use Livewire\Component;

class Vehicules extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.veh',[
            'vehicules' => Concessvehicule::Paginate(10),
        ]);
    }
}
