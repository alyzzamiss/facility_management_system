<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitySchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('activity_request_id')->unsigned();
            $table->integer('facility_id')->unsigned();
            $table->string('schedule_status')->default('pending');
            $table->string('schedule_remarks');
            $table->timestamps();
        });
        
        Schema::table('facility_schedules', function($table) {
            $table->foreign('activity_request_id')->references('id')->on('activity_requests')->onDelete('cascade');
            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_schedules');
    }
}
