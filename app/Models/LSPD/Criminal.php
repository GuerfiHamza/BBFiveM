<?php

namespace App\Models\LSPD;

use Illuminate\Database\Eloquent\Model;

class Criminal extends Model
{
    protected $fillable = [
        'name',             // Nom
        'birthdate',        // Date de naissance        (nullable)
        'color',            // Couleur de peau          (nullable)
        'eyes',             // Couleurs des yeux        (nullable)
        'country',          // Pays d'origine           (nullable)
        'identity_card',    // Photo carte d'identité   (nullable)
        'front',            // Photo de face            (nullable)
        'left',             // Photo de profile gauche  (nullable) 
        'right',            // Photo de profile droite  (nullable)
        'back',             // Photo de derriere        (nullable) 
        'researched',       // Recherché ?  (faux par défaut)
        'dead',             // Mort ?       (faux par défaut)
    ];

    public function records()
    {
        return $this->hasMany('App\Models\LSPD\Record', 'criminal_id');
    }
}
