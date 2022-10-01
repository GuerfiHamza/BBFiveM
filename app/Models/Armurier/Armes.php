<?php

namespace App\Models\Armurier;

use App\Models\Search;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armes extends Model
{
    protected $table = "armes";
    use Search; // Use the search trait we created earlier
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
