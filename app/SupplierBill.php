<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierBill extends Model
{
    protected $fillable = [
        'date','raw_supplier_id','payment_mode','pay_amount'
    ];
}
