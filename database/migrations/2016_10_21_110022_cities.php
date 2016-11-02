<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city_name', 255);
            $table->integer('state')->unsigned();
            $table->integer('country')->unsigned();
            $table->tinyInteger('city_status');
            $table->string('created_by',255)->default('adm');
            $table->string('modified_by',255)->default('adm');
            $table->timestamps();
        });

        Schema::table('cities', function(Blueprint $table){
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cities');
    }
}
