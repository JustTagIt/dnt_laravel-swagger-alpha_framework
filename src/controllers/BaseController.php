<?php

namespace DomAndTom\LaravelSwagger;

use App;
use Cache;
use Carbon\Carbon;
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
        $options = Config::get('laravel-swagger::getResourceListOptions');

        $excludedPath = Config::get('laravel-swagger::excludedPath');
        $swagger = new Swagger($this->getPaths(), $excludedPath);

        if (Config::get('laravel-swagger::cache')) {
            $resourceList = Cache::remember('resourceList', $this->getExpireAt(), function() use ($swagger, $options)
            {
                return $swagger->getResourceList($options);
            });
        } else {
            $resourceList = $swagger->getResourceList($options);
        }

        return $resourceList;
    }

    /** 
     * Show an specific Resource
     */
    public function showResource($name)
    {
        $options = Config::get('laravel-swagger::getResourceOptions');
        $resourceName = "/" . str_replace("-", "/", $name);

        $excludedPath = Config::get('laravel-swagger::excludedPath');
        $swagger = new Swagger($this->getPaths(), $excludedPath);

        if (Config::get('laravel-swagger::cache') && Cache::has('resource_'.$resourceName)) {
            $resource = Cache::get('resource_'.$resourceName);
        } else {
            if (!in_array($resourceName, $swagger->getResourceNames())) {
                App::abort(404, 'Resource not found');
            }

            // Pet demo uses the main laravel-swagger route.
            if ($resourceName == '/petdemo') {
                $options['defaultBasePath'] = route('swagger-index');
            }

            $resource = $swagger->getResource($resourceName, $options);
        }

        if (Config::get('laravel-swagger::cache') && !Cache::has('resource_'.$resourceName)) {
            Cache::put('resource_'.$resourceName, $resource, $this->getExpireAt());
        }

        return $resource;
    }

    /** 
     * Get Paths 
     */
    private function getPaths()
    {
        $paths = Config::get('laravel-swagger::paths');

        if (Config::get('laravel-swagger::showDemo') ) {
            $paths[] = __DIR__.'/demo';
            $paths[] = __DIR__.'/../models';
        }

        return $paths;
    }

    /** 
     * Get expiration time for cache
     */
    private function getExpireAt()
    {
        return Carbon::now()->addMinutes(Config::get('laravel-swagger::cacheExpireAt'));
    }
}