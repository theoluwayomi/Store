<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Transfer extends Model
{
	protected $guarded = [];

    public function sender()
    {
        return $this->belongsTo('App\User', 'sender');
    }

    public function recipient()
    {
        return $this->belongsTo('App\User', 'recipient');
    }

    public function is_mine() {
        return $this->sender == Auth::id();
    }
}
