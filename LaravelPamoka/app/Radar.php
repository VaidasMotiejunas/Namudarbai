<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Driver;
use App\User;

class Radar extends Model
{
    use SoftDeletes;

    protected $table = 'radars';

    protected $fillable = ['date', 'number', 'distance', 'time', 'deleted_at', 'user_id', 'user_id_upd'];

    protected $foreignKey = 'driverId';

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'driverId');
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
