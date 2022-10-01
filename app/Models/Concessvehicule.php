<?php

namespace App\Models;
use App\Models\Search;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concessvehicule extends Model
{
    protected $table = "vehicules";
    use Search;
    protected $searchable = [
        'nom',
        'prix',
        'category'
    ];
    protected $fillable = [
        'nom',
        'prix',
        'category',
        'photo'
    ];
}
