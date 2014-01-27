<?php

namespace DomAndTom\LaravelSwagger;

use Illuminate\Database\Seeder;
use Eloquent;
use Page;
use DB;

class PetTableSeeder extends Seeder {

    public function run()
    {
        Pet::create(array(
            'id' => 3,
            'name' => 'Cat 3',
            'status' => 'pending',
            'category_id' => 2
        ));

        $pet = Pet::find(3);
        $pet->tags()->attach(1);
        $pet->tags()->attach(4);

        Pet::create(array(
            'id' => 4,
            'name' => 'Dog 1',
            'status' => 'available',
            'category_id' => 1
        ));

        $pet = Pet::find(4);
        $pet->tags()->attach(2);
        $pet->tags()->attach(3);

        Pet::create(array(
            'id' => 5,
            'name' => 'Dog 2',
            'status' => 'sold',
            'category_id' => 1
        ));

        $pet = Pet::find(5);
        $pet->tags()->attach(1);
        $pet->tags()->attach(2);
        $pet->tags()->attach(3);
        $pet->tags()->attach(4);

        Pet::create(array(
            'id' => 6,
            'name' => 'Dog 3',
            'status' => 'pending',
            'category_id' => 1
        ));

        $pet = Pet::find(6);
        $pet->tags()->attach(3);
        $pet->tags()->attach(4);

        Pet::create(array(
            'id' => 7,
            'name' => 'Lion 1',
            'status' => 'available',
            'category_id' => 4
        ));
        $pet = Pet::find(7);
        $pet->tags()->attach(1);

        Pet::create(array(
            'id' => 8,
            'name' => 'Lion 2',
            'status' => 'available',
            'category_id' => 4
        ));

        Pet::create(array(
            'id' => 3111,
            'name' => 'Cat 4',
            'status' => 'pending',
            'category_id' => 2
        ));
    }

}