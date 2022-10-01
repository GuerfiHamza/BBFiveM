<?php

namespace App\Models;
use App\Models\Search;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcessMoto extends Model
{
    protected $table = "motos";
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
