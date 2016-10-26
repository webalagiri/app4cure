<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hotel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('hotel'))
        {
            Schema::create('hotel', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('hotel_id')->unsigned();
                $table->string('hotel_name');
                $table->text('address');
                $table->integer('city')->unsigned();
                $table->integer('country')->unsigned();
                $table->string('hid', 255);
                $table->string('pin', 10);
                $table->string('telephone', 255);
                $table->string('email', 255);
                $table->string('hotel_logo')->nullable();
                $table->string('hotel_photo')->nullable();
                $table->string('website', 2000)->nullable();
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('hotel', function(Blueprint $table)
            {
                $table->foreign('hotel_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
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
