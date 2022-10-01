<?php

namespace App\Http\Controllers\Dashboard;

use DB;
use App\Http\Controllers\Controller;
use App\Models\FiveM\Items;
use App\Models\FiveM\Player;
// use App\Models\FiveM\Player;
use App\Models\FiveM\VehiculePossessed;
use App\Models\FiveM\Billing;
use App\Models\FiveM\License;
use App\Models\FiveM\PlayerInventory;
use App\Models\SecondJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Flasher\Prime\FlasherInterface;

use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class PlayerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::paginate(10);
        // $accounts = Player:
        return view('dashboard.player.index', compact('players'));
    }
   
    public function jobedit(Request $request, Player $player, FlasherInterface $flasher)
    {
        if ($player->isPlayerOnline()) {
            $flasher->addError('Ce joueur est connecté, vous ne pouvez pas faire ça.');

            return redirect()->back()
                    ->with('error', 'Ce joueur est connecté, vous ne pouvez pas faire ça.');
        }

        DB::connection('fivem')
              ->table('users')
              ->where('identifier', $request->identifier)
              ->update(['job' => $request->job, 'job_grade' => $request->job_grade]);
              $flasher->addSuccess('Le métier de joueur a été modifier.');
        return redirect()->back();

    }
    public function orgedit(Request $request, Player $player, FlasherInterface $flasher)
    {
        if ($player->isPlayerOnline()) {
            $flasher->addError('Ce joueur est connecté, vous ne pouvez pas faire ça.');

            return redirect()->back()
                    ->with('error', 'Ce joueur est connecté, vous ne pouvez pas faire ça.');
        }

        DB::connection('fivem')
              ->table('users')
              ->where('identifier', $request->identifier)
              ->update(['org' => $request->org, 'org_grade' => $request->org_grade]);
              $flasher->addSuccess('Le métier de joueur a été modifier.');
        return redirect()->back();

    }
    public function getWeapons()
    {
        $players = Player::whereBetween('lastconnexion', [now()->subWeeks(2), now()])
                        ->whereNotNull('loadout')
                        ->get();

        $weapons = [];

        foreach ($players as $player) {
            if ($loadout = $player->getLoadout()) {
                $collection = collect(json_decode($player->loadout, true))
                    ->where('name', '!=', 'WEAPON_PETROLCAN')->where('name', '!=', 'GADGET_PARACHUTE')->where('name', '!=', 'WEAPON_FLASHLIGHT');

                if ($collection->count()) {
                    array_push($weapons, $collection->merge(['player' => $player]));
                }
            }
        }

        return view('dashboard.player.weapons', compact('weapons'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiveM\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('dashboard.player.show', compact('player'));
    }

    /**
     * Display the player billings.
     *
     * @param  \App\Models\FiveM\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function showBillings(Player $player)
    {
        $billings = \App\Models\FiveM\Billing::where('identifier', '=', $player->identifier)
                                            ->get();
        $ibanques = \App\Models\FiveM\Ibanque::where('identifier', '=', $player->identifier)->paginate(10);
        // dd($ibanque);
         $treasories = $player->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse();
        $treasoriesDifference = $player->getTreasories()->sortByDesc('created_at')->take(24*30)->reverse()->map(function ($item, $key) use ($treasories) {
            if ($key > 0) {
                $item->treasory = $item->treasory - $treasories->get($key-1)->treasory;
            } else {
                $item->treasory = 0;
            }

            return $item;
        });
        return view('dashboard.player.show_billings', compact('player', 'billings','treasories', 'treasoriesDifference', 'ibanques'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FiveM\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player, FlasherInterface $flasher)
    {
        if (\Auth::user()->players->group != "superadmin") {
            $flasher->addError('Cette opération est interdite.');

            return redirect()->back()
                    ->with('error', 'Cette opération est interdite.');
        }

        if ($player->getUser() === null) {
            $flasher->addError('Cet utilisateur ne s\'est jamais connecté.');

            return redirect()->back()
                    ->with('error', 'Cet utilisateur ne s\'est jamais connecté.');
        }

        $player->getUser()->fill([
            'soft_permission_dashboard' => $request->access == "1"
        ])->save();
        $flasher->addSuccess('L\'utilisateur a bien reçu son role.');

        return redirect()->back()
                ->with('success', "L'utilisateur a bien reçu son role.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FiveM\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Player $player, FlasherInterface $flasher)
    {
        if (\Auth::user()->players->group != "superadmin" && \Auth::user()->players->group != "admin") {
            $flasher->addError('Vous n\'avez pas les droits pour effectuer cette action.');

            return redirect()->back();
        }

        if ($player->isPlayerOnline()) {
            $flasher->addError('Ce joueur est connecté, vous ne pouvez pas faire ça.');
            return redirect()->back();
        }

        if ($request->identifier == $player->identifier) {
            DB::connection('fivem')->delete('DELETE FROM addon_account_data WHERE owner = \''. $player->identifier .'\'');
            DB::connection('fivem')->delete('DELETE FROM billing WHERE identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM billing WHERE sender = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM taxbills WHERE identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM taxbills WHERE sender = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM datastore_data WHERE owner = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM open_car WHERE identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM owned_vehicles WHERE owner = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM rented_vehicles WHERE owner = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM open_car WHERE identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM user_accounts WHERE identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM player_contacts WHERE identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM user_inventory WHERE identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM user_lastcharacter WHERE steamid = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM users WHERE identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM loaf_bought_houses where owner = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM loaf_current_property where identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM loaf_properties where owner = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM loaf_keys where identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM whatsapp_accounts where id = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM user_accessories where identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM sim where identifier = \''. $player->identifier .'\';');
            DB::connection('fivem')->delete('DELETE FROM player_notes where identifier = \''. $player->identifier .'\';');

            \Log::info($player->name.' vient d\'etre wipe.');

            $flasher->addSuccess('Le Joueur vient d\'être wipe !');
            return redirect()->route('dashboard-player.index')
                    ->with('success', 'Le joueur a bien été Wipe.',
                    Http::post('https://discord.com/api/webhooks/964578588231872512/FWNE8XkAX5RxLGYVKLKFuL_Ez1-gFnUzQV9IE2XsLcRc5GklEUbi9WDihF816NiS_2D-', [
                        'content' => "Un joueur viens d'etre wipe",
                        'embeds' => [
                            [
                                'title' =>  $player->name.' a été wipe par '.\Auth::user()->players->name,
                                'color' => '16711680',
                            ]
                        ],
                    ]));
        }
        $flasher->addError('Saisissez l\'identifiant du joueur.');
        return redirect()->back();
                
    }

    public function search(Request $request, Player $player)
    {
        $results = Player::query()
        ->where('name', 'LIKE', '%'.$request->search.'%')
        ->orWhere('identifier', 'LIKE', '%'.$request->search.'%')
        ->orWhere('license', 'LIKE', '%'.$request->search.'%')
        ->orWhere('name', 'LIKE', '%'.$request->search.'%')
        ->orWhere('firstname', 'LIKE', '%'.$request->search.'%')
        ->orWhere('lastname', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
        $billings = Billing::query()
        ->where('sender', 'LIKE', '%'.$request->search.'%')
        ->orWhere('identifier', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
        $vehicules = VehiculePossessed::query()
        ->where('owner', 'LIKE', '%'.$request->search.'%')
        ->orWhere('plate', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
        $licenses = License::query()
        ->where('owner', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
        // dd($results, $billing, $vehicules);
        return view('dashboard.player.search', compact('results', 'billings', 'vehicules', 'licenses'));   
        
    }
}
