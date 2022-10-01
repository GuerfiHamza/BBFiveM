<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Form\ViewForm;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class FormBuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = ViewForm::all();
        return view('dashboard.form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FlasherInterface $flasher)
    {
        ViewForm::create([
            'name' => $request->formName,
            'contentForm' => $request->data,
        ]);
        $flasher->addSuccess('Formulaire créé avec succès');

        return redirect()->route('dashboard-form.index')
                ->with('success', 'Formulaire créé avec succès');
        // return view('test', ['data' => $request->data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form\ViewForm  $viewForm
     * @return \Illuminate\Http\Response
     */
    public function show($viewForm)
    {
        $viewForm = ViewForm::findOrFail($viewForm);

        return view('dashboard.form.show', ['form' => $viewForm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form\ViewForm  $viewForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewForm $viewForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form\ViewForm  $viewForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViewForm $viewForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form\ViewForm  $viewForm
     * @return \Illuminate\Http\Response
     */
    public function destroy($viewForm, FlasherInterface $flasher)
    {
        if (\Auth::user()->players->group == "superadmin") {
            $viewForm = ViewForm::findOrFail($viewForm);
            $viewForm->delete();
            $flasher->addSuccess('Le formulaire a bien été supprimé.');

            return redirect()->route('dashboard-form.index')
                    ->with('success', 'Le formulaire a bien été supprimé.');
        }
        $flasher->addError('Permissions insuffisantes.');

        return redirect()->route('dashboard-form.index')
                ->with('error', 'Permissions insuffisantes.');
    }
}
