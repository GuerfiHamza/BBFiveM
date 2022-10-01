<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $connection = 'fivem';

    protected $table = "zadmin_players";
}
