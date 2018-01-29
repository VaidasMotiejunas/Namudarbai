<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Radar;
use App\Driver;

class User extends Authenticatable
{
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

    public function radars()
    {
        return $this->hasMany(Radar::class, 'user_id', 'id');
    }

    public function radarsUpdated()
    {
        return $this->hasMany(Radar::class, 'user_id_upd', 'id');
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'user_id', 'id');
    }

    public function driversUpdated()
    {
        return $this->hasMany(Driver::class, 'user_id_upd', 'id');
    }
}
