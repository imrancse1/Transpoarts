<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceTrip extends Model
{
    protected $fillable = [
        'trip_info_id','amount'
    ];
}
