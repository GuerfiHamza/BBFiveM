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
use restray\FormBuilder\Models\Submission;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class SubmissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param integer $form_id
     * @return \Illuminate\Http\Response
     */
    public function index($form_id)
    {
        $form = Form::where(['id' => $form_id])
                    ->with(['user'])
                    ->firstOrFail();

        $submissions = $form->submissions()
                            ->with('user')->get();

        // get the header for the entries in the form
        $form_headers = $form->getEntriesHeader();

        $pageTitle = __("Toutes les soumissions pour ")."'{$form->name}'";

        return view(
            'formbuilder::submissions.index',
            compact('form', 'submissions', 'pageTitle', 'form_headers')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $form_id
     * @param integer $submission_id
     * @return \Illuminate\Http\Response
     */
    public function show($form_id, $submission_id)
    {
        $submission = Submission::with('user', 'form')
                            ->where([
                                'form_id' => $form_id,
                                'id' => $submission_id,
                            ])
                            ->firstOrFail();

        $form_headers = $submission->form->getEntriesHeader();

        $pageTitle = "View Submission";

        return view('formbuilder::submissions.show', compact('pageTitle', 'submission', 'form_id', 'form_headers'));
    }
    
    public function update(Request $request, $form_id, $submission_id, FlasherInterface $flasher) 
    {
        $submission = Submission::where(['form_id' => $form_id, 'id' => $submission_id])->firstOrFail();
        $submission->tag = $request->tag;
        $submission->save();
        $flasher->addSuccess('Soumission bien mis à jour.');
        
        return redirect()
                    ->route('formbuilder::forms.submissions.show', ['fid' => $form_id, 'submission' => $submission_id])
                    ->with('success', __('Soumission bien mis à jour.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $form_id
     * @param int $submission_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($form_id, $submission_id, FlasherInterface $flasher)
    {
        $submission = Submission::where(['form_id' => $form_id, 'id' => $submission_id])->firstOrFail();
        $submission->delete();
        $flasher->addSuccess('Soumission bien supprimée.');

        return redirect()
                    ->route('formbuilder::forms.submissions.index', $form_id)
                    ->with('success', __('Soumission bien supprimée.'));
    }
}
