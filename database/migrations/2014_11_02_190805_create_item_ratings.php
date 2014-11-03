<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemRatings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_ratings', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->char('rating_value',255);
            $table->longText('rating_description');
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
		Schema::drop('item_ratings');
	}

}
