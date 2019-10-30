<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requester_name');
            $table->string('requester_contactno');
            $table->string('activity_name');
            $table->mediumText('activity_purpose');
            $table->mediumText('activity_category');
            $table->string('request_status')->default('pending');
            $table->string('request_remarks');
            $table->string('services_requested');
            $table->date('date_from');
            $table->date('date_to');
            $table->time('time_from');
            $table->time('time_to');
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
        Schema::dropIfExists('activity_requests');
    }
}
