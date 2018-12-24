<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientdfdsvdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientdfdsvds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('aaa');
            $table->enum('bbb', ["e","sfsdf","ss"]);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientdfdsvds');
    }
}
