<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    protected $fillable = [
        'input_vehicle_id','driver_name'
    ];
}
