<?php

namespace App\Http\Controllers;

use App\Models\Part;

class PagesController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::with('categories')->orderBy('created_at', 'desc')->paginate(10);
        return view('index', ['parts' => $parts]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }
}
