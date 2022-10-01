<?php

namespace App\Models\LSPD;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ADR extends Model
{
    protected $connection = 'fivem';
    protected $table = 'adr';
    protected $primaryKey  = 'id';
    public $timestamps = false;
    protected $fillable = [
        'author',
        'firstname',
        'lastname',
        'date',
        'reason',
        'dangerosity',
    ];
    public function getHumanType()
    {
        return [
            '1' => 'Coopératif',
            '2' => 'Dangereux',
            '3' => 'Dangereux et armé',
        ][$this->dangerosity];
    }
}
