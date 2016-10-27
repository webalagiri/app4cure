<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('customer'))
        {
            Schema::create('customer', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('customer_id')->unsigned();
                $table->string('customer_name');
                $table->text('address');
                $table->integer('area')->unsigned();
                $table->integer('city')->unsigned();
                $table->integer('state')->unsigned();
                $table->integer('country')->unsigned();
                $table->string('pincode', 10);
                $table->string('telephone', 255);
                $table->string('email', 255);
                $table->string('customer_photo')->nullable();
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('customer', function(Blueprint $table)
            {
                $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('hotel');
    }
}
