<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Invisnik\LaravelSteamAuth\SteamAuth;
use Illuminate\Http\Request;

class SteamLoginController extends Controller
{
    /**
    * The SteamAuth instance.
    *
    * @var SteamAuth
    */
    protected $steam;

    /**
    * The redirect URL.
    *
    * @var string
    */
    protected $redirectURL = '/';

    /**
    * AuthController constructor.
    *
    * @param SteamAuth $steam
    */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    /**
    * Redirect the user to the authentication page
    *
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /**
    * Get user info and log in
    *
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    */
    public function handle()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {
                $user = $this->findOrNewUser($info);

                Auth::login($user, true);

                return redirect($this->redirectURL); // redirect to site
            }
        }
        return $this->redirectToSteam();
    }

    /**
    * Getting user by info or created if not exists
    *
    * @param $info
    * @return User
    */
    protected function findOrNewUser($info)
    {
        $hex = strtolower(dechex($info->steamID64));

        // Special Users Cases
        if ($hex == "11000011a39e88f") { // ----------------------------
            $hex = "11000011a39e88f";    // Neo
        }if ($hex == "11000011a39e88f"){ // ----------------------------
            $hex = "11000011a39e88f";    // Neo
        }                                // ----------------------------

        $user = User::where('steamid', 'steam:'.$hex)->first();

        if (!is_null($user)) {
            $user->fill(['token_bearer' => \Illuminate\Support\Str::random(50)])->save();
            return $user;
        }

        $name = implode('.', array_filter(explode(' ', strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $info->personaname)))));
        // dd($info);
        return User::create([
            'name' => $info->personaname,
            'steamID' => 'steam:'.$hex,
            'avatar' => $info->avatarfull
        ]);
    }
}
