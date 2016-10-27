<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('vendor_product_category'))
        {
            Schema::create('vendor_product_category', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('parent_id')->unsigned();
                $table->tinyInteger('status')->default(1);
                $table->string('created_by', 255)->default('Admin');
                $table->string('updated_by', 255)->default('Admin');
                $table->timestamps();
            });

            Schema::table('vendor_product_category', function(Blueprint $table)
            {
                $table->foreign('parent_id')->references('id')->on('vendor_product_category')->onDelete('cascade');
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
        Schema::drop('vendor_product_category');
    }
}
