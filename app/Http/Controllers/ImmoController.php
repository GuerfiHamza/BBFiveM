<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Immobilier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImmoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $immos = Immobilier::All();
        return view('jobs.immo.index', compact('immos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.immo.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $immo = new Immobilier;

        $immo->nom = $request->nom;
        $immo->prix = $request->prix;

        $immo->save();

        if ($request->has('photo')) {
            $path = Storage::disk('public')->putFileAs(
                'public/immos', $request->file('photo'), $immo->id.'_immo.'.$request->file('photo')->extension()
            );
            $immo->photo = $path;
        }
        $immo->save();

        return redirect()->route('immobilier.index')->with('success', 'Item Ajouter!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Immobilier $immobilier)
    {
        return view('jobs.immo.show', compact('immobilier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Immobilier $immobilier)
    {
        return view('jobs.immo.form',compact('immobilier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $immo = Immobilier::find($id);
        $immo->nom = $request->nom;
        $immo->prix = $request->prix;

        $immo->save();

        if ($request->has('photo')) {
            $path = Storage::disk('public')->putFileAs(
                'public/immos', $request->file('photo'), $immo->id.'_immo.'.$request->file('photo')->extension()
            );
            $immo->photo = $path;
        }
        $immo->save();

        return redirect()->route('immobilier.index')->with('success', 'Item Modifier!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Immobilier $immobilier)
    {
        $immobilier->delete();
        return redirect()->route('immobilier.index')->with('success', 'Items Supprimer ! ');
    }
}
