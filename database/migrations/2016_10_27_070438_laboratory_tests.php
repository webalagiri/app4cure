<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaboratoryTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('laboratory_tests'))
        {
            Schema::create('laboratory_tests', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code');
                $table->string('name');
                $table->tinyInteger('status')->default(1);
                $table->string('created_by', 255)->default('Admin');
                $table->string('updated_by', 255)->default('Admin');
                $table->timestamps();
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
        Schema::drop('laboratory_tests');
    }
}
