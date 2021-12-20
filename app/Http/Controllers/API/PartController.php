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
        return $this->sendResponse(BlogResource::collection($parts), 'Parts fetched.');
    }
}
