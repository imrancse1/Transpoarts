<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripCashReceive extends Model
{
    protected $fillable = [
        'trip_info_id', 'amount'
    ];
}
