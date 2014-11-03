<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned();
            $table->char('title', 250)->nullable();
            $table->char('slug', 250)->nullable();
            $table->integer('author')->unsigned();
            $table->longText('content')->nullable();
            $table->char('status', 250);
            $table->integer('menu_order')->unsigned();
            $table->char('item_type', 250);
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
		Schema::drop('items');
	}

}
