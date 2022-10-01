<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $connection = 'fivem';
    protected $table = 'vehicle_sold';

    protected $primaryKey  = 'plate';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'plate',
        'model',
        'client',
        'soldby',
        'date',
    ];

    public function player()
    {
        return $this->belongsTo('App\Models\FiveM\Player', 'client', 'name');
    }
}
