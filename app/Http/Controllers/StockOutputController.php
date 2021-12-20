<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\StockOutput;
use App\Models\Storage;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockOutputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockOutputs = StockOutput::with('parts')->orderBy('created_at', 'desc')->paginate(10);
        return view('stock_outputs.index', ['stockOutputs' => $stockOutputs]);
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
        return view('stock_outputs.create', ['suppliers' => $suppliers, 'storages' => $storages, 'part' => $part]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save to database
        $stockOutput = new StockOutput();
        $stockOutput->part_id = $request->input('part_id');
        $stockOutput->created_at = Carbon::now();
        $stockOutput->quantity = $request->input('quantity');
        $stockOutput->description = $request->input('description');
        $stockOutput->save();
        // update stock
        $this->removeFromStock($request->input('quantity'), $request->input('part_id'));

        $stockOutputs = StockOutput::with('parts')->paginate(10);
        return view('stock_outputs.store', ['stockOutputs' => $stockOutputs]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $currentStock
     * @param $subtractValue
     * @return update stock
     */
    public function removeFromStock($subtractValue, $part_id)
    {
        $part = Part::with('categories')->where('id', $part_id)->with('categories')->first();
        $oldStock = $part->stock;
        $newStock = $oldStock - $subtractValue;

        Part::where('id', $part_id)->update(['stock' => $newStock]);
        $part->save();

    }
}
