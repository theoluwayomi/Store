<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;
use Log;

class Wallet extends Model
{
	protected $fillable = [
        'accountnumber', 'bankname', 'banknumber',
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function balance() {
        return $this->balance;
    }

    public function can_transfer($value) {
        return $value >= 100;
    }

    public function isSufficient($value) {
        return $this->balance() >= $value;
    }

    public function withdraw($amount) {
        return $amount <= $this->balance;
    }

    public function debit($value) {
        $this->balance -= $value;
    }

    public function credit($value) {
        $this->balance += $value;
    }
 }
