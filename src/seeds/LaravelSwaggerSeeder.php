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
		$this->command->info('Laravel Swagger Demo Categories seeded!');

		$this->call('DomAndTom\LaravelSwagger\TagTableSeeder');
		$this->command->info('Laravel Swagger Demo Tags seeded!');

		$this->call('DomAndTom\LaravelSwagger\PetTableSeeder');
		$this->command->info('Laravel Swagger Demo Pets seeded!');
	}

}