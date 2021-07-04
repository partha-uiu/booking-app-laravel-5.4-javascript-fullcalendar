<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token',];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function communityCenter()
    {
        return $this->belongsTo('App\CommunityCenter');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
