<?php

namespace DomAndTom\LaravelSwagger;

use App;
use Config;
use URL;
use Illuminate\Routing\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Swagger\Swagger;

class BaseController extends Controller
{
    /**
     * Show Swagger UI 
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
        $path = Config::get('laravel-swagger::discoverPath');
        $swagger = new Swagger($path);
        $resourceList = $swagger->getResourceList();

        return $resourceList;
    }

    /** 
     * Show an specific Resource
     */
    public function showResource($name)
    {
        $path = Config::get('laravel-swagger::discoverPath');
        $swagger = new Swagger($path);

        $resourceName = "/" . str_replace("-", "/", $name);
        if (!in_array($resourceName, $swagger->getResourceNames())) {
            App::abort(404, 'Service not found');
        }

        $resource = $swagger->getResource($resourceName);

        return $resource;
    }
}