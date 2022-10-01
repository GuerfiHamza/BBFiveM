<?php

namespace App\Http\Livewire;

use App\Models\ConcessBateau;
use Livewire\Component;
use Livewire\WithPagination;

class Bateau extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.bateau',[
            'bateaux' => ConcessBateau::Paginate(10),
        ]);
    }
}
