<?php

namespace DomAndTom\LaravelSwagger;

/**
 * @SWG\Model(id="Pet",required="id, name")
 */
class Pet
{
    /**
     * @SWG\Property(name="id",type="integer",format="int64",description="Unique identifier for the Pet",minimum="0.0",maximum="100.0")
     */
    public $id;

    /**
     * @SWG\Property(name="name",type="string",description="Friendly name of the pet")
     */
    public $name;

    /**
     * @SWG\Property(name="category",type="Category",description="Category the pet is in")
     */
    public $category;

    /**
     * @SWG\Property(name="photoUrls",type="array",@SWG\Items("string"),description="Image URLs")
     */
    public $photos;

    /**
     * @SWG\Property(name="tags",type="array",@SWG\Items("Tag"),description="Tags assigned to this pet")
     */
    public $tags;

    /**
     * @SWG\Property(name="status",type="string",description="pet status in the store",enum="['available','pending','sold']")
     */
    public $status;

    public static function getPet3() 
    {
        $pet3 = '[
          {
            "id": 3,
            "category": {
              "id": 2,
              "name": "Cats"
            },
            "name": "Cat 3",
            "photoUrls": [
              "url1",
              "url2"
            ],
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

        return $pet3;
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
            "photoUrls": [
              "url1",
              "url2"
            ],
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
            "photoUrls": [
              "url1",
              "url2"
            ],
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
            "photoUrls": [
              "url1",
              "url2"
            ],
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
            "photoUrls": [
              "url1",
              "url2"
            ],
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
            "photoUrls": [
              "url1",
              "url2"
            ],
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
            "photoUrls": [
              "url1",
              "url2"
            ],
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
            "photoUrls": [
              "url1",
              "url2"
            ],
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

