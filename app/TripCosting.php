<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripCosting extends Model
{
    protected $fillable = [
        'drives_expence','assistive_salary','others_expence'
    ];
}
