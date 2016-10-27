<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class States extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('states'))
        {
            Schema::create('states', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('country')->unsigned();
                $table->tinyInteger('states_status')->default(1);
                $table->string('created_by', 255)->default('Admin');
                $table->string('updated_by', 255)->default('Admin');
                $table->timestamps();
            });

            Schema::table('states', function(Blueprint $table){
                $table->foreign('country')->references('id')->on('countries')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('states');
    }
}
