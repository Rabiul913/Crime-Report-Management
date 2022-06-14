<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('co_title');
            $table->string('co_against_name');
            $table->integer('district_id');
            $table->integer('police_station_id');
            $table->longText('co_against_address');
            $table->integer('co_type_id');
            $table->longText('co_detail');
            $table->dateTime('co_date');
            $table->string('file');
            $table->string('status');
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
        Schema::dropIfExists('complaints');
    }
}
