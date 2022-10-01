<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrgTreasory extends Model
{
    protected $fillable = [
        'org_name',
        'treasory',
        'created_at',
    ];

    public function org()
    {
        return $this->belongsTo('App\Models\FiveM\Organisation', 'org_name', 'name');
    }
}
