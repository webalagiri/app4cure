<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pharmacy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pharmacy'))
        {
            Schema::create('pharmacy', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('pharmacy_id')->unsigned();
                $table->integer('pharmacy_type_id')->unsigned();
                $table->string('pharmacy_name');
                $table->string('pharmacy_details');
                $table->text('address');
                $table->integer('area')->unsigned();
                $table->integer('city')->unsigned();
                $table->integer('state')->unsigned();
                $table->integer('country')->unsigned();
                $table->string('pincode', 10);
                $table->string('telephone', 255);
                $table->string('email', 255);
                $table->string('pharmacy_logo')->nullable();
                $table->string('pharmacy_photo')->nullable();
                $table->string('pharmacy_contact_name');
                $table->string('pharmacy_contact_mobile', 255);
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('pharmacy', function(Blueprint $table)
            {
                $table->foreign('pharmacy_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('pharmacy_type_id')->references('id')->on('pharmacy_type')->onDelete('cascade');
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
        Schema::drop('pharmacy');
    }
}
