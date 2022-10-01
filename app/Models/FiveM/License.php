<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $connection = 'fivem';
    protected $table = 'user_licenses';
    protected $primaryKey  = 'id';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'type',
        'owner',
    ];

    public function getNameAttribute()
    {
        return \DB::connection('fivem')->table("licenses")->where('type', '=', $this->type)->pluck('label')->first();
    }

    public function player()
    {
        return $this->belongsTo('App\Models\FiveM\Player', 'owner');
    }
}
