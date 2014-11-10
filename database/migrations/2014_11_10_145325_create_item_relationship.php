<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemRelationship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('item_relationship', function(Blueprint $table)
        {
            $table->integer('item_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
        });

       /* Schema::table('item_relationship', function($table)
        {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('item_id')->references('id')->on('items');
        });
       */
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('item_relationship');
	}

}
