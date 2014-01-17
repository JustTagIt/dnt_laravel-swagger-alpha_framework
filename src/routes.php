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
        Route::get('/petdemo/findByStatus', 'DomAndTom\LaravelSwagger\PetController@findByStatus');
        Route::get('/petdemo/findByTags', 'DomAndTom\LaravelSwagger\PetController@findPetsByTags');
        Route::get('/petdemo/{petId}', 'DomAndTom\LaravelSwagger\PetController@getPetById');
    }
});