<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripInfo extends Model
{
     protected $fillable = [
        'input_vehicle_id','number_of_trip','up_trip','down_trip'
    ];
}
