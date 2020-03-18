<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawSupplier extends Model
{
    protected $fillable = [
        'supplier_name','supplier_phone','supplier_address','supplier_company'
    ];
}
