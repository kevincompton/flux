<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone', 'city', 'state', 'zip', 'plan', 'ssn', 'dob', 'provider', 'provider_id', 'flux_credit', 'onboard_step'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }

    public function budget()
    {
        return $this->hasOne('App\Budget');
    }

    public function application()
    {
        return $this->hasOne('App\Application');
    }

    public function referral()
    {
        return $this->hasOne('App\Referral');
    }

    public function creditors()
    {
        return $this->hasMany('App\Creditor');
    }

    public function cosigners()
    {
        return $this->hasMany('App\CoSigner');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

}
