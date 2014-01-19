<?php

namespace DomAndTom\LaravelSwagger;

use App;
use Config;
use URL;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Swagger\Swagger;

class BaseController extends Controller
{
    /**
     * Swagger UI 
     */
    public function index()
    {
        return View::make('laravel-swagger::index', array(
            'swaggerIndex' => route('swagger-resources')
        ));
    }

    /**
     * Show all available Resources
     */
    public function resources()
    {
        $paths = Config::get('laravel-swagger::paths');

        if (Config::get('laravel-swagger::showDemo') ) {
            $paths[] = __DIR__.'/demo';
        }
        
        $excludedPath = Config::get('laravel-swagger::excludePath');
        $options = Config::get('laravel-swagger::getResourceListOptions');

        $swagger = new Swagger($paths, $excludedPath);

        $resourceList = $swagger->getResourceList($options);

        return $resourceList;
    }

    /** 
     * Show an specific Resource
     */
    public function showResource($name)
    {
        $paths = Config::get('laravel-swagger::paths');

        if (Config::get('laravel-swagger::showDemo') ) {
            $paths[] = __DIR__.'/demo';
        }

        $excludedPath = Config::get('laravel-swagger::excludePath');
        $options = Config::get('laravel-swagger::getResourceOptions');

        $swagger = new Swagger($paths, $excludedPath);

        $resourceName = "/" . str_replace("-", "/", $name);
        if (!in_array($resourceName, $swagger->getResourceNames())) {
            App::abort(404, 'Resource not found');
        }

        // Pet demo uses the main laravel-swagger route.
        if ($resourceName == '/petdemo') {
            $options['defaultBasePath'] = route('swagger-index');
        }

        $resource = $swagger->getResource($resourceName, $options);

        return $resource;
    }
}