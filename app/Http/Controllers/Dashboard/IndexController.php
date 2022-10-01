<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FiveM\Datastore;
use App\Models\FiveM\Job;
use App\Models\FiveM\Organisation;
use App\Models\FiveM\Player;
use App\Models\FiveM\VehiculePossessed;
use App\Models\JobTreasory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Analytics;

class IndexController extends Controller
{
    public function index()
    {
        $users = Player::count();
        $entreprises = Job::count();
        $org = Organisation::count();
        $vehicule = VehiculePossessed::count();
        $latest = Player::where('lastconnexion', '>=', Carbon::now()->subDays(7))->count();
        $bank = Player::All()->sum('bank');
       $money = Player::All()->sum('money');
        $entreprisemoney = JobTreasory::sum('treasory');
        $femme = Player::where('sex', 'f')->count();
        $homme = Player::where('sex', 'm')->count();
       
        return view('dashboard.index', compact('users', 'entreprises','bank', 'money', 'org','vehicule', 'latest','entreprisemoney', 'femme', 'homme'));
    }
}
