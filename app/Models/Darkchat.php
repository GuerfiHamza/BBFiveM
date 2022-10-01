<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Darkchat extends Model
{
    protected $fillable = [
        'content',
        'user_id',
    ];

    protected $visible = ['content', 'id', 'date'];
    protected $appends = ['date'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getDateAttribute()
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, 'Europe/Paris')->format('d/m/Y G:i');
    }

    public function makeFakeContent()
    {
        $rdstr = 'abcdefghijklmnopqrstuvwxyz0123456789$£*/-+._-()°²&€';
        $str = [];

        foreach(str_split($this->content) as $c) {
            if ($c != " ") {
                array_push($str, (string)str_split($rdstr)[array_rand(str_split($rdstr))]);
            } else {
                array_push($str, ' ');
            }
        }

        return implode("", $str);
    }
}
