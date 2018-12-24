<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNaghisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naghis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('aaa', ["1212","sdsds","cs1"]);
            $table->integer('dddd');
            $table->string('eeee');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('naghis');
    }
}
