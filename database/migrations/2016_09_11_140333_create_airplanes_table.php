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
     * @todo review schema
     * @return void
     */
    public function up()
    {
        Schema::create('airplanes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('model')->nullable();
            $table->integer('price')->nullable();
            $table->integer('capacity')->nullable();
            $table->string('size_class')->nullable();
            $table->string('fuel')->nullable();
            $table->string('cargo_load')->nullable();
            $table->string('range')->nullable();
            $table->string('cruise_speed')->nullable();
            $table->string('engine')->nullable();
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
