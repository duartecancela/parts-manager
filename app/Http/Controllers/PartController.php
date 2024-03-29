<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::with('categories')->orderBy('created_at', 'desc')->paginate(10);
        return view('parts.index', ['parts' => $parts]);
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
        $request->validate([
            'name' => 'required|string',
        ]);

        // save data to database
        $part = new Part();
        $part->name = $request->input('name');
        $part->category_id =$request->input('category');
        $part->description = $request->input('description');
        $part->stock = 0; // init stock
        $part->save();
        return view('parts.store',['part'=>$part]);
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
        Part::where('id', $id)->update(['name' => $request->input('name')]);
        Part::where('id', $id)->update(['category_id' => $request->input('category')]);
        Part::where('id', $id)->update(['description' => $request->input('description')]);

        $part = part::where('id',$id)->first();
        return view('parts.update',['part'=>$part]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = Part::where('id',$id)->first();
        $part->delete();
        $parts = Part::with('categories')->orderBy('created_at', 'desc')->get();
        return view('parts.destroy',['parts'=>$parts]);
    }
}
