<?php

namespace App\Http\Livewire;

use App\Models\Armurier\Armes;
use Livewire\Component;

class SearchArmes extends Component
{
    public $term ="";

    public function render()
    {
        sleep(1);
        $armes = Armes::search($this->term)->paginate(10);
        $data = [
            'armes' => $armes,
        ];
        return view('livewire.search-armes', $data);
    }
}
