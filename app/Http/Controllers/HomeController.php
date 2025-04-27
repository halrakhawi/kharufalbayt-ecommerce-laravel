<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topcategories;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories=DB::table('top_categories')->where('top_categories.status',1)->get();
        // ->join('categories','categories.type','top_categories.id')
        // ->select('categories.*')
        // ->where('top_categories.status',1)
        // ->where('categories.status',1)
        // ->get();
        return view('home',compact('categories'));
    }
}
