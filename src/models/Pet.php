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

}

