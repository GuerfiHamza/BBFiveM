<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    protected $connection = 'fivem';
    protected $table = 'items';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'name',
        'label'
    ];
    public function label()
    {
        return $this->belongsTo(Player::class, 'label');
    }
}
