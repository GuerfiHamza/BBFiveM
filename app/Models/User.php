<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use restray\FormBuilder\Traits\HasFormBuilderTraits;

class User extends Authenticatable
{
    use Notifiable, HasFormBuilderTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'steamID','avatar', 'soft_permission_dashboard', 'token_bearer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    public function players()
    {
        return $this->hasOne('App\Models\FiveM\Player', 'identifier', 'steamID');
    }

 
    protected static function getUserByUsername(string $username){
        return self::where('name', $username)->firstOrFail();
    }
    public function getGradeNameAttribute()
    {
        return $this->players->getJobGrade()->label;
    }

    public function canSeeDashboard()
    {
        return $this->soft_permission_dashboard;
    }

    public function isAdmin()
    {
        return $this->players->group == "admin" || $this->players->group == "superadmin";
    }
    // public function isModo()
    // {
    //     if (\App\Models\FiveM\Permissions::where('identifier', '=', \Auth::user()->players->identifier)->whereIn('rank', ['modo','admin','gerant'])->first()) {
    //         return true;
    //     }
    //     return false;
    // }
   


}
