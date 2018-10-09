<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Spot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('image');
            $table->double('latitude');
            $table->double('longitude');
            $table->bigInteger('circuit_id')->unsigned();
            $table->foreign('circuit_id')->references('id')->on('circuits');
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
        Schema::dropIfExists('spots');

    }
}
