<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Mail;
use DB;
use App\Mail\NewRegistration;
use App\Mail\AdminNewUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $ref_id = 0;

        if(env('APP_VERSION') == 'production') {
            Mail::to($data['email'])->send(new NewRegistration($data));
            Mail::to(env('ADMIN_EMAIL'))->send(new AdminNewUser($data));
        }

        if($data['referral']) {
            $referrer = DB::table('referrals')->where('code', '=', $data['referral'])->first();
            if($referrer != null) {
                $ref_id = $referrer->user_id;
            }
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'onboard_step' => 0,
            'referral_id' => $ref_id
        ]);
    }
}
