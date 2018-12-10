<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMigrationFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('migration_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('crud_id')->unsigned();
            $table->enum('type', ["integer","string","enum"]);
            $table->string('options')->nullable();
            $table->boolean('nullable');
            $table->foreign('crud_id')->references('id')->on('cruds');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('migration_fields');
    }
}
