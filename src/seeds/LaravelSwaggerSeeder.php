<?php

namespace DomAndTom\LaravelSwagger;

use Illuminate\Database\Seeder;
use Eloquent;
use Page;
use DB;

class LaravelSwaggerSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('DomAndTom\LaravelSwagger\CategoryTableSeeder');
		$this->call('DomAndTom\LaravelSwagger\PetTableSeeder');
	}

}