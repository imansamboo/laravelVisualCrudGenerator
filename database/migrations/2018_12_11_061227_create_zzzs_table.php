<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZzzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zzzs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('cscs');
            $table->enum('csc', ["cs","ffe","ddv"]);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zzzs');
    }
}
