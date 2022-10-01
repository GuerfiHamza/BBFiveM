<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $connection = 'fivem';
    protected $table = 'jobs';
    protected $primaryKey  = 'name';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'name',
        'label',
        'whitelisted', // Boolean
    ];

    public function members()
    {
        return $this->hasMany('App\Models\FiveM\Player', 'job', 'name');
    }

    public function members2()
    {
        return $this->hasMany('App\Models\FiveM\Player', 'org', 'name');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\FiveM\JobGrade', 'job_name', 'name');
    }

    public function vehicules()
    {
        return $this->hasMany('App\Models\FiveM\VehiculePossessed', 'job', 'name');
    }
    public function vehicules2()
    {
        return $this->hasMany('App\Models\FiveM\VehiculePossessed', 'job', 'name');
    }

    public function getTreasory()
    {
        $moneys = \DB::connection('fivem')->select('SELECT `money` FROM `addon_account_data` WHERE `account_name`="society_'.$this->name.'" OR `account_name`="organisation_'.$this->name.'"');

        if (count($moneys)) {
            return $moneys[0]->money;
        }

        return 0;
    }
    // public function getTreasory2()
    // {
    //     $moneys = \DB::connection('fivem')->select('SELECT `money` FROM `addon_account_data` WHERE `account_name`="organisation_'.$this->name.'"');

    //     if (count($moneys)) {
    //         return $moneys[0]->money;
    //     }

    //     return 0;
    // }
    public function isMember($player)
    {
        if ($job = $player->getJob()) {
            return $job->name == $this->name;
        }

        return false;
    }
    public function isMember2($player)
    {
        if ($job = $player->getOrg()) {
            return $job->name == $this->name;
        }

        return false;
    }
    public function getTreasories()
    {
        return \App\Models\JobTreasory::where('job_name', '=', $this->name)->get();
    }
    public function getTreasories2()
    {
        return \App\Models\JobTreasory::where('job_name', '=', $this->name)->get();
    }
    /**
     * Get the higher grade of a job
     *
     * @return \App\Models\FiveM\JobGrade
     */
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
}
