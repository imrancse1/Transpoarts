<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'raw_supplier_id','product_id','wirehouse_id','transport_id','date','order_amount','deduction_amount','actual_quantity','bill_quantity','purchase_rate','total_payable_amount'
    ];
}
