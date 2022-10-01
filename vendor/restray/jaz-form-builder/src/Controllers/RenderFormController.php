<?php
/*--------------------
https://github.com/jazmy/laravelformbuilder
Licensed under the GNU General Public License v3.0
Author: Jasmine Robinson (jazmy.com)
Last Updated: 12/29/2018
----------------------*/
namespace restray\FormBuilder\Controllers;

use App\Http\Controllers\Controller;
use restray\FormBuilder\Helper;
use restray\FormBuilder\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
class RenderFormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('public-form-access');
    }

    /**
     * Render the form so a user can fill it
     *
     * @param string $identifier
     * @return Response
     */
    public function render($identifier)
    {
        $form = Form::where('identifier', $identifier)->where('enabled', '=', true)->firstOrFail();

        $pageTitle = "{$form->name}";

        return view('formbuilder::render.index', compact('form', 'pageTitle'));
    }

    /**
     * Process the form submission
     *
     * @param Request $request
     * @param string $identifier
     * @return Response
     */
    public function submit(Request $request, $identifier)
    {
        $form = Form::where('identifier', $identifier)->where('enabled', '=', true)->firstOrFail();

        DB::beginTransaction();

        try {
            $input = $request->except('_token');

            // check if files were uploaded and process them
            $uploadedFiles = $request->allFiles();
            foreach ($uploadedFiles as $key => $file) {
                // store the file and set it's path to the value of the key holding it
                if ($file->isValid()) {
                    $input[$key] = $file->store('fb_uploads', 'public');
                }
            }

            $user_id = auth()->user()->id ?? null;
            $username = auth()->user()->name;
            $form->submissions()->create([
                'user_id' => $user_id,
                'content' => $input,
            ]);

            DB::commit();
            \Alert::toast('Formulaire envoyé !', 'success');

            $respons = Http::post('https://discord.com/api/webhooks/969086181562265640/SeMo-1jArEpWuIgP_BtIrv1ISgaJGcPc5iUJ9LsngAxsjQjqefa_Q8SvdDmAJtNnPG2W', [
                'content' => "Nouvelle soumission de douane !",
                'embeds' => [
                    [
                        'title' =>  $username.' a envoyé le formulaire de '.$form->name,
                        'description' => $username.' a envoyé le formulaire de '.$form->name,
                        'color' => '16711680',
                    ]
                ],
            ]);
            return redirect()->back();

        } catch (Throwable $e) {
            info($e);

            DB::rollback();

            return back()->withInput()->with('error', Helper::wtf());
        }
    }

    /**
     * Display a feedback page
     *
     * @param string $identifier
     * @return Response
     */
    public function feedback($identifier)
    {
        $form = Form::where('identifier', $identifier)->firstOrFail();

        $pageTitle = "Formulaire envoyé!";

        return view('formbuilder::render.feedback', compact('form', 'pageTitle'));
    }
}
