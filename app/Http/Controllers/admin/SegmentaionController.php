<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Segmentation;
use App\Models\HeadOption;
use App\Models\Internal;
use App\Models\PaymentMethods;
use Validator;


class SegmentaionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.segmentation.index');
    }

    public function allSegmentations(){
        $segmentations=Segmentation::all();
        $array=$segmentations->toArray();
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
        $segmentation=Segmentation::find($id);
        if($segmentation->status==1)
        $segmentation->status=0;
        else
        $segmentation->status=1;
        $segmentation->save();
        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.segmentation.create');
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
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/segmentations/', $filename);
        }
        $seg=Segmentation::create([
            'name' => $request['name'],
            'status' => $request['status'],
            'picture' => $filename,
        ]);
        
        return redirect()->route('admin.segmentations.index')->with('errors');
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
        $seg=Segmentation::find($id);
        return view('admin.segmentation.edit',compact('seg'));
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
        //dd(public_path('assets/segmentations'));
        $seg=Segmentation::find($id);
        $seg->name=$request['name'];
        $seg->status=$request['status'];
        $filename="";
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/segmentations/', $filename);
            $seg->picture=$filename;
        }
        $seg->save();
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
    
    //internals
    public function internalindex()
    {
        return view('admin.internal.index');
    }
    public function allinternals()
    {
        $internals=Internal::all();
        $array=$internals->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
}
    public function activeinternal($id)
    {
        $internal=Internal::find($id);
        if($internal->status==1)
        $internal->status=0;
        else
        $internal->status=1;
        $internal->save();
        return redirect()->back();
    }
    public function editinternal($id)
    {
        $internal=Internal::find($id);
        return view('admin.internal.edit',compact('internal'));
    }
    public function updateinternal(Request $request, $id)
    {
        $internal=Internal::find($id);
        $internal->name=$request['name'];
        $internal->status=$request['status'];
        $internal->save();
        return redirect()->back();
    }
    public function createinternal()
    {
        return view('admin.internal.create');
    }
    public function storeinternal(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required'
        ],[
            'name.required'=>'الاسم مطلوب',
            'status.required'=>' الحالة مطلوبة'
        ]);
        if($validator->fails()){
        $messages=$validator->messages();
        return redirect()->back()->withErrors($validator);
        }else{
        $internal=Internal::create([
            'name' => $request['name'],
            'status' => $request['status']
        ]);
        
        return redirect()->route('admin.internals.index')->with('errors');
    }
}




// PaymentMethods


 public function paymentmethodsindex()
 {
     return view('admin.paymentmethods.index');
 }
 public function allpaymentmethods()
 {
     $methods=PaymentMethods::all();
     $array=$methods->toArray();
     $dataset = array(
 "echo" => 1,
 "totalrecords" => count($array),
 "totaldisplayrecords" => count($array),
 "data" => $array
);


 return response()->json($dataset);
}
 public function activepaymentmethod($id)
 {
     $method=PaymentMethods::find($id);
     if($method->status==1)
     $method->status=0;
     else
     $method->status=1;
     $method->save();
     return redirect()->back();
 }
 public function editpaymentmethod($id)
 {
     $paymentmethod=PaymentMethods::find($id);
     return view('admin.paymentmethods.edit',compact('paymentmethod'));
 }
 public function updatpaymentmethod(Request $request, $id)
 {
     $internal=PaymentMethods::find($id);
     $internal->name=$request['name'];
     $internal->status=$request['status'];
     $internal->save();
     return redirect()->back();
 }
 public function createpaymentmethod()
 {
     return view('admin.paymentmethods.create');
 }
 public function storepaymentmethod(Request $request)
 {
     $validator=Validator::make($request->all(),[
         'name'=>'required',
         'status'=>'required'
     ],[
         'name.required'=>'الاسم مطلوب',
         'status.required'=>' الحالة مطلوبة'
     ]);
     if($validator->fails()){
     $messages=$validator->messages();
     return redirect()->back()->withErrors($validator);
     }else{
     $method=PaymentMethods::create([
         'name' => $request['name'],
         'status' => $request['status']
     ]);
     
     return redirect()->route('admin.paymentmethods.index')->with('errors');
 }
}


    //headoptions
    public function headoptionsindex()
    {
        return view('admin.headoptions.index');
    }
    public function allheadoptions()
    {
        $headoptions=HeadOption::all();
        $array=$headoptions->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
    }
    public function activeheadoptions($id)
    {
        $headoptions=HeadOption::find($id);
        if($headoptions->status==1)
        $headoptions->status=0;
        else
        $headoptions->status=1;
        $headoptions->save();
        return redirect()->back();
    }
    public function editheadoptions($id)
    {
        $headoptions=HeadOption::find($id);
        return view('admin.headoptions.edit',compact('headoptions'));
    }
    public function updateheadoptions(Request $request,$id)
    {
        $headoptions=HeadOption::find($id);
        $headoptions->options=$request['name'];
        $headoptions->status=$request['status'];
        $headoptions->save();
        return redirect()->back();
    }
    public function createheadoptions()
    {
        return view('admin.headoptions.create');
    }
    public function storeheadoptions(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required'
        ],[
            'name.required'=>'الاسم مطلوب',
            'status.required'=>' الحالة مطلوبة'
        ]);
        if($validator->fails()){
        $messages=$validator->messages();
        return redirect()->back()->withErrors($validator);
        }else{
        $headoptions=HeadOption::create([
            'options' => $request['name'],
            'status' => $request['status']
        ]);
        
        return redirect()->route('admin.headoptions.index')->with('errors');
    }
    }

}
