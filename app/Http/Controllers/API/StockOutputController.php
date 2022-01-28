<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\StockOutput;
use App\Http\Resources\StockOutput as StockOutputResource;

class StockOutputController extends  BaseController
{
    /**
     * @OA\Get(
     * path="/api/stock_outputs",
     * summary="List stock output parts.",
     * description="List of stock output parts",
     * operationId="index",
     * tags={"stock_outputs"},
     *
     * @OA\Response(
     *     response=200,
     *     description="OK",
     *    @OA\JsonContent(
     *       @OA\Property(property="part", type="Object", example={
     *		 "success": true,
     *			"data":
     *				{
     *					"id": 1,
     *					"part_id": 2,
     *					"quantity": 5,
     *					"description": "To new project",
     *					"created_at": "12/17/2021",
     *					"updated_at": "12/17/2021"
     *				},
     *			"message": "Stock Outputs fetched."
     *                     })
     *        )
     *     )
     * )
     */
    public function index()
    {
        $stockOutputs = StockOutput::all();
        return $this->sendResponse(StockOutputResource::collection($stockOutputs), 'Stock Outputs fetched.');
    }

    /**
     * @OA\Post(
     * path="/api/stock_output",
     * summary="Output part in to stock.",
     * description="Output stock an electronic part",
     * operationId="store",
     * tags={"stock_outputs"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Insert part fields",
     *    @OA\JsonContent(
     *       required={"part_id", "quantity", "description"},
     *       @OA\Property(property="part_id", type="int", example="3"),
     *       @OA\Property(property="quantity", type="int", example="2"),
     *       @OA\Property(property="description", type="string", example="For robotic project"),
     *    ),
     * ),
     * @OA\Response(
     *     response=201,
     *     description="Created",
     *    @OA\JsonContent(
     *       @OA\Property(property="part", type="Object", example={
     *                         "success": true,
     *                          "data": {
     *                                  "id": 3,
     *                                  "part_id": "2",
     *                                  "quantity": "2",
     *                                  "description": "For arduino project",
     *                                  "created_at": "01/28/2022",
     *                                  "updated_at": "01/28/2022",
     *                              },
     *                              "message": "Stock Output created."
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
            'part_id' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $stockOutput = StockOutput::create($input);
        return $this->sendResponse(new StockOutputResource($stockOutput), 'Stock Output created.');
    }
}
