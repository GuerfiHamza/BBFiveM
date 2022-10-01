<?php

namespace App\Models\FiveM;

use Illuminate\Database\Eloquent\Model;

class JobGrade extends Model
{
    protected $connection = 'fivem';
    protected $table = 'job_grades';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'job_name',
        'grade', // Higher it is higher the job is placed (5->boss; 1->recruited)
        'name',
        'label',
        'salary',
    ];

    public function job()
    {
        return $this->belongsTo('App\Models\FiveM\Job', 'job_name');
    }

    public function getMembers()
    {
        return \App\Models\FiveM\Player::where('job_grade', '=', $this->grade)->where('job', '=', $this->job->name)->get();
    }

    public function getJobGrade()
    {
        return \App\Models\FiveM\JobGrade::where('job_name', '=', $this->job)->where('job_grade', '=', $this->job_grade)->get();

    }
    
    public function getJobGrade2()
    {
        return \App\Models\FiveM\JobGrade::where('job_name2', '=', $this->job)->where('job_grade2', '=', $this->job_grade2)->get();

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
