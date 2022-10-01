<?php

namespace App\Http\Controllers;

use App\Models\Darkchat;
use Illuminate\Http\Request;

class DarkchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dcs = Darkchat::whereNotNull('id')->orderBy('created_at')->get()->take(50);
            foreach ($dcs as $dc) {
                $dc->content = utf8_encode($dc->makeFakeContent());
            }
            
            return $dcs->toJson();
        } 

        return view('darkchat');
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
            'message' => 'required|max:1000',
        ]);
        
        if (\Auth::user()->removeMoney(2000)) {
            $darkchat = Darkchat::create([
                'content' => $request->message,
                'user_id' => \Auth::user()->id,
            ]);
    
            broadcast(new \App\Events\SendMessageOnDarkchatEvent($darkchat->id, utf8_encode($darkchat->makeFakeContent()), $darkchat->date))->toOthers();
    
            return $darkchat->toJson();
        }

        return 'false';
    }

    public function show(Darkchat $darkchat) 
    {
        if (\Auth::user()->removeMoney(500)) {
            return $darkchat;
        }

        return 'false';
    }
}
