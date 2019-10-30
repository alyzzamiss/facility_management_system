<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle_name');
            $table->string('vehicle_plateno');
            $table->integer('vehicle_capacity');
            $table->string('vehicle_driver');
            $table->string('vehicle_status')->default('good condition');
            $table->string('vehicle_remarks');
            $table->boolean('is_exclusive')->default('false');
            $table->boolean('is_deleted')->default('false');
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
        Schema::dropIfExists('vehicles');
    }
}
