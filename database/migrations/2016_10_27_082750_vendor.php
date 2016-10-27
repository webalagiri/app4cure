<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('vendor'))
        {
            Schema::create('vendor', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('vendor_id')->unsigned();
                $table->string('vendor_name');
                $table->string('vendor_details');
                $table->text('address');
                $table->integer('area')->unsigned();
                $table->integer('city')->unsigned();
                $table->integer('state')->unsigned();
                $table->integer('country')->unsigned();
                $table->string('pincode', 10);
                $table->string('telephone', 255);
                $table->string('email', 255);
                $table->string('vendor_logo')->nullable();
                $table->string('vendor_photo')->nullable();
                $table->string('vendor_contact_name');
                $table->string('vendor_contact_mobile', 255);
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('vendor', function(Blueprint $table)
            {
                $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('vendor');
    }
}
