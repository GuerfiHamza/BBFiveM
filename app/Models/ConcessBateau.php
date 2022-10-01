<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Search;

class ConcessBateau extends Model
{
    protected $table = "bateaux";
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
