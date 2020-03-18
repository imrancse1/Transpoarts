<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('purchase_id');
            $table->integer('raw_supplier_id');
            $table->integer('product_id');
            $table->integer('wirehouse_id');
            $table->date('date');
            $table->string('order_quantity');
            $table->string('supplier_chalan_qty');
            $table->string('receive_quantity');            
            $table->string('remain_quantity');            
            $table->string('deduction_quantity');            
            $table->string('actual_quantity');            
            $table->string('bill_quantity');            
            $table->string('purchase_rate');            
            $table->string('transport_vehicle');            
            $table->string('transport_fare');            
            $table->string('total_payable_amount');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
