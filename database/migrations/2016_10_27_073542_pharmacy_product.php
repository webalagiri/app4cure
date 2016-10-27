<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PharmacyProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pharmacy_product'))
        {
            Schema::create('pharmacy_product', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('pharmacy_medicine_id')->unsigned();
                $table->integer('pharmacy_id')->unsigned();
                $table->string('quantity');
                $table->string('mrp_price');
                $table->string('offer_profile');
                $table->string('availability');
                $table->string('min_order');
                $table->string('max_order');
                $table->tinyInteger('status')->default(1);
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('pharmacy_product', function(Blueprint $table)
            {
                $table->foreign('pharmacy_medicine_id')->references('id')->on('pharmacy_medicine')->onDelete('cascade');
                $table->foreign('pharmacy_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('pharmacy_product');
    }
}
