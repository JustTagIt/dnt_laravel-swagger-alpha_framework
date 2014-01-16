<?php

namespace DomAndTom\LaravelSwagger;

use App;
use Config;
use URL;
use Illuminate\Routing\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Swagger\Swagger;

/**
 * @SWG\Resource(
 *   apiVersion="1.0.0",
 *   swaggerVersion="1.2",
 *   resourcePath="/pet",
 *   description="Operations about pets",
 *   produces="['application/json','application/xml','text/plain','text/html']"
 * )
 */
class PetController extends Controller
{
    /**
     * @SWG\Api(
     *   path="/pet/{petId}",
     *   @SWG\Operation(
     *     method="GET",
     *     summary="Find pet by ID",
     *     notes="Returns a pet based on ID",
     *     type="Pet",
     *     nickname="getPetById",
     *     @SWG\Parameter(
     *       name="petId",
     *       description="ID of pet that needs to be fetched",
     *       required=true,
     *       type="integer",
     *       format="int64",
     *       paramType="path",
     *       minimum="1.0",
     *       maximum="100000.0"
     *     ),
     *     @SWG\ResponseMessage(code=400, message="Invalid ID supplied"),
     *     @SWG\ResponseMessage(code=404, message="Pet not found")
     *   )
     * )
     */
    public function getPetById()
    {
        return "ok";
    }

    /**
     * @SWG\Api(
     *   path="/pet/findByStatus",
     *   @SWG\Operation(
     *     method="GET",
     *     summary="Finds Pets by status",
     *     notes="Multiple status values can be provided with comma seperated strings",
     *     type="array",
     *     items="$ref:Pet",
     *     nickname="findPetsByStatus",
     *     @SWG\Parameter(
     *       name="status",
     *       description="Status values that need to be considered for filter",
     *       defaultValue="available",
     *       required=true,
     *       type="string",
     *       paramType="query",
     *       enum="['available','pending','sold']"
     *     ),
     *     @SWG\ResponseMessage(code=400, message="Invalid status value")
     *   )
     * )
     */
    function findByStatus() 
    {
        return "ok";
    }

    /**
     * @SWG\Api(path="/pet/findByTags",
     *   @SWG\Operation(
     *     method="GET",
     *     summary="Finds Pets by tags",
     *     notes="Muliple tags can be provided with comma seperated strings. Use tag1, tag2, tag3 for testing.",
     *     type="array",
     *     @SWG\Items("Pet"),
     *     nickname="findPetsByTags",
     *     @SWG\Parameter(
     *       name="tags",
     *       description="Tags to filter by",
     *       required=true,
     *       type="string",
     *       paramType="query"
     *     ),
     *     @SWG\ResponseMessage(code=400, message="Invalid tag value"),
     *     deprecated="true"
     *   )
     * )
     */
    function findPetsByTags() 
    {
        return "ok";
    }
}