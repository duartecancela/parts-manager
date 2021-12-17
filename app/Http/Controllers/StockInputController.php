<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\StockInput;
use App\Models\Storage;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($part_id)
    {
        $part = Part::with('categories')->where('id', $part_id)->with('categories')->first();
        $suppliers = Supplier::all();
        $storages = Storage::all();
        return view('stock_inputs.create',['suppliers'=>$suppliers, 'storages'=>$storages, 'part'=>$part]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save to database
        $stockInput = new StockInput();
        $stockInput->part_id = $request->input('part_id');
        $stockInput->storage_id = $request->input('storage');
        $stockInput->supplier_id = $request->input('supplier');
        $stockInput->date = Carbon::now();
        $stockInput->quantity = $request->input('quantity');
        $stockInput->description = $request->input('description');
        dd($request->input('description'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
