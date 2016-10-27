<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Doctor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('doctor'))
        {
            Schema::create('doctor', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('doctor_id')->unsigned();
                $table->integer('doctor_specialty_id')->unsigned();
                $table->string('doctor_name');
                $table->string('doctor_details');
                $table->string('doctor_qualification');
                $table->string('doctor_experience');
                $table->text('address');
                $table->integer('area')->unsigned();
                $table->integer('city')->unsigned();
                $table->integer('state')->unsigned();
                $table->integer('country')->unsigned();
                $table->string('pincode', 10);
                $table->string('telephone', 255);
                $table->string('email', 255);
                $table->string('hospital_logo')->nullable();
                $table->string('doctor_photo')->nullable();
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('doctor', function(Blueprint $table)
            {
                $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('doctor_specialty_id')->references('id')->on('doctor_specialty')->onDelete('cascade');
                $table->foreign('area')->references('id')->on('areas')->onDelete('cascade');
                $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
                $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
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
        Schema::drop('doctor');
    }
}
