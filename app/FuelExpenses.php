<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelExpenses extends Model
{
     protected $fillable = [
        'oil_expenses','mobil_expenses','others_expenses'
    ];
}
