<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{
    use EntrustUserTrait; 

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isExpert()
    {
        return $this->hasRole('expert');
    }

    public function isActiveExpert()
    {
        return $this->expert->is_active;
    }

    public function isPendingExpert()
    {
        return $this->expert->status == 'pending';
    }

    public function isDeclinedExpert()
    {
         return $this->expert->status == 'declined';
    }

    public function isApprovedExpert()
    {
         return $this->expert->status == 'approved';
    }

    //relationships
    public function expert()
    {
        return $this->hasOne('App\Expert');
    }
}
