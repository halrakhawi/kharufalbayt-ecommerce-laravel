<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segmentation;
use App\Models\SubCategory;
use App\Models\Product;

class SegmentaionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $segs=Segmentation::where('status',1)->get();
        $product=Product::find(session('pid'));
        $subcat=SubCategory::where('id',$product->cat_id)->first();
       
        return view('front.segmentation',compact(['segs','subcat']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function showpic(Request $request)
    {

        $segm=Segmentation::where('id',$request->sid)->first();
        session(['sid' => $request->sid]);
        return response()->json([
            'error' => false,
            'pic'  => $segm->picture,
        ]);


    }
}
