<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Part;
use App\Http\Resources\Part as PartResource;

class PartController extends BaseController
{
    public function index()
    {
        $parts = Part::all();
        return $this->sendResponse(PartResource::collection($parts), 'Parts fetched.');
    }

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
        $blog = Part::create($input);
        return $this->sendResponse(new PartResource($blog), 'Part created.');
    }

    public function show($id)
    {
        $part = Part::find($id);
        if (is_null($part)) {
            return $this->sendError('Part does not exist.');
        }
        return $this->sendResponse(new PartResource($part), 'Part fetched.');
    }

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

    public function destroy(Part $part)
    {
        $part->delete();
        return $this->sendResponse([], 'Part deleted.');
    }
}
