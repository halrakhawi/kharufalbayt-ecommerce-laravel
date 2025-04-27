<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Validator;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    public function allProducts(){
        //$products=Product::all();
        $products=DB::table('products')
        ->join('subCategory','subCategory.id','products.cat_id')
        ->join('categories','categories.id','subCategory.cat_id')
        ->select('products.*',DB::raw("CONCAT(categories.name,' - ',subCategory.name,' - ',products.name) AS pname"),'categories.picture')
        ->get();
        $array=$products->toArray();
        // dd($array);
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
    }

    public function active($id){
        $product=Product::find($id);
        if($product->status==1)
        $product->status=0;
        else
        $product->status=1;
        $product->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategory($id)
    {
        $data = SubCategory::where('cat_id',$id)->get();
        \Log::info($data);
        return response()->json(['data' => $data]);
    }
    public function create()
    {
        // $categories=Category::where('status',1)->get();
        // $subcategories=SubCategory::all();
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'status'=>'required',
            'sub_category'=>'required',
            'price'=>'required'
        ],[
            'name.required'=>'الاسم مطلوب',
            'description.required'=>'الوصف مطلوب',
            'status.required'=>' الحالة مطلوبة',
            'sub_category.required'=>' التصنيف الفرعي مطلوب',
            'price.required'=>'السعر مطلوب'
        ]);
        if($validator->fails()){
        $messages=$validator->messages();
        return redirect()->back()->withErrors($validator);
        }else{
        $product=Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'status' => $request['status'],
            'price' => $request['price'],
            'cat_id' => $request['sub_category']
        ]);
        
        return redirect()->route('admin.products.index')->with('errors');
    }
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
        $product=Product::find($id);
        return view('admin.products.edit',compact('product'));
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
        $product=Product::find($id);
        $product->name=$request['name'];
        $product->description=$request['description'];
        $product->price=$request['price'];
        $product->status=$request['status'];
        $product->save();
        return redirect()->back();
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
