<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_destinations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('route_id')->index();
            $table->integer('item');
            $table->integer('airport_id');
            $table->double('price');
            $table->integer('airplane_id');
            $table->integer('airline_id');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_destinations');
    }
}
