<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Laboratory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('laboratory'))
        {
            Schema::create('laboratory', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('laboratory_id')->unsigned();
                $table->integer('laboratory_type_id')->unsigned();
                $table->string('laboratory_name');
                $table->string('laboratory_details');
                $table->text('address');
                $table->integer('area')->unsigned();
                $table->integer('city')->unsigned();
                $table->integer('state')->unsigned();
                $table->integer('country')->unsigned();
                $table->string('pincode', 10);
                $table->string('telephone', 255);
                $table->string('email', 255);
                $table->string('laboratory_logo')->nullable();
                $table->string('laboratory_photo')->nullable();
                $table->string('laboratory_contact_name');
                $table->string('laboratory_contact_mobile', 255);
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('laboratory', function(Blueprint $table)
            {
                $table->foreign('laboratory_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('laboratory_type_id')->references('id')->on('laboratory_type')->onDelete('cascade');
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
        Schema::drop('laboratory');
    }
}
