<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorProductSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('vendor_product_sale'))
        {
            Schema::create('vendor_product_sale', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('vendor_product_id')->unsigned();
                $table->integer('vendor_id')->unsigned();
                $table->string('quantity');
                $table->string('mrp_price');
                $table->string('offer_price');
                $table->string('availability');
                $table->string('min_order');
                $table->string('max_order');
                $table->tinyInteger('status')->default(1);
                $table->string('created_by', 255);
                $table->string('updated_by', 255);
                $table->timestamps();
            });

            Schema::table('vendor_product_sale', function(Blueprint $table)
            {
                $table->foreign('vendor_product_id')->references('id')->on('vendor_product_master')->onDelete('cascade');
                $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('vendor_product_sale');
    }
}
