<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::with('categories')->get();
        return view('parts.index', ['parts'=>$parts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('parts.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get name and id by id from category
        $tableRow = DB::table('categories')->where('id', $request->input('category'))->first();
        $categoryId = $tableRow->id;
        $categoryName = $tableRow->name;

        // save data to database
        $part = new Part();
        $part->name = $request->input('name');
        $part->category_id = $categoryId;
        $part->description = $request->input('description');
        $part->stock = 0; // init stock
        $part->save();
        return view('parts.store',['part'=>$part, 'categoryName'=>$categoryName]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $part = Part::with('categories')->where('id', $id)->with('categories')->first();
        return view('parts.show',['part'=>$part]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $part = Part::with('categories')->where('id', $id)->with('categories')->first();
        return view('parts.edit',['part'=>$part, 'categories'=>$categories ]);
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
