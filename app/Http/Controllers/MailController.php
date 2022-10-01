<?php

namespace App\Http\Controllers;

use App\Models\CryptedEmail;
use App\Models\Mail;
use App\Models\User;
use App\Models\FiveM\Player;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = Mail::all();
        return view('emails.index', compact('mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allCryptedEmails = CryptedEmail::all();
        $allCryptedEmailsString = $allCryptedEmails->pluck('email');

        $emails = User::all();

        $allEmailsValidation = $emails->pluck('email')->merge($allCryptedEmailsString)->flip();
        foreach(\Auth::user()->getEmailAdresses() as $e) {
            $allEmailsValidation = $allEmailsValidation->forget($e);
        }
        $allEmailsValidation = $allEmailsValidation->flip()->implode(',');

        $request->validate([
            'from'      => 'required|in:'. \Auth::user()->getEmailAdresses()->implode(',') . ',new',
            'subject'   => 'required|string|max:50',
            'to'        => 'required|in:' . $allEmailsValidation,
            'content'   => 'required|string|max:5000',
        ]);

        if ($request->from == 'new') {
            $email = CryptedEmail::create([
                'prefix' => Str::random(25),
                'player_id' => \Auth::user()->players->license,
            ]);
            $email = $email->email;
        } else {
            $email = $request->from;
        }

        Mail::create([
            'to' => $request->to,
            'from' => $email,
            'reply_to' => $request->to,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

        return redirect()->route('email.index')
                ->with('success', 'Le mail a bien été envoyé');
    }

    public function createCrypted(Request $request) 
    {
        if (\Auth::user()->getEmailAdresses()->count() > 5) {
            return redirect()->back()
                    ->with('error', 'Vous ne pouvez pas avoir plus de 5 emails.');
        }

        CryptedEmail::create([
            'prefix' => Str::random(25),
            'player_id' => \Auth::user()->players->license,
        ]);

        return redirect()->route('email.index')
                ->with('success', 'Votre adresse e-mail a bien été créé.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show($mail)
    {
        $mail = Mail::findOrFail($mail);

        if ($mail->getReceiver()->id != \Auth::user()->id) {
            return json()->response('Unable to fetch...');
        }

        $mail->fill(['viewed' => true])->save();

        $mail->content = nl2br(e($mail->content));

        return response()->json($mail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy($mail)
    {
        $mail = Mail::find($mail);

        if ($mail->getReceiver()->id != \Auth::user()->id) {
            return redirect()->route('email.index')
                            ->with('error', 'Vous ne pouvez pas supprimer un mail qui ne vous appartient pas.');
        }

        $mail->delete();

        return redirect()->route('email.index')
                ->with('success', 'Le mail vient d\'etre supprimer.');
    }
    
    public function destroyCrypted(Request $request) 
    {   
        $request->validate([
            'email' => 'required|in:'. \Auth::user()->getEmailAdresses()->implode(','),
        ]);

        // Delete all mails related to the crypted adress
        Mail::where('from', '=', $request->email)
            ->orWhere('to', '=', $request->email)
            ->delete();

        // Delete all mails related to the crypted adress
        CryptedEmail::where('prefix', '=', explode('@', $request->email)[0])->delete();

        return redirect()->route('email.index')
                ->with('success', 'Votre adresse e-mail a bien été détruite, il ne reste aucune trace.');
    }
}
