<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_bills', function (Blueprint $table) {
            $table->increments('supplierBill_id');
            $table->date('date');
            $table->integer('raw_supplier_id');
            $table->string('payment_mode');
            $table->integer('bank_id')->nullable();
            $table->string('account_name')->nullable();
            $table->integer('account_number')->nullable();
            $table->integer('pay_amount');
            $table->string('description_note')->nullable();
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
        Schema::dropIfExists('supplier_bills');
    }
}
