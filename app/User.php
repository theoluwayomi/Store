<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'username', 'mobilenumber', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function wallet()
    {
        return $this->hasOne('App\Wallet');
    }

    public function shippingaddress()
    {
        return $this->hasOne('App\Shipping');
    }

    public function credits()
    {
        return $this->hasMany('App\Transfer', 'recipient');
    }

    public function debits()
    {
        return $this->hasMany('App\Transfer', 'sender');
    }

    public function fullName() {
        return $this->firstname . " " . $this->lastname;
    }
}
