<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Topcategories;
use Validator;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index');
    }
    public function topindex()
    {
        return view('admin.topcategories.index');
    }
    public function allCategories(){
        $categories=DB::table('categories')
         ->join('top_categories','top_categories.id','categories.type')
         ->select('categories.*', 'top_categories.name as topcat')
         ->get();
        $array=$categories->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
    }
    public function topallCategories(){
        $categories=Topcategories::all();
        $array=$categories->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
    }
    public function getCategory($id)
    {
        $data = SubCategory::where('cat_id',$id)->get();
        \Log::info($data);
        return response()->json(['data' => $data]);
    }


    public function active($id){
        $cat=Category::find($id);
        if($cat->status==1)
        $cat->status=0;
        else
        $cat->status=1;
        $cat->save();
        return redirect()->back();
    }
    public function topactive($id){
        $cat=Topcategories::find($id);
        if($cat->status==1)
        $cat->status=0;
        else
        $cat->status=1;
        $cat->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topcats=Topcategories::where('status',1)->get();
        return view('admin.categories.create',compact('topcats'));
    }
    public function topcreate()
    {
        return view('admin.topcategories.create');
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
            'price'=>'required',
            'cat_id'=>'required',
            'picture'=>'required|image|mimes:jpg,bmp,png'
        ],[
            'name.required'=>'الاسم مطلوب',
            'description.required'=>'الوصف مطلوب',
            'status.required'=>' الحالة مطلوبة',
            'price.required'=>'السعر مطلوب',
            'cat_id.required'=>'التصنيف مطلوب',
            'picture.required'=>'الصورة مطلوبة',
            'picture.image'=>'الملف ليس صورة',
        ]);
        if($validator->fails()){
        $messages=$validator->messages();
        //dd($messages);
        return redirect()->back()->withErrors($validator);
        }else{
        $filename="";
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/categories/', $filename);
        }
        $cat=Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'status' => $request['status'],
            'price' => $request['price'],
            'type' => $request['cat_id'],
            'picture' => $filename,
        ]);
        
        return redirect()->route('admin.categories.index')->with('errors');
    }
    }
    public function topstore(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required',
            'picture'=>'required|image|mimes:jpg,bmp,png'
        ],[
            'name.required'=>'الاسم مطلوب',
            'status.required'=>' الحالة مطلوبة',
            'picture.required'=>'الصورة مطلوبة',
            'picture.image'=>'الملف ليس صورة',
        ]);
        if($validator->fails()){
        $messages=$validator->messages();
        return redirect()->back()->withErrors($validator);
        }else{
        $filename="";
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/topcategories/', $filename);
        }
        $cat=Topcategories::create([
            'name' => $request['name'],
            'status' => $request['status'],
            'picture' => $filename,
        ]);
        
        return redirect()->route('admin.topcategories.index')->with('errors');
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
        $cat=Category::find($id);
        $topcat=Topcategories::where('id',$cat->type)->first();
        $topcats=Topcategories::where('status',1)->where('id','<>',$cat->type)->get();

        return view('admin.categories.edit',compact(['cat','topcat','topcats']));
    }
    public function editsub($id)
    {
        $subcat=SubCategory::find($id);
        $cat=Category::where('id',$subcat->cat_id)->first();
        $cats=Category::where('status',1)->where('id','<>',$subcat->cat_id)->get();

        return view('admin.subcategories.edit',compact(['subcat','cat','cats']));
    }
    public function topedit($id)
    {
        $cat=topcategories::find($id);
        return view('admin.topcategories.edit',compact('cat'));
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
       // dd(url('public/assets/categories/'));
        $cat=Category::find($id);
        $cat->name=$request['name'];
        $cat->description=$request['description'];
        $cat->price=$request['price'];
        $cat->status=$request['status'];
        $cat->type=$request['cat_id'];
        $filename="";
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/categories/', $filename);
            $cat->picture=$filename;
        }
        $cat->save();
        return redirect()->back();
    }
    public function topupdate(Request $request, $id)
    {
       // dd(url('public/assets/categories/'));
        $cat=Topcategories::find($id);
        $cat->name=$request['name'];
        $cat->status=$request['status'];
        $filename="";
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/topcategories/', $filename);
            $cat->picture=$filename;
        }
        $cat->save();
        return redirect()->back();
    }
    public function updatesub(Request $request, $id)
    {
        $subcat=SubCategory::find($id);
        $subcat->name=$request['name'];
        $subcat->flag=$request['flag'];
        $subcat->options=$request['options'];
        $filename="";
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/subcategories/', $filename);
            $subcat->picture=$filename;
        }
        $subcat->save();
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
	
	
	
	
	 public function indexsub()
    {
        return view('admin.subcategories.index');
    }
	
	 public function allsubCategories(){
		 
		 $subcategories=DB::table('subCategory')
         ->join('categories','categories.id','subCategory.cat_id')
         ->select('subCategory.id as id', 'subCategory.name as name','categories.name as category','subCategory.picture','subCategory.flag')
         ->get();
        $array=$subcategories->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
    }
	
	
	
	 public function createsub()
    {
        return view('admin.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storesub(Request $request)
    {
		//dd("hhhh");
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'flag'=>'required',
            'options'=>'required',
            'picture'=>'required|image|mimes:jpg,bmp,png'
        ],[
            'name.required'=>'الاسم مطلوب',
            'flag.required'=>' الحالة مطلوبة',
            'options.required'=>' الاضافات مطلوبة',
            'picture.required'=>'الصورة مطلوبة',
            'picture.image'=>'الملف ليس صورة',
        ]);
        if($validator->fails()){
        $messages=$validator->messages();
        //dd($messages);
        return redirect()->back()->withErrors($validator);
        }else{
        $filename="";
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/subcategories/', $filename);
        }
        $cat=SubCategory::create([
            'name' => $request['name'],
            'cat_id' => $request['cat_id'],
            'flag' => $request['flag'],
            'options' => $request['options'],
            'picture' => $filename,
        ]);
        
        return redirect()->route('admin.subcategories.index')->with('errors');
    }
    }
	 public function activesub($id){
        $cat=SubCategory::find($id);
        if($cat->flag==1)
        $cat->flag=0;
        else
        $cat->flag=1;
        $cat->save();
        return redirect()->back();
    }
}
