<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerTreasory extends Model
{
        protected $fillable = [
        'identifier',
        'treasory',
        'created_at',
    ];

    public function player()
    {
        return $this->belongsTo('App\Models\FiveM\Player', 'identifer');
    }
}
