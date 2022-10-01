<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $connection = 'fivem';
    protected $table = 'billing';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'identifier', // Steam hex or username
        'sender',
        'target_type', // society | player
        'target', // [society_taxi, society_sheriff, society_police, society_petitpecheur, society_mecano, steamhex]
        'label',
        'amount'
    ];
    public function playersender()
    {
        return $this->belongsTo('App\Models\FiveM\Player', 'sender', 'identifier');
    }
    public function playerreciv()
    {
        return $this->belongsTo('App\Models\FiveM\Player', 'identifier', 'identifier');
    }
}
