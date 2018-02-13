<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Auth;
use Socialite;
use Mail;
use App\Mail\NewRegistration;
use App\Mail\AdminNewUser;
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
        return redirect('/dashboard');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = \App\User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }

        if(env('APP_VERSION') == 'production') {

            $data = [
                'name'     => $user->name,
                'email'    => $user->email,
                'password' => $provider
            ];

            Mail::to($data['email'])->send(new NewRegistration($data));
            Mail::to(env('ADMIN_EMAIL'))->send(new AdminNewUser($data));
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
