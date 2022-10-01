<?php

namespace App\Models;

use App\Models\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobilier extends Model
{
    protected $table = "immos";
    use Search;
    protected $searchable = [
        'nom',
        'prix'
    ];
    protected $fillable = [
        'nom',
        'prix',
        'photo'
    ];
}
