<?php

namespace DomAndTom\LaravelSwagger;

use Illuminate\Database\Seeder;
use Eloquent;
use Page;
use DB;

class TagTableSeeder extends Seeder {

    public function run()
    {
        Tag::create(array(
            'id' => 1,
            'name' => 'Tag1'
        ));

        Tag::create(array(
            'id' => 2,
            'name' => 'Tag2'
        ));

        Tag::create(array(
            'id' => 3,
            'name' => 'Tag3'
        ));

        Tag::create(array(
            'id' => 4,
            'name' => 'Tag4'
        ));
    }

}