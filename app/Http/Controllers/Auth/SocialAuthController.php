<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Auth;
use Socialite;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/home');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = \App\User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return \App\User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'onboard_step' => 0
        ]);
    }
    
}
