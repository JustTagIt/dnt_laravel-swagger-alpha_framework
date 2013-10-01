<?php

namespace Domandtom\LaravelSwagger;

use App;
use Config;
use Illuminate\Routing\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Swagger\Swagger;

class BaseController extends Controller
{
    public function index()
    {
        return View::make('laravel-swagger::index', array(
            'resourceUrl' => Config::get('laravel-swagger::resourceUrl')
        ));
    }

    public function resources()
    {
        $path = Config::get('laravel-swagger::discoverPath');
        $swagger = Swagger::discover($path);
        $resourceList = $swagger->getResourceList(true);

        return $resourceList;
    }

    public function showResource($service)
    {
        $path = Config::get('laravel-swagger::discoverPath');
        $swagger = Swagger::discover($path);

        $resourceName = "/" . str_replace("-", "/", $service);
        if (!in_array($resourceName, $swagger->getResourceNames())) {
            App::abort(404, 'Service not found');
        }

        $resource = $swagger->getResource($resourceName, Config::get('laravel-swagger::prettyPrint'));

        return $resource;
    }
}