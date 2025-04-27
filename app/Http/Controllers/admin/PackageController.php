<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Validator;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.package.index');
    }

    public function allPackages(){
        $packages=Package::all();
        $array=$packages->toArray();
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
        $packages=Package::find($id);
        if($packages->status==1)
        $packages->status=0;
        else
        $packages->status=1;
        $packages->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package.create');
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
        //dd($messages);
        return redirect()->back()->withErrors($validator);
        }else{
        $filename="";
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/packages/', $filename);
        }
        $pak=Package::create([
            'name' => $request['name'],
            'status' => $request['status'],
            'picture' => $filename,
        ]);
        
        return redirect()->route('admin.packages.index')->with('errors');
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
        $pak=Package::find($id);
        return view('admin.package.edit',compact('pak'));
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
        $pak=Package::find($id);
        $pak->name=$request['name'];
        $pak->status=$request['status'];
        $filename="";
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/packages/', $filename);
            $pak->picture=$filename;
        }
        $pak->save();
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
