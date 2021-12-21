<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\StockOutput;
use App\Http\Resources\StockOutput as StockOutputResource;

class StockOutputController extends  BaseController
{
    public function index()
    {
        $stockOutputs = StockOutput::all();
        return $this->sendResponse(StockOutputResource::collection($stockOutputs), 'Stock Outputs fetched.');
    }

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
