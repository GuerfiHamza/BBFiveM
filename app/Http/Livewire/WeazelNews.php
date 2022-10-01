<?php

namespace App\Http\Livewire;

use App\Models\WeazelNews as ModelsWeazelNews;
use Livewire\WithPagination;

use Livewire\Component;

class WeazelNews extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.weazel-news',[
            'posts' => ModelsWeazelNews::latest()->paginate(6),
        ]);
    }
}
