<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\FiveM\Player;
use \App\Models\FiveM\JobGrade;
use \App\Models\FiveM\VehiculePossessed;
Use Alert;

class JobController extends Controller
{
    public function promote(Request $request)
    {
        // Get the entreprise
        $entreprise = \Auth::user()->players->getJob();

        // Validate the client request
        $request->validate([
            'user' => 'required|in:'.$entreprise->validationStringMembers(),
            'grade' => 'required|in:'.$entreprise->validationStringGrades(),
        ]);

        // Get player
        $player = Player::findOrFail($request->user);

        // Not the boss user
        if ($player->identifier == \Auth::user()->players->identifier) {
            Alert::toast( 'Vous ne pouvez pas éditer votre propre poste.', 'error');

            return redirect()->back();

        }

        if ($player->isPlayerOnline()) {
        Alert::toast( 'Vous ne pouvez pas promouvoir une personne en ville.', 'error');

            return redirect()->back();

        }

        $grade = JobGrade::findOrFail($request->grade);

        // Change the post of the player
        $player->job_grade = $grade->grade;
        $player->save();

        Alert::toast( 'Vous avez bien promu '. $player->name .' au poste ' . $grade->label, 'success');
        // Redirect on page
        return redirect()->route('entreprise-index');
    }

    public function retire(Request $request)
    {
        // Get the entreprise and player from request
        $entreprise = \Auth::user()->players->getJob();
        $player = Player::findOrFail($request->user);

        // Validate the client request
        $request->validate([
            'user' => 'required|in:'.$entreprise->validationStringMembers(),
            'name' => 'required',
        ]);

        if ($player->isPlayerOnline()) {
        Alert::toast('Vous ne pouvez pas virer une personne en ville.', 'error');

            return redirect()->back();
        }

        $player->job = "unemployed";
        $player->job_grade = 0;
        $player->save();
        Alert::toast('Vous avez bien viré '. $player->name .'.', 'success');

        return redirect()->route('entreprise-index');
    }

    public function post(Request $request)
    {
        // Get the entreprise and player from request
        $entreprise = \Auth::user()->players->getJob();

        $request->validate([
            'poste' => 'required|in:'.$entreprise->validationStringGrades(),
            'name' => 'required|string|min:2',
            'salary' => 'required|numeric|min:1'
        ]);

        $poste = JobGrade::findOrFail($request->poste);

        if ($poste->arePlayersOnline()) {
        Alert::toast('Vous ne pouvez pas modifier un poste si la/les personnes sont en ville.', 'error');

            return redirect()->back();
        }

        $poste->label = $request->name;
        $poste->salary = $request->salary;
        $poste->save();
        Alert::toast('Vous avez bien modifié le poste '. $poste->label .'.', 'success');

        return redirect()->route('entreprise-index');
    }

    public function allReattribute(Request $request)
    {
        // Get the entreprise and player from request
        $entreprise = \Auth::user()->players->getJob();

        // Get all vehicules
        $vehicules = $entreprise->vehicules();

        $members = $entreprise->members;

        foreach ($members as $member) {
            $vehicules = $vehicules->where('owner', '!=', $member->identifier);
        }

        $vehicules->update([
            'owner' => \Auth::user()->players->identifier
        ]);
        Alert::toast('Vous avez bien ré-attributé tous les véhicules des personnes non employés.', 'success');

        return redirect()->route('entreprise-index');
    }

    public function vehicle(Request $request)
    {
        // Get the entreprise and player from request
        $entreprise = \Auth::user()->players->getJob();

        $request->validate([
            'vehicle' => 'required|in:'.$entreprise->validationStringVehicles(),
            'player' => 'required|in:'.$entreprise->validationStringMembers().',null',
        ]);

        // Get vehicle from request
        $vehicle = VehiculePossessed::findOrFail($request->vehicle);

        // If vehicle owner is online
        if ($vehicleOwner = $vehicle->player) {
            if ($vehicleOwner->isPlayerOnline()) {
        Alert::toast('Vous ne pouvez pas retirer le véhicule d\'une personne en ville.', 'error');

                return redirect()->back();
            }
        }

        if ($request->player != 'null') {
            $player = Player::findOrFail($request->player);

            if ($player->isPlayerOnline()) {
        Alert::toast('Vous ne pouvez pas attribué un véhicule à une personne en ville.', 'error');

                return redirect()->back();
            }
        }

        $vehicle->owner = ($request->player == "null" ? 1 : $request->player);
        $vehicle->save();
        Alert::toast('Vous avez bien ré-attributé le véhicule.', 'success');

        return redirect()->route('entreprise-index');
    }

}
