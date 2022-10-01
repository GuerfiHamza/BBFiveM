<?php

namespace App\Http\Livewire;

use App\Models\WeazelNews;
use Livewire\Component;

class ShowPost extends Component
{
    public $post;

    public $like;
    public function mount($id)
    {
        $this->post = WeazelNews::findOrFail($id);

    }

    public function render()
    {
        return view('livewire.show-post',[
            'post' => $this->post,
        ]);
    }
}
