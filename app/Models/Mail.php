<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable = [
        'to', // Sender Email
        'from', // Receiver Email
        'reply_to', // Reply To Email (if NULL: =from)
        'viewed', // Has the viewer opened it
        
        'subject',
        'content',
    ];

    public function isSenderCrypted()
    {
        return explode('@', $this->from)[1] == "crypted.fr";
    }

    public function isReceiverCrypted()
    {
        return explode('@', $this->to)[1] == "crypted.fr";
    }
    
    /**
     * Get the sender of the mail
     * 
     * @return \App\Models\FiveM\Player
     */
    public function getSender()
    {
        if ($this->isSenderCrypted()) {
            $player = \App\Models\CryptedEmail::where('prefix', '=', explode('@', $this->from)[0])->get()->first()->getPlayer();
            return \App\Models\User::where('steamID', '=', $player->license)->get()->first();
        } else {
            return \App\Models\User::where('email', '=', $this->from)->get()->first();
        }

        return null;
    }

    /**
     * Get the receiver of the mail
     * 
     * @return \App\Models\FiveM\Player
     */
    public function getReceiver()
    {
        if ($this->isReceiverCrypted()) {
            $player = \App\Models\CryptedEmail::where('prefix', '=', explode('@', $this->to)[0])->get()->first()->getPlayer();
            return \App\Models\User::where('steamID', '=', $player->license)->get()->first();
        } else {
            return \App\Models\User::where('email', '=', $this->to)->get()->first();
        }

        return null;
    }
}
