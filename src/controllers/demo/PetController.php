<?php

namespace DomAndTom\LaravelSwagger;

use App;
use Config;
use URL;
use Response;
use Input;
use DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

/**
 * @SWG\Resource(
 *   apiVersion="1.0.0",
 *   swaggerVersion="1.2",
 *   resourcePath="/petdemo",
 *   description="Operations about pets",
 *   produces="['application/json']"
 * )
 */
class PetController extends Controller
{
    /**
     * @SWG\Api(
     *   path="/petdemo/{petId}",
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
    public function getPetById($petId)
    {
        if (!is_numeric($petId)) {
            return Response::json(array('code' => 400, 'message' => 'Invalid ID supplied'), 400);
        } 

        $pet = Pet::with('category', 'tags')->find($petId);

        if (is_null($pet)) {
            return Response::json(array('code' => 404, 'message' => 'Pet not found'), 404);
        }

        return Response::json($pet, 200);
    }

    /**
     * @SWG\Api(
     *   path="/petdemo/findByStatus",
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
        $status = Input::get('status');

        if (!in_array($status, array('available','pending','sold'))) {
            return Response::json(array('code' => 400, 'message' => 'Invalid status value'), 400);
        }

        $pets = Pet::with('category', 'tags')->where('status', '=', $status)->get();

        return Response::json($pets, 200);
    }

    /**
     * @SWG\Api(
     *   path="/petdemo/findByTags",
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
        $tagsInput = Input::get('tags');
        $tags = explode(",", $tagsInput);
        $tags = array_map('trim', $tags);

        if (empty($tags)) {
            return Response::json(array('code' => 400, 'message' => 'Invalid status value'), 400);
        }

        $pets = Pet::with('category', 'tags')->whereHas('tags', function($q) use ($tags)
        {
            $q->whereIn('laravel_swagger_tags.name', $tags);

        })->get();

        return Response::json($pets, 200);
    }
}