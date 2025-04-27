<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coupons.index');
    }
    public function allcoupons(){
        $coupons=Coupon::all();
        $array=$coupons->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
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
            'code'=>'required',
            'type'=>'required',
            'status'=>'required',
            'discount'=>'required',
            'number_of_use'=>'required'

        ],[
            'code.required'=>'الكود مطلوب',
            'type.required'=>'النوع مطلوب',
            'status.required'=>' الحالة مطلوبة',
            'discount.required'=>'مقدار الخصم مطلوب',
            'number_of_use.required'=>'عدد الاستخدام مطلوب'
        ]);
        if($validator->fails()){
        $messages=$validator->messages();
        return redirect()->back()->withErrors($validator);
        }else{
        $coupon=Coupon::create([
            'code' => $request['code'],
            'type' => $request['type'],
            'status' => $request['status'],
            'discount' => $request['discount'],
            'number_of_use' => $request['number_of_use'],
        ]);
        
        return redirect()->route('admin.coupons.index')->with('errors');
    }
    }

    public function active($id){
        $coupon=Coupon::find($id);
        if($coupon->status==1)
        $coupon->status=0;
        else if($coupon->status==0)
        $coupon->status=1;
        $coupon->save();
        return redirect()->back();
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
        $coupon=Coupon::find($id);
        return view('admin.coupons.edit',compact('coupon'));
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
        $coupon=Coupon::find($id);
        $coupon->code = $request['code'];
        $coupon->type = $request['type'];
        $coupon->status = $request['status'];
        $coupon->discount = $request['discount'];
        $coupon->number_of_use = $request['number_of_use'];
       
        $coupon->save();
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
