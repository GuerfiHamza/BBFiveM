<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    protected $connection = 'fivem';
    protected $table = 'users';

    protected $primaryKey  = 'identifier';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'inventory' => 'object',
        'status' => 'array',
    ];
    protected $fillable = [
        'identifier', // Steam hex: "steam:steamhex"
        'license', // License: "license:"

        // Character Identity
        'name',
        'firstname',
        'lastname',
        'dateofbirth',
        'sex', // => M, F
        'height',
        'skin',
        // Character Property
        'warrant', // => No
        'lastdigits',
        'phone_number', // Phone number => 5555XXXX
        'is_dead', // => 0, 1
        'pet', // Nullable
        'jail', // 0/1
        'tatoos',
        'loadout', // Armement: "name", "label", "ammo", "component"
        'accounts', // Argent en liquide: "name", "amount"
        'bank',

        // Job
        'job', // => unemployed, miner,
        'job_grade',
        'org', // => unemployed, miner,
        'org_grade',
        

        // Server Info
        'lastconnexion', // => Date
        'position', // => {"z": 00.00, "y": 00.00, "x": 00.00}
        'permission_level',
        'group',
    ];

    public function getUser()
    {
        $users = \App\Models\User::where('steamID', '=', $this->identifier)->get();

        if ($users->count() > 0) {
            return $users->first();
        }

        return null;
    }
    public function jobs()
    {
        return $this->belongsTo('App\Models\SecondJob', 'identifier');
    }
    public function job()
    {
        return $this->belongsTo('App\Models\FiveM\Job', 'job', 'name');
    }
    public function job_grade()
    {
        return $this->belongsTo('App\Models\FiveM\JobGrade', 'job_grade');
    }
 
    public function org()
    {
        return $this->belongsTo('App\Models\FiveM\Organisation', 'org', 'name');
    }

    public function org_grade()
    {
        return $this->belongsTo('App\Models\FiveM\OrgGrade', 'org_grade');
    }

    public function organisation()
    {
        return $this->hasMany('App\Models\FiveM\Organisation', 'name', 'org');
    }

    public function vehicules()
    {
        return $this->hasMany('App\Models\FiveM\Vehicule', 'client', 'name');
    }
    public function posseder()
    {
        return $this->hasMany('App\Models\FiveM\VehiculePossessed', 'owner', 'identifier');
    }
    public function billingsender()
    {
        return $this->hasMany('App\Models\FiveM\Billing', 'sender', 'identifier');
    }
    public function billingreceiv()
    {
        return $this->hasMany('App\Models\FiveM\Billing', 'identifier', 'identifier');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\FiveM\JobGrade', 'job_name', 'name');
    }

    public function getJob()
    {

        if ($this->job == "unemployed") {
            return null;
        }
        return $this->job()->first();
    }

    public function higherGrade()
    {
        return $this->grades->sortByDesc('grade')->first();
    }
    public function getOrg()
    {
        if ($this->org == "unorg") {
            return null;
        }

        return $this->org()->first();
    }

    public function getJobGrade()
    {
      
        $grades = \App\Models\FiveM\JobGrade::where('job_name', '=', $this->job)->where('grade', '=', $this->job_grade)->get();

        if ($grades->count() > 0) {
            return $grades->first();
        }

        return null;
    }
  

    public function getOrgGrade()
    {
        if ($this->org == "unorg") {
            return null;
        }

        $grades = \App\Models\FiveM\OrgGrade::where('org_name', '=', $this->org)->where('grade', '=', $this->org_grade)->get();

        if ($grades->count() > 0) {
            return $grades->first();
        }

        return null;
    }

    public function isBoss()
    {
        if ($job = $this->getJob()) {
                return $job->higherGrade()->id == $this->getJobGrade()->id;
        }
        return false;
    }
    public function isOrgBoss()
    {
        if ($org = $this->getOrg()) {
            return $org->higherGrade()->id == $this->getOrgGrade()->id;
        }
        return false;
    }


    public function isPlayerOnline()
    {
        return \App\Helpers\OnlinePlayer::getOnlinePlayers()->where('steamhex', '=', $this->identifier)->count() > 0;
    }

    public function getLoadout()
    {
        return json_decode($this->loadout);
    }

    public function getName()
    {
        return ($this->firstname . " " . $this->lastname);
    }
    public function getPosition()
    {
        $position = json_decode($this->position);
        return \App\Helpers\ConvertPositionToPx::convert($position->x, $position->y);
    }

    public function getHunger()
    {
        $informations = json_encode($this->status);
        $informations = $this->status[1];
        $faim = $informations;
        $faim = str_replace('hunger', 'Faim', $faim);
        return $faim;

    }
    public function getThirst()
    {
        $informations = json_encode($this->status);
        $informations = $this->status[2];
        $faim = $informations;
        $faim = str_replace('thirst', 'Soif', $faim);
        return $faim;

    }
    public function getDrunk()
    {
        $informations = json_encode($this->status);
        $informations = $this->status[0];
        $faim = $informations;
        $faim = str_replace('drunk', 'Soule', $faim);
        return $faim;

    }
 
    public function get_phone_number()
    {
        $phone = $this->phone_number;
       
        return $phone;   

    }

    public function phonenumber()
    {
        return json_decode($this->charinfo);
    }
    public function getInv()
    {
         $inv =  $this->inventory;
        //  dd($inv);
        return $inv;

    }

    public function getSex()
    {
        if ($this->sex == "m") {
            return "Homme";
        } elseif ($this->sex == "f") {
            return "Femme";
        }

        return "Inconnu";
    }

    public function getHeight()
    {
        return substr_replace($this->height, "m", 1, 0);
    }

    public function isTatooed()
    {
        return $this->tatoos !== null;
    }

    public function getTreasory()
    {
        $bank = \DB::connection('fivem')->select('SELECT `accounts` FROM `users` WHERE `identifier`="' . $this->identifier . '"');
        $bank = json_decode($bank[0]->accounts);
        
        return $bank->bank;
    }

    public function maison()
    {
        $maison = \DB::connection('fivem')->select('SELECT * FROM `loaf_bought_houses` WHERE `owner`="' . $this->identifier . '"');
        return $maison;
    }

    public function getTreasories()
    {
        return \App\Models\PlayerTreasory::where('identifier', '=', $this->identifier)->get();
    }

   
}
