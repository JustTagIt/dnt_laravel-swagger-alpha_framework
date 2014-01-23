<?php

namespace DomAndTom\LaravelSwagger;

use Eloquent;

class Category extends Eloquent
{    
    protected $table = 'laravel_swagger_categories';
    public $timestamps = false;

    public function pets()
    {
        return $this->hasMany('DomAndTom\LaravelSwagger\Pet');
    }
}