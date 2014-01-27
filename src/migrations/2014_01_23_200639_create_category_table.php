<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laravel_swagger_categories', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name');
		});

		Schema::table('laravel_swagger_pets', function($table)
		{
			$table->foreign('category_id')->references('id')->on('laravel_swagger_categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('laravel_swagger_pets', function($table)
		{
			$table->dropForeign('laravel_swagger_pets_category_id_foreign');
		});
		
		Schema::drop('laravel_swagger_categories');
	}

}