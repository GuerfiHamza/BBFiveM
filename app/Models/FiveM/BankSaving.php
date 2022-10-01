<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class BankSaving extends Model
{
    protected $connection = 'fivem';
    protected $table = 'bank_savings';
    protected $primaryKey  = 'id';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'tot',
        'rate',
        'advisorFirstname',
        'advisorLastname',
        'status',
    ];

    public function player()
    {
        return $this->belongsTo('App\Models\FiveM\Player', 'owner', 'identifier');
    }
}
