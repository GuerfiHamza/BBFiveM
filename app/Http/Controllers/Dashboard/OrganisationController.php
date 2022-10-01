<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FiveM\Organisation;
use App\Models\FiveM\OrgWeapons;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisations = Organisation::paginate(10);
        return view('dashboard.organisation.index', compact('organisations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiveM\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function show(Organisation $organisation)
    {
        // $org = \DB::connection('fivem')->select('SELECT `data` FROM `datastore_data` WHERE `name`="organisation_'.$organisation->name.'"');
        //     $weapons = [];

        //     foreach ($org as $organisation) {
        //         dd($organisation);

        //         if ($data = $lod) {
        //             $collection = collect(json_decode($org, true))
        //                 ->where('name', '!=', 'WEAPON_PETROLCAN')->where('name', '!=', 'GADGET_PARACHUTE')->where('name', '!=', 'WEAPON_FLASHLIGHT');

        //             if ($collection->count()) {
        //                 array_push($weapons, $collection->merge(['organisation' => $organisation]));
        //             }
        //         }

        //     }
        $weapon = OrgWeapons::where('name', '=', 'organisation_'.$organisation->name)->select('data')
                        ->get();
        $weapons = [];
        foreach ($weapon as $wp) {
            if ($data = $wp->getLoadout()) {
                $collection = collect(json_decode($wp->data, true))
                ->where('name', '!=', 'WEAPON_PETROLCAN')->where('name', '!=', 'GADGET_PARACHUTE')->where('name', '!=', 'WEAPON_FLASHLIGHT');


                if ($collection->count()) {
                    array_push($weapons, $collection->merge(['wp' => $wp]));
                }
            }
        }
        // dd($wp->getLoadout()->weapons);
        $treasories = $organisation->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse();
        $treasoriesDifference = $organisation->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse()->map(function ($item, $key) use ($treasories) {
            if ($key > 0) {
                $item->treasory = $item->treasory - $treasories->get($key-1)->treasory;
            } else {
                $item->treasory = 0;
            }

            return $item;
        });
        foreach($organisation->vehicules as $v) {
            if ($v->vehicle_name() == "Véhicule Inconnu") {
                $test[$v->plate] = $v->informations()->model;
            }
        };

        return view('dashboard.organisation.show', compact('organisation','treasories', 'treasoriesDifference','wp'));
    }

}
