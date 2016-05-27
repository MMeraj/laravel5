<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePicnic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picnics', function(Blueprint $table)
{
    $table->increments('id');

    $table->string('name');
    $table->integer('taste_level'); // how tasty is this picnic?

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('picnics', function (Blueprint $table) {
            //
        });
    }
}
