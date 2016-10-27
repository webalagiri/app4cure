<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorProductMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('vendor_product_master'))
        {
            Schema::create('vendor_product_master', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('code');
                $table->integer('brand_id')->unsigned();
                $table->tinyInteger('status')->default(1);
                $table->string('created_by', 255)->default('Admin');
                $table->string('updated_by', 255)->default('Admin');
                $table->timestamps();
            });

            Schema::table('vendor_product_master', function(Blueprint $table)
            {
                $table->foreign('brand_id')->references('id')->on('vendor_product_brand')->onDelete('cascade');
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
        Schema::drop('vendor_product_master');
    }
}
