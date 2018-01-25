<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Driver;

class Radar extends Model
{
    use SoftDeletes;

    protected $table = 'radars';

    protected $fillable = ['date', 'number', 'distance', 'time', 'deleted_at'];

    protected $foreignKey = 'driverId';

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'driverId');
    }
}
