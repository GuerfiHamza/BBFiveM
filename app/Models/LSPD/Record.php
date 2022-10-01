<?php

namespace App\Models\LSPD;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = "lspd_records";

    protected $fillable = [
        'type',         // Catégorie d'infraction
        'cell',         // Temps de cellule (nullable)
        'penalty',      // Amende (nullable)
        'informations', // Informations supplémentaires
        'search',       // Fouillé 
        'recidivism',   // Récidive
        'captured',     // Objets Saisies (nullable)
    ];

    public function criminal()
    {
        return $this->belongsTo('App\Models\LSPD\Criminal', 'criminal_id');
    }

    public function getHumanType()
    {
        return [
            'rappel' => 'Rappel à la loi',
            'leger' => 'Délit léger',
            'moyen' => 'Délit moyen',
            'grave' => 'Délit grave',
            'lourd' => 'Faute lourde',
        ][$this->type];
    }
}
