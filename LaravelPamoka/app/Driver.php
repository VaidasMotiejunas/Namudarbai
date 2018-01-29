<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Radar;
use App\User;

class Driver extends Model
{
    use SoftDeletes;

    protected $table = 'drivers';

    protected $fillable = ['name', 'city', 'deleted_at', 'user_id', 'user_id_upd'];

    protected $primaryKey = 'driverId';

    public function radars()
    {
        return $this->hasMany(Radar::class, 'driver_id', 'driverId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function userWhoUpdated()
    {
        return $this->belongsTo(User::class, 'user_id_upd', 'id');
    }

}
