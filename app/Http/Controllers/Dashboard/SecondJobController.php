<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SecondJob as ModelsSecondJob;
use Illuminate\Http\Request;

class SecondJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doublejobs = ModelsSecondJob::all();
        return view('dashboard.player.doublejob', compact('doublejobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'identifier' => 'unique:second_jobs',

            ]);
        ModelsSecondJob::create([
            'identifier' => $request->identifier,
            'job1_name' => $request->job1_name,
            'job1_grade' => $request->job1_grade,
            'job2_name' => $request->job2_name,
            'job2_grade' => $request->job2_grade
        ]);
        return redirect()->back()
        ->with('success', "Le métier de joueur a été ajouter.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsSecondJob $doublejob)
    {
        $doublejob->delete();

        return redirect()->back()
                ->with('success', 'La double job a bien été retiré!');
    }
}
