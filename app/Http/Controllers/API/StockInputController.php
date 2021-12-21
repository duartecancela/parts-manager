<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Part as PartResource;
use App\Models\Part;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\StockInput;
use App\Http\Resources\StockInput as StockInputResource;


class StockInputController extends BaseController
{
    public function index()
    {
        $stockInputs = StockInput::all();
        return $this->sendResponse(StockInputResource::collection($stockInputs), 'StockInputs fetched.');
    }

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
