<?php

namespace App\Http\Livewire;

use App\Models\ConcessBateau;
use Livewire\Component;

class SearchBateau extends Component
{
    public $term ="";

    public function render()
    {
        sleep(1);
        $bateaux = ConcessBateau::search($this->term)->paginate(10);
        $data = [
            'bateaux' => $bateaux,
        ];
        return view('livewire.search-bateau', $data);
    }
}
