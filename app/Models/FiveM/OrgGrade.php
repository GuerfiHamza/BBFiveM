<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class OrgGrade extends Model
{
    protected $connection = 'fivem';
    protected $table = 'org_grades';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'org_name',
        'grade', // Higher it is higher the job is placed (5->boss; 1->recruited)
        'name',
        'label',
        'salary',
    ];

    public function org()
    {
        return $this->belongsTo('App\Models\FiveM\Organisation', 'org_name');
    }

    public function getMembers()
    {
        return \App\Models\FiveM\Player::where('org_grade', '=', $this->grade)->where('org', '=', $this->org->name)->get();
    }

    public function arePlayersOnline()
    {
        $query = \App\Helpers\OnlinePlayer::getOnlinePlayers();

        foreach($this->getMembers() as $member) {
            if ($member->isPlayerOnline()) {
                return true;
            }
        }

        return false;
    }
}
