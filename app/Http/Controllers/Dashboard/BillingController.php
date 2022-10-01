<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FiveM\Billing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Flasher\Prime\FlasherInterface;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billings = Billing::paginate(10);
        return view('dashboard.billing.index', compact('billings'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing, FlasherInterface $flasher)
    {
        $billing->delete();
        $flasher->addSuccess('La facture a bien été retiré!');

        return redirect()->back()
        ->with('success', 'La facture a bien été retiré!',
                    Http::post('https://discord.com/api/webhooks/964579468213645392/lZUrEJA3qcaCicVLbnr3YBu6Yn5CSs4iXvoyXZXOhFAtro9zppfAVQNEUeXegRbmJjeT', [
                        'content' => "Facture retiré",
                        'embeds' => [
                            [
                                'title' =>  'La facture de '. $billing->playerreciv->name . ' / valeur de '. $billing->amount. '$ a été supprimé par '.\Auth::user()->players->name,
                                'color' => '16711680',
                            ]
                        ],
                    ]));
    }
}
