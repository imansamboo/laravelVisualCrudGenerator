<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMersadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mersads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('family');
            $table->enum('age', ["mersad1","shahab2"]);
            $table->string('group');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mersads');
    }
}
