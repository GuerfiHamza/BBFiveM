<?php

namespace App\Http\Livewire;

use App\Models\ConcessMoto;
use Livewire\Component;

class SearchMoto extends Component
{
        public $term ="";

    public function render()
    {
        sleep(1);
        $motos = ConcessMoto::search($this->term)->paginate(10);
        $data = [
            'motos' => $motos,
        ];
        return view('livewire.search-moto', $data);
    }
}
