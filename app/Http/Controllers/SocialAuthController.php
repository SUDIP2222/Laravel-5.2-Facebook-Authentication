<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Routing\Controller;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
        //return $user->name;
        $avatar=$user->avatar;
        $user=$user->name;

        return view('welcome',compact('avatar','user'));
    }
}