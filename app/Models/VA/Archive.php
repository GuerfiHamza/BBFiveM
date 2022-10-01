<?php

namespace App\Models\VA;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = "va_archive";

    protected $fillable = [
        'prix',      
        'vendeur',
        'weapon',         // Catégorie d'infraction
        'date',         // Catégorie d'infraction
        'informations', // Informations supplémentaires
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\VA\Client', 'client_id');
    }
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
