<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FiveM\License;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = License::paginate(10);
        
        return view('dashboard.license.index', compact('licenses'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiveM\License  $license
     * @return \Illuminate\Http\Response
     */
    public function show(License $license)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FiveM\License  $license
     * @return \Illuminate\Http\Response
     */
    public function edit(License $license)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FiveM\License  $license
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, License $license)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FiveM\License  $license
     * @return \Illuminate\Http\Response
     */
    public function destroy(License $license, FlasherInterface $flasher)
    {
        if ($license->player) {
            if ($license->player->isPlayerOnline()) {
            $flasher->addError('Le joueur est connecté, vous ne pouvez pas supprimer ses licenses.');

                return redirect()->back()
                        ->with('error', 'Le joueur est connecté, vous ne pouvez pas supprimer ses licenses');
            }
        }

        $license->delete();
        $flasher->addSuccess('La license a bien été retiré!');

        return redirect()->back()
                ->with('success', 'La license a bien été retiré!');
    }
}
