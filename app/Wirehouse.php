<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wirehouse extends Model
{
     protected $fillable = [
        'wirehouse_name','wirehouse_address'
    ];
}
