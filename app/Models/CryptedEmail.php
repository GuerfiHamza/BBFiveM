<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptedEmail extends Model
{
    protected $fillable = [
        'prefix',
        'player_id',
    ];

    public function getEmailAttribute()
    {
        return $this->prefix . '@crypted.net';
    }

    /**
     * Get the receiver of the mail
     * 
     * @return \App\Models\FiveM\Player
     */
    public function getPlayer()
    {
        return \App\Models\FiveM\Player::findOrFail($this->player_id);
    }
}
