<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PharmacyMedicine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pharmacy_medicine'))
        {
            Schema::create('pharmacy_medicine', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code');
                $table->string('name');
                $table->integer('pharmacy_medicine_type_id')->unsigned();
                $table->tinyInteger('status')->default(1);
                $table->string('created_by', 255)->default('Admin');
                $table->string('updated_by', 255)->default('Admin');
                $table->timestamps();
            });

            Schema::table('pharmacy_medicine', function(Blueprint $table)
            {
                $table->foreign('pharmacy_medicine_type_id')->references('id')->on('pharmacy_medicine_type')->onDelete('cascade');
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
        Schema::drop('pharmacy_medicine');
    }
}
