<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAirplanesTable
 */
class CreateAirplanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplanes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('model');
            $table->integer('price');
            $table->integer('capacity');
            $table->string('size_class');
            $table->string('fuel');
            $table->string('cargo_load');
            $table->string('range');
            $table->string('cruise_speed');
            $table->string('engine');
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
        Schema::dropIfExists('airplanes');
    }
}
