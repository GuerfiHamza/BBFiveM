<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondJob extends Model
{
    protected $table = "second_jobs";

    protected $fillable = [
        'identifier',
        'job1_name',
        'job1_grade',
        'job2_name',
        'job2_grade',
    ];
    public function player()
    {
        return $this->belongsTo('App\Models\FiveM\Player');
    }
}
