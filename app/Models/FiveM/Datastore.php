<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class Datastore extends Model
{
    protected $connection = 'fivem';
    protected $table = 'datastore_data';
    protected $primaryKey  = 'id';
    
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'name', 
        'owner',
        'data',
    ];

    protected $casts = [
        'data' => 'collection'
    ];
}
