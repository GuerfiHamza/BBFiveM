<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\FiveM\Player;
use \App\Models\FiveM\OrgGrade;
use \App\Models\FiveM\VehiculePossessed;

class OrgController extends Controller
{
    public function promote(Request $request)
    {
        // Get the org
        $org = \Auth::user()->players->getOrg();

        // Validate the client request
        $request->validate([
            'user' => 'required',
            'grade' => 'required',
        ]);

        // Get player
        $player = Player::findOrFail($request->user);

        // Not the boss user
        if ($player->identifier == \Auth::user()->players->identifier) {
            return redirect()->back()
                    ->with('error', 'Vous ne pouvez pas éditer votre propre poste.');
        }

        if ($player->isPlayerOnline()) {
            return redirect()->back()
                    ->with('error', 'Vous ne pouvez pas promouvoir une personne en ville.');
        }

        $grade = OrgGrade::findOrFail($request->grade);
        // Change the post of the player
        $player->org_grade = $grade->grade;
        $player->save();

        // Redirect on page
        return redirect()->route('org-index')
                ->with('success', 'Vous avez bien promu '. $player->name .' au poste ' . $grade->label);
    }

    public function retire(Request $request)
    {
        // Get the org and player from request
        $org = \Auth::user()->players->getOrg();
        $player = Player::findOrFail($request->user);

        // Validate the client request
        $request->validate([
            'user' => 'required',
            'name' => 'required|regex:('.$player->name.')',
        ]);

        if ($player->isPlayerOnline()) {
            return redirect()->back()
                    ->with('error', 'Vous ne pouvez pas virer une personne en ville.');
        }

        $player->org = "unorg";
        $player->org_grade = 0;
        $player->save();

        return redirect()->route('org-index')
                ->with('success', 'Vous avez bien viré '. $player->name .'.');
    }

    public function post(Request $request)
    {
        // Get the org and player from request
        $org = \Auth::user()->players->getOrg();

        $request->validate([
            'poste' => 'required',
            'name' => 'required|string|min:2',
            'salary' => 'required|numeric|min:1'
        ]);

        $poste = OrgGrade::findOrFail($request->poste);

        if ($poste->arePlayersOnline()) {
            return redirect()->back()
                    ->with('error', 'Vous ne pouvez pas modifier un poste si la/les personnes sont en ville.');
        }

        $poste->label = $request->name;
        $poste->salary = $request->salary;
        $poste->save();

        return redirect()->route('org-index')
                ->with('success', 'Vous avez bien modifié le poste '. $poste->label .'.');
    }

    public function allReattribute(Request $request)
    {
        // Get the org and player from request
        $org = \Auth::user()->players->getOrg();

        // Get all vehicules
        $vehicules = $org->vehicules();

        $members = $org->members;

        foreach ($members as $member) {
            $vehicules = $vehicules->where('owner', '!=', $member->identifier);
        }

        $vehicules->update([
            'owner' => \Auth::user()->players->identifier
        ]);

        return redirect()->route('org-index')
                ->with('success', 'Vous avez bien ré-attributé tous les véhicules des personnes non employés.');
    }

    public function vehicle(Request $request)
    {
        // Get the org and player from request
        $org = \Auth::user()->players->getOrg();

        $request->validate([
            'vehicle' => 'required',
            'player' => 'required',
        ]);

        // Get vehicle from request
        $vehicle = VehiculePossessed::findOrFail($request->vehicle);

        // If vehicle owner is online
        if ($vehicleOwner = $vehicle->player) {
            if ($vehicleOwner->isPlayerOnline()) {
                return redirect()->back()
                        ->with('error', 'Vous ne pouvez pas retirer le véhicule d\'une personne en ville.');
            }
        }

        if ($request->player != 'null') {
            $player = Player::findOrFail($request->player);

            if ($player->isPlayerOnline()) {
                return redirect()->back()
                        ->with('error', 'Vous ne pouvez pas attribué un véhicule à une personne en ville.');
            }
        }
        $vehicle->owner = ($request->player == "null" ? 1 : $request->player);
        $vehicle->save();

        return redirect()->route('org-index')
                ->with('success', 'Vous avez bien ré-attributé le véhicule.');
    }

}
