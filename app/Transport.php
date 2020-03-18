<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = [
        'vehicle_name','up_trip','down_trip'
    ];
}
