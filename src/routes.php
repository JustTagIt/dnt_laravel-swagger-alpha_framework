<?php

Route::get('/api/docs', 'Domandtom\LaravelSwagger\BaseController@index');

Route::get('/api', 'Domandtom\LaravelSwagger\BaseController@resources');

Route::get('/api/resources/{service}.json', 'Domandtom\LaravelSwagger\BaseController@showResource');