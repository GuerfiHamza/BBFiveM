<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeazelNews extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'title',
        'slug',
        'auteur',
        'preview',
        'photo',
        'content',
        'likes',
    ];
}
