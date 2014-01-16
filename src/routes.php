<?php

$routingPrefix = array(
    'prefix' => Config::get('laravel-swagger::prefix')
);

Route::group($routingPrefix, function()
{
    // Swagger UI index
    Route::get('/', array('as' => 'swagger-index', 'uses' => 'DomAndTom\LaravelSwagger\BaseController@index'));

    // Show available Resources
    Route::get('resources', array('as' => 'swagger-resources', 'uses' => 'DomAndTom\LaravelSwagger\BaseController@resources'));

    // Show Resource
    Route::get('resources/{name}', 'DomAndTom\LaravelSwagger\BaseController@showResource');

    // Demo PetController Routes
    if (Config::get('laravel-swagger::showDemo') ) {
        Route::get('/pet/{petId}', 'DomAndTom\LaravelSwagger\PetController@getPetById');
        Route::get('/pet/findByStatus', 'DomAndTom\LaravelSwagger\PetController@findByStatus');
        Route::get('/pet/findByTags', 'DomAndTom\LaravelSwagger\PetController@findPetsByTags');
    }
});