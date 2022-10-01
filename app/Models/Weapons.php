<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weapons extends Model
{

    protected $table = 'weapons';
    protected $fillable = [

        'nom',
        'vendeur',
        'date',
        'weapon',
        'conf'
    ];

    public function setWeaponAttribute($value)
    {
        $this->attributes['weapon'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getWeaponAttribute($value)
    {
        return json_decode($value);
    }
}
