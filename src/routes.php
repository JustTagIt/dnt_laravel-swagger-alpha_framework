<?php

Route::get('/api/docs', 'DomAndTom\LaravelSwagger\BaseController@index');

Route::get('/api', 'DomAndTom\LaravelSwagger\BaseController@resources');

Route::get('/api/resources/{service}.json', 'DomAndTom\LaravelSwagger\BaseController@showResource');