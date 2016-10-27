<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaboratoryTestsLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('laboratory_tests_link'))
        {
            Schema::create('laboratory_tests_link', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('laboratory_id')->unsigned();
                $table->integer('laboratory_tests_id')->unsigned();
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('laboratory_tests_link', function(Blueprint $table)
            {
                $table->foreign('laboratory_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('laboratory_tests_id')->references('id')->on('laboratory_tests')->onDelete('cascade');
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
        Schema::drop('laboratory_tests_link');
    }
}
