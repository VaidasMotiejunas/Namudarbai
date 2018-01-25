<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Radar;

class Driver extends Model
{
    use SoftDeletes;

    protected $table = 'drivers';

    protected $fillable = ['name', 'city', 'deleted_at'];

    protected $primaryKey = 'driverId';

    public function radars()
    {
        return $this->hasMany(Radar::class, 'driver_id', 'driverId');
    }

}
