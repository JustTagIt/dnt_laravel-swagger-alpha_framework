<?php

namespace DomAndTom\LaravelSwagger;

use Eloquent;

class Tag extends Eloquent
{    
    protected $table = 'laravel_swagger_tags';
    public $timestamps = false;
    protected $hidden = array('pivot');
}