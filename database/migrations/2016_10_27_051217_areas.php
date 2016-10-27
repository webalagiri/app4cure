<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Areas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area_name', 255);
            $table->string('area_pincode', 255);
            $table->integer('city')->unsigned();
            $table->integer('state')->unsigned();
            $table->integer('country')->unsigned();
            $table->tinyInteger('city_status');
            $table->string('created_by',255)->default('admin');
            $table->string('modified_by',255)->default('admin');
            $table->timestamps();
        });

        Schema::table('areas', function(Blueprint $table){
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('areas');
    }
}
