<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PPA extends Model
{
    protected $table = 'ppa';
    protected $fillable = [
        "nom",
        "psy",
        "phys",
        "casier",
        "ppa1",
        "ppa2",
        "ppa3",
    ];
}
