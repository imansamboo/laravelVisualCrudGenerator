<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMojtabasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mojtabas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('aaa');
            $table->integer('bbb');
            $table->enum('ccc', ["cscs","sds","sff"]);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mojtabas');
    }
}
