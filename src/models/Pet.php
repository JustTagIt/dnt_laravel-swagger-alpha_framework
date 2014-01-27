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

    public function tags()
    {
        return $this->belongsToMany('DomAndTom\LaravelSwagger\Tag', 'laravel_swagger_pets_tags');
    }
}

