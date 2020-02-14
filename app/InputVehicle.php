<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputVehicle extends Model
{
    protected $fillable = [
        'category_id','vehicle_name','vehicle_license_number'
    ];

    public function category(){
    	return $this->hasMany(Category::class);
    }

}
