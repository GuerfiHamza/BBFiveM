<?php

namespace App\Http\Livewire;

use App\Models\Immobilier;
use Livewire\Component;

class SearchImmo extends Component
{
    public $term ="";

    public function render()
    {
        sleep(1);
        $immos = Immobilier::search($this->term)->paginate(10);
        $data = [
            'immos' => $immos,
        ];
        return view('livewire.search-immo', $data);
    }
}
