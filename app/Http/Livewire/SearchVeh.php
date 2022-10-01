<?php

namespace App\Http\Livewire;

use App\Models\Concessvehicule;
use Livewire\Component;

class SearchVeh extends Component
{
    public $term ="";

    public function render()
    {
        sleep(1);
        $vehicules = Concessvehicule::search($this->term)->paginate(10);
        $data = [
            'vehicules' => $vehicules,
        ];
        return view('livewire.search-veh', $data);
    }
}
