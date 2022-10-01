<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class BankLent extends Model
{
    protected $connection = 'fivem';
    protected $table = 'bank_lent_money';
    protected $primaryKey  = 'id';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'clientID',
        'amount',
        'rate',
        'remainDeadlines',
        'deadlines',
        'amountNextDeadline',
        'alreadyPaid',
        'timeLeft',
        'timeBeforeDeadline',
        'advisorFirstname',
        'advisorLastname',
        'status',
    ];

    public function player()
    {
        return $this->belongsTo('App\Models\FiveM\Player', 'owner', 'identifier');
    }
}
