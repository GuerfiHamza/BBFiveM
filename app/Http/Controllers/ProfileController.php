<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FiveM\Billing;
use App\Models\FiveM\BankSaving;
use App\Models\SecondJob;
use Alert;
use App\Models\FiveM\Player;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $players = null;
        $user = \Auth::user();
        if ($user->players) {
            $players = $user->players;
        }
     
        return view('profile.index', compact('user', 'players'));
    }

    public function entreprise()
    {
        $entreprise = \Auth::user()->players->getJob();

        $vehicules = \App\Models\FiveM\Vehicule::All();
        $billings = \App\Models\FiveM\Billing::where('target', '=', 'society_'.$entreprise->name.'')
        ->get();
        $treasories = $entreprise->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse();
        $treasoriesDifference = $entreprise->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse()->map(function ($item, $key) use ($treasories) {
            if ($key > 0) {
                $item->treasory = $item->treasory - $treasories->get($key-1)->treasory;
            } else {
                $item->treasory = 0;
            }

            return $item;
        });

        $test = [];

        foreach($entreprise->vehicules as $v) {
            if ($v->vehicle_name() == "Véhicule Inconnu") {
                $test[$v->plate] = $v->informations()->model;
            }
        };
        // dd(collect($test)->unique());
        return view('profile.entreprise', compact('entreprise', 'treasories', 'treasoriesDifference', 'billings', 'vehicules'));
    }
    public function org()
    {
        $org = \Auth::user()->players->getorg();

        $treasories = $org->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse();
        $treasoriesDifference = $org->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse()->map(function ($item, $key) use ($treasories) {
            if ($key > 0) {
                $item->treasory = $item->treasory - $treasories->get($key-1)->treasory;
            } else {
                $item->treasory = 0;
            }

            return $item;
        });

        $test = [];

        foreach($org->vehicules as $v) {
            if ($v->vehicle_name() == "Véhicule Inconnu") {
                $test[$v->plate] = $v->informations()->model;
            }
        };

        // dd($org->validationStringVehicles());

        return view('profile.org', compact('org', 'treasories', 'treasoriesDifference'));
    }

    public function setjob1(Player $player)
    {
        // \Auth::user()->players->identifier
        $player = Player::findOrFail(\Auth::user()->players->identifier);
        $job1 = SecondJob::where('identifier', \Auth::user()->players->identifier)->first();
        if ($player->isPlayerOnline()) {
            Alert::toast('Vous êtes en ville.', 'error');

            return redirect()->route('profile');
        }

        DB::connection('fivem')
              ->table('users')
              ->where('identifier', $job1->identifier)
              ->update(['job' => $job1->job1_name, 'job_grade' => $job1->job1_grade]);

        Alert::toast('Votre metier viens d\'être modifier.', 'success');

        return redirect()->route('profile');
    }
    public function setorg(Player $player)
    {
        // \Auth::user()->players->identifier
        $player = Player::findOrFail(\Auth::user()->players->identifier);
        $org = SecondJob::where('identifier', \Auth::user()->players->identifier)->first();
        if ($player->isPlayerOnline()) {
            Alert::toast('Vous êtes en ville.', 'error');

                return redirect()->route('profile');
        }

        DB::connection('fivem')
              ->table('users')
              ->where('identifier', $org->identifier)
              ->update(['job' => $org->org_name, 'job_grade' => $org->org_grade]);

        Alert::toast('Votre metier viens d\'être modifier.', 'success');

        return redirect()->route('profile');

    }
}
