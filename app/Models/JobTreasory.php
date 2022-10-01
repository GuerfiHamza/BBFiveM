<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTreasory extends Model
{
    protected $fillable = [
        'job_name',
        'treasory',
        'created_at',
    ];

    public function job()
    {
        return $this->belongsTo('App\Models\FiveM\Job', 'job_name', 'name');
    }
}
