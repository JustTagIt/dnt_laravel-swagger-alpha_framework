<?php

namespace DomAndTom\LaravelSwagger;

use Eloquent;

/**
 * @SWG\Model(id="Pet",required="id, name")
 *
 * @SWG\Property(name="id",type="integer",format="int64",description="Unique identifier for the Pet",minimum="0.0",maximum="100.0")
 * @SWG\Property(name="name",type="string",description="Friendly name of the pet")
 * @SWG\Property(name="category",type="Category",description="Category the pet is in")
 * @SWG\Property(name="tags",type="array",@SWG\Items("Tag"),description="Tags assigned to this pet")
 * @SWG\Property(name="status",type="string",description="pet status in the store",enum="['available','pending','sold']")
 */
class Pet extends Eloquent
{    
    protected $table = 'laravel_swagger_pets';
    public $timestamps = false;
    protected $hidden = array('category_id');

    public function category()
    {
        return $this->belongsTo('DomAndTom\LaravelSwagger\Category');
    }

    public static function getPets() 
    {
        $pets = '[
          {
            "id": 3,
            "category": {
              "id": 2,
              "name": "Cats"
            },
            "name": "Cat 3",
            "tags": [
              {
                "id": 1,
                "name": "tag3"
              },
              {
                "id": 2,
                "name": "tag4"
              }
            ],
            "status": "pending"
          },
          {
            "id": 4,
            "category": {
              "id": 1,
              "name": "Dogs"
            },
            "name": "Dog 1",
            "tags": [
              {
                "id": 1,
                "name": "tag1"
              },
              {
                "id": 2,
                "name": "tag2"
              }
            ],
            "status": "available"
          },
          {
            "id": 5,
            "category": {
              "id": 1,
              "name": "Dogs"
            },
            "name": "Dog 2",
            "tags": [
              {
                "id": 1,
                "name": "tag2"
              },
              {
                "id": 2,
                "name": "tag3"
              }
            ],
            "status": "sold"
          },
          {
            "id": 6,
            "category": {
              "id": 1,
              "name": "Dogs"
            },
            "name": "Dog 3",
            "tags": [
              {
                "id": 1,
                "name": "tag3"
              },
              {
                "id": 2,
                "name": "tag4"
              }
            ],
            "status": "pending"
          },
          {
            "id": 7,
            "category": {
              "id": 4,
              "name": "Lions"
            },
            "name": "Lion 1",
            "tags": [
              {
                "id": 1,
                "name": "tag1"
              },
              {
                "id": 2,
                "name": "tag2"
              }
            ],
            "status": "available"
          },
          {
            "id": 8,
            "category": {
              "id": 4,
              "name": "Lions"
            },
            "name": "Lion 2",
            "tags": [
              {
                "id": 1,
                "name": "tag2"
              },
              {
                "id": 2,
                "name": "tag3"
              }
            ],
            "status": "available"
          },
          {
            "id": 3111,
            "category": {
              "id": 2,
              "name": "Cats"
            },
            "name": "Cat 3",
            "tags": [
              {
                "id": 1,
                "name": "tag3"
              },
              {
                "id": 2,
                "name": "tag4"
              }
            ],
            "status": "pending"
          }
        ]';

        return $pets;
    }

}

