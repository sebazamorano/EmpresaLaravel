<?php

namespace Empresa\Http\Controllers\Auth;

use Empresa\Http\Controllers\Controller;
use Empresa\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $userAuth = User::where('email', $user->getEmail())->first();
        if (is_null($userAuth)) {
            $user = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt('secret'),
                'api_token' => str_random(60)
            ]);
            Auth::login($user);
        } else {
            Auth::login($userAuth);
        }

        return redirect()->to('documentos');
    }
}
