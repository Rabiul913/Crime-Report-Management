<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('complaint_id');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->longText('present_address');
            $table->longText('permenent_address');
            $table->string('mobile');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('image');
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
        Schema::dropIfExists('criminals');
    }
}
