<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsAndRelations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laravel_swagger_tags', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name');
		});

		Schema::create('laravel_swagger_pets_tags', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->integer('pet_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->foreign('pet_id')->references('id')->on('laravel_swagger_pets');
			$table->foreign('tag_id')->references('id')->on('laravel_swagger_tags');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('laravel_swagger_pets_tags');
		Schema::drop('laravel_swagger_tags');
	}

}