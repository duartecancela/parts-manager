<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Part;
use App\Http\Resources\Part as PartResource;

class PartController extends BaseController
{
    /**
     * @OA\Get(
     * path="/api/parts",
     * summary="List parts.",
     * description="List of all electronic parts",
     * operationId="index",
     * tags={"part"},
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     *    @OA\JsonContent(
     *       @OA\Property(property="part", type="Object", example={
     *                         "id": 1,
     *                         "name": "BC545",
     *                         "category": "Transistores",
     *                         "quantity": 0
     *                     })
     *        )
     *     )
     * )
     * @OA\Info(title="Parts Manager API", version="0.1"),
     */
    public function index()
    {
        $parts = Part::all();
        return $this->sendResponse(PartResource::collection($parts), 'Parts fetched.');
    }


    /**
     * @OA\Post(
     * path="/api/parts",
     * summary="Store part.",
     * description="Store an electronic part",
     * operationId="store",
     * tags={"part"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Insert part fields",
     *    @OA\JsonContent(
     *       required={"name","category", "quantity"},
     *       @OA\Property(property="name", type="string", example="BC545"),
     *       @OA\Property(property="category_id", type="string",  example="1"),
     *       @OA\Property(property="description", type="string", example="general propose transistor"),
     *       @OA\Property(property="quantity", type="int", example="0"),
     *    ),
     * ),
     * @OA\Response(
     *     response=201,
     *     description="Created",
     *    @OA\JsonContent(
     *       @OA\Property(property="part", type="Object", example={
     *                         "id'": 1,
     *                         "name": "BC545",
     *                         "category_id": "1",
     *                         "quantity": 0
     *                     })
     *        )
     *     )
     * )
     *
     *
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $part = Part::create($input);
        return $this->sendResponse(new PartResource($part), 'Part created.');
    }

    /**
     * @OA\Get(
     * path="/api/parts/{id}",
     * summary="Show part.",
     * description="Show an electronic part",
     * operationId="show",
     * tags={"part"},
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     *    @OA\JsonContent(
     *       @OA\Property(property="part", type="Object", example={
     *                         "id": 5,
     *                         "category_id": 2,
     *                         "name": "250",
     *                         "description": "1/4 W",
     *                         "stock": 0,
     *                         "created_at": "12/15/2021",
     *                         "updated_at": "12/15/2021"
     *                     })
     *        )
     *     )
     * )
     *
     *
     */
    public function show($id)
    {
        $part = Part::find($id);
        if (is_null($part)) {
            return $this->sendError('Part does not exist.');
        }
        return $this->sendResponse(new PartResource($part), 'Part fetched.');
    }

    /**
     * @OA\Put(
     * path="/api/parts/{id}",
     * summary="Update part",
     * description="Update an electronic part",
     * operationId="Upadte",
     * tags={"part"},
     * @OA\Parameter(
     *    description="name of Part",
     *    in="path",
     *    name="name",
     *    required=true,
     *    example="BC545",
     *    @OA\Schema(
     *       type="String",
     *       format="String"
     *    )
     * ),
     * @OA\Parameter(
     *    description="Id of Category",
     *    in="path",
     *    name="category_id",
     *    required=true,
     *    example="1",
     *    @OA\Schema(
     *       type="Integer",
     *       format="int"
     *    )
     * ),
     * @OA\Parameter(
     *    description="Part description",
     *    in="path",
     *    name="description",
     *    required=false,
     *    example="Generic Transistor",
     *    @OA\Schema(
     *       type="String",
     *       format="string"
     *    )
     * ),
     * @OA\Response(
     *     response=200,
     *     description="OK",
     *    @OA\JsonContent(
     *       @OA\Property(property="part", type="Object", example={
     *                         "id": 5,
     *                         "category_id": "1",
     *                         "name": "BC545",
     *                         "description": "Generic Transistor",
     *                         "created_at": "12/15/2021",
     *                         "updated_at": "01/27/2022"
     *                     })
     *        )
     *     )
     * )
     *
     *
     */
    public function update(Request $request, Part $part)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $part->category_id = $input['category_id'];
        $part->name = $input['name'];
        $part->description = $input['description'];
        $part->save();

        return $this->sendResponse(new PartResource($part), 'Part updated.');
    }

    /**
     * @OA\Delete(
     * path="/api/parts/{id}",
     * summary="Delete part.",
     * description="Delete an electronic part",
     * operationId="destroy",
     * tags={"part"},
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     *    @OA\JsonContent(
     *       @OA\Property(property="part", type="Object", example={
     *                         "success": true,
     *                             "data": "[]",
     *                             "message": "Part deleted."
     *
     *
     *
     *
     *                     })
     *        )
     *     )
     * )
     *
     *
     */
    public function destroy(Part $part)
    {
        $part->delete();
        return $this->sendResponse([], 'Part deleted.');
    }
}
