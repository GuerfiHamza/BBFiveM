<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerInventory extends Model
{
    protected $connection = 'fivem';
    protected $table = 'user_inventory';

    protected $primaryKey  = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'identifier', // Steam hex: "steam:steamhex"
        'item',
        'count'

    ];

    public function label()
    {
        return $this->belongsTo('App\Models\FiveM\Items', 'item', 'name');
    }
}
