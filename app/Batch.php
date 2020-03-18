<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'batch_name','product_name','gender','total_product_number','male_product_number','female_product_number'
    ];
}
