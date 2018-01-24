<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Driver extends Model
{
    use SoftDeletes;

    protected $table = 'drivers';

    protected $fillable = ['name', 'city', 'deleted_at'];

    protected $primaryKey = 'driverId';

}
