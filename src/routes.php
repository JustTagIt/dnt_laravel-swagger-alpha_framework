<?php

Route::group(Config::get('laravel-swagger::routing'), function()
{
    // Swagger UI index
    Route::get('/', array('as' => 'swagger-index', 'uses' => 'DomAndTom\LaravelSwagger\BaseController@index'));

    // Show available Resources
    Route::get('resources', array('as' => 'swagger-resources', 'uses' => 'DomAndTom\LaravelSwagger\BaseController@resources'));

    // Show Resource
    Route::get('resources/{name}', 'DomAndTom\LaravelSwagger\BaseController@showResource');
});