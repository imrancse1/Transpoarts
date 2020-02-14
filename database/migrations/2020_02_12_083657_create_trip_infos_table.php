<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_infos', function (Blueprint $table) {
            $table->increments('trip_info_id');
            $table->integer('input_vehicle_id');
            $table->string('number_of_trip');
            $table->string('up_trip');
            $table->string('down_trip');
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
        Schema::dropIfExists('trip_infos');
    }
}
