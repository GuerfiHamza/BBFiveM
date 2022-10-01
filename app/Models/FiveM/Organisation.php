<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $connection = 'fivem';
    protected $table = 'org';
    protected $primaryKey  = 'name';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'name',
        'label'
    ];

    public function members()
    {
        return $this->hasMany('App\Models\FiveM\Player', 'org', 'name');
    }
    public function isOrgMember($player)
    {
        if ($org = $player->getOrg()) {
            return $org->name == $this->name;
        }

        return false;
    }
    public function getTreasory()
    {
        $moneys = \DB::connection('fivem')->select('SELECT `money` FROM `addon_account_data` WHERE `account_name`="organisation_'.$this->name.'"');

        if (count($moneys)) {
            return $moneys[0]->money;
        }

        return 0;
    }

    public function getTreasories()
    {
        return \App\Models\OrgTreasory::where('org_name', '=', $this->name)->get();
    }
    public function grades()
    {
        return $this->hasMany('App\Models\FiveM\OrgGrade', 'org_name', 'name');
    }

    public function vehicules()
    {
        return $this->hasMany('App\Models\FiveM\VehiculePossessed', 'org', 'name');
    }
    public function isMember($player)
    {
        if ($org = $player->getOrg()) {
            return $org->name == $this->name;
        }

        return false;
    }
    public function higherGrade()
    {
        return $this->grades->sortByDesc('grade')->first();
    }

    public function validationStringMembers()
    {
        return $this->members->pluck('identifier')->implode(',');
    }

    public function validationStringGrades()
    {
        return $this->grades->pluck('id')->implode(',');
    }

    public function validationStringVehicles()
    {
        return $this->vehicules->pluck('plate')->implode(',');
    }
    public function getLoadout()
    {
        return json_decode($this->data);
    }
}
