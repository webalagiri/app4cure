<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hospital extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('hospital'))
        {
            Schema::create('hospital', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('hospital_id')->unsigned();
                $table->integer('hospital_type_id')->unsigned();
                $table->string('hospital_name');
                $table->string('hospital_details');
                $table->text('address');
                $table->integer('area')->unsigned();
                $table->integer('city')->unsigned();
                $table->integer('state')->unsigned();
                $table->integer('country')->unsigned();
                $table->string('pincode', 10);
                $table->string('telephone', 255);
                $table->string('email', 255);
                $table->string('hospital_logo')->nullable();
                $table->string('hospital_photo')->nullable();
                $table->string('hospital_contact_name');
                $table->string('hospital_contact_mobile', 255);
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('hospital', function(Blueprint $table)
            {
                $table->foreign('hospital_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('hospital_type_id')->references('id')->on('hospital_type')->onDelete('cascade');
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
        Schema::drop('hospital');
    }
}
