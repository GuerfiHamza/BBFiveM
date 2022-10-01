<?php

namespace App\Models\VA;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = [
        'name',             // Nom
        'org',        // Date de naissance        (nullable)
        'tel',    // Photo carte d'identité   (nullable)
    ];

    public function archives()
    {
        return $this->hasMany('App\Models\VA\Archive', 'client_id');
    }
}
