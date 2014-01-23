<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laravel_swagger_pets', function(Blueprint $table)
		{
            $table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name');
            $table->integer('category_id')->unsigned();
			$table->enum('status', array('available', 'pending', 'sold'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('laravel_swagger_pets');
	}

}
