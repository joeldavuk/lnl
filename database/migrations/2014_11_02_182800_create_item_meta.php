<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMeta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_meta', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->char('meta_key',255);
            $table->longText('meta_value');
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
		Schema::drop('item_meta');
	}

}
