<?php

namespace App\Http\Controllers\Armurier;

use App\Http\Controllers\Controller;
use App\Models\Armurier\Armes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $armes = Armes::All();
        return view('jobs.armes.index', compact('armes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.armes.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arme = new Armes;

        $arme->nom = $request->nom;
        $arme->prix = $request->prix;

        $arme->save();

        if ($request->has('photo')) {
            $path = Storage::disk('public')->putFileAs(
                'public/armes', $request->file('photo'), $arme->id.'_arme.'.$request->file('photo')->extension()
            );
            $arme->photo = $path;
        }
        $arme->save();

        return redirect()->route('armes.index')->with('success', 'Item Ajouter!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Armes $arme)
    {
        return view('jobs.armes.show', compact('arme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Armes $arme)
    {
        return view('jobs.armes.form',compact('arme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Armes $arme)
    {
        $arme = Armes::find($arme->id);
        $arme->nom = $request->nom;
        $arme->prix = $request->prix;

        $arme->save();

        if ($request->has('photo')) {
            $path = Storage::disk('public')->putFileAs(
                'public/armes', $request->file('photo'), $arme->id.'_arme.'.$request->file('photo')->extension()
            );
            $arme->photo = $path;
        }
        $arme->save();

        return redirect()->route('armes.index')->with('success', 'Item Modifier!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Armes $arme)
    {
        $arme->delete();
        return redirect()->route('armes.index')->with('success', 'Items Supprimer ! ');
    }
}
