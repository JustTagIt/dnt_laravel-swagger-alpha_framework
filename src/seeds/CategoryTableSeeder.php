<?php

namespace DomAndTom\LaravelSwagger;

use Illuminate\Database\Seeder;
use Eloquent;
use Page;
use DB;

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('laravel_swagger_categories')->delete();

        Category::create(array(
            'id' => 1,
            'name' => 'Dogs'
        ));

        Category::create(array(
            'id' => 2,
            'name' => 'Cats'
        ));

        Category::create(array(
            'id' => 4,
            'name' => 'Lions'
        ));
    }

}