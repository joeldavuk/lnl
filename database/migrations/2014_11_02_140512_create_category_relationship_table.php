<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryRelationshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_relationship', function(Blueprint $table)
		{
            $table->integer('base_category_id')->unsigned();
            $table->text('type_of');
            $table->integer('category_id')->unsigned();
            $table->timestamps();
		});

        Schema::table('category_relationship', function($table)
        {
            $table->foreign('base_category_id')->references('id')->on('categories');
            $table->foreign('category_id')->references('id')->on('categories');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_relationship');
	}

}
