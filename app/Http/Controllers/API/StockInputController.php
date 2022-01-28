<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\StockInput;
use App\Http\Resources\StockInput as StockInputResource;


class StockInputController extends BaseController
{
    /**
     * @OA\Get(
     * path="/api/stock_inputs",
     * summary="List stock input parts.",
     * description="List of stock input parts",
     * operationId="index",
     * tags={"stock_inputs"},
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
     *					"storage_id": 1,
     *					"supplier_id": 1,
     *					"quantity": 5,
     *					"description": "To new project",
     *					"created_at": "12/17/2021",
     *					"updated_at": "12/17/2021"
     *				},
     *			"message": "StockInputs fetched."
     *                     })
     *        )
     *     )
     * )
     */
    public function index()
    {
        $stockInputs = StockInput::all();
        return $this->sendResponse(StockInputResource::collection($stockInputs), 'StockInputs fetched.');
    }

    /**
     * @OA\Post(
     * path="/api/stock_input",
     * summary="Input part in to stock.",
     * description="Input stock an electronic part",
     * operationId="store",
     * tags={"stock_inputs"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Insert part fields",
     *    @OA\JsonContent(
     *       required={"part_id","storage_id", "supplier_id", "quantity"},
     *       @OA\Property(property="part_id", type="int", example="1"),
     *       @OA\Property(property="storage_id", type="int",  example="1"),
     *       @OA\Property(property="supplier_id", type="int", example="1"),
     *       @OA\Property(property="quantity", type="int", example="5"),
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
     *                          "id": "10",
     *                          "part_id": "2",
     *                          "storage_id": "1",
     *                          "supplier_id": "1",
     *                          "quantity": "4",
     *                          "description": "For robotic project",
     *                          "created_at": "01/28/2022",
     *                          "updated_at": "01/28/2022"
     *                          },
     *                          "message": "Stock Input created."
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
            'storage_id' => 'required',
            'supplier_id' => 'required',
            'quantity' => 'required',
            'description' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $stockInput = StockInput::create($input);
        return $this->sendResponse(new StockInputResource($stockInput), 'Stock Input created.');
    }

}
