<?php

namespace App\Models\Avocat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaintes extends Model
{
    protected $table = "avocat";

    protected $fillable = [
        'nom',
        'prenom',
        'date',
        'montant',
        'informations',
        'status',
    ];
}
