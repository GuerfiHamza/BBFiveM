<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FiveM\Job;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $organisations = Job::higherGrade();
        // dd('$organisations');
        return view('dashboard.entreprise', compact('organisations'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiveM\Job  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        $treasories = $job->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse();
        $treasoriesDifference = $job->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse()->map(function ($item, $key) use ($treasories) {
            if ($key > 0) {
                $item->treasory = $item->treasory - $treasories->get($key-1)->treasory;
            } else {
                $item->treasory = 0;
            }

            return $item;
        });
        foreach($job->vehicules as $v) {
            if ($v->vehicle_name() == "Véhicule Inconnu") {
                $test[$v->plate] = $v->informations()->model;
            }
        };
        return view('dashboard.organisation.show', ['organisation' => $job,
        'treasoriesDifference' => $treasoriesDifference,
        'treasories' => $treasories]);
    }

}
