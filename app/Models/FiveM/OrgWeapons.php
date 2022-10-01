<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class OrgWeapons extends Model
{
    protected $connection = 'fivem';
    protected $table = 'datastore_data';

    protected $primaryKey  = 'id';


    public function getLoadout()
    {
        return json_decode($this->data);
    }
}
