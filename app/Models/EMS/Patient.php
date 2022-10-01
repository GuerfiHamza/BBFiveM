<?php

namespace App\Models\EMS;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',             // Nom
        'birthdate',        // Date de naissance        (nullable)
        'color',            // Couleur de peau          (nullable)
        'eyes',             // Couleurs des yeux        (nullable)
        'country',          // Pays d'origine           (nullable)
        'identity_card',    // Photo carte d'identité   (nullable)
        'tel',    // Photo carte d'identité   (nullable)
        'dead',             // Mort ?       (faux par défaut)
        'gs'                // Groupe sanguin
    ];

    public function archives()
    {
        return $this->hasMany('App\Models\EMS\Archive', 'patient_id');
    }
    public function getHumanType()
    {
        return [
            'a+' => 'A+',
            'a-' => 'A-',
            'ab+' => 'AB+',
            'ab-' => 'AB-',
            'o+' => 'O+',
            'o-' => 'O-',
            'b+' => 'B+',
            'b-' => 'B-',
        ][$this->gs];
    }
}
