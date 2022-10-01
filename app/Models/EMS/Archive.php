<?php

namespace App\Models\EMS;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = "archives";

    protected $fillable = [
        'amende',      
        'who',
        'informations', // Informations supplémentaires
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\EMS\Patient', 'patient_id');
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
