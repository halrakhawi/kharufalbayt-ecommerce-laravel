<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index');
    }
    public function neworders()
    {
        return view('admin.orders.neworders');
    }
    public function allneworders()
    {
        $neworders=Order::where('status',0)->get();
        $array=$neworders->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
 
    }
    public function confirmorders()
    {
        return view('admin.orders.confirmorders');
    }
    public function allconfirmorders()
    {
        $confirmorders=Order::where('status',1)->get();
        $array=$confirmorders->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
 
    }
    public function completeorders()
    {
        return view('admin.orders.completeorders');
    }
    public function allcompleteorders()
    {
        $confirmorders=Order::where('status',2)->get();
        $array=$confirmorders->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
 
    }

    public function rejectorders()
    {
        return view('admin.orders.rejectorders');
    }
    public function allrejectorders()
    {
        $confirmorders=Order::where('status',3)->get();
        $array=$confirmorders->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
 
    }


    public function allOrders(){  
       $orders=Order::all();
       $array=$orders->toArray();
       $dataset = array(
   "echo" => 1,
   "totalrecords" => count($array),
   "totaldisplayrecords" => count($array),
   "data" => $array
);


   return response()->json($dataset);
  
   }

   public function orderdetails($id){
    $orderid=$id;
    $orderdetails = Order::where('id',$orderid)->first();
    $user=User::where('id',$orderdetails->user_id)->first();

     return view('admin.orders.orderdetails',compact(['orderid','orderdetails','user']));
}
   public function report($id){
    $orderid=$id;
    $order = Order::where('id',$orderid)->first();
    //$orderdetails = OrderDetails::where('order_id',$order->id)->get();
    $orderdetails = OrderDetails::join('packages', 'order_details.pack', '=', 'packages.id')
          ->join('segmentations', 'order_details.cut_type', '=', 'segmentations.id')
           ->where('order_details.order_id',$order->id)
          ->get(['order_details.*', 'segmentations.name as segmentname', 'packages.name as packname']);
    $user=User::where('id',$order->user_id)->first();

     return view('admin.orders.orderreport',compact(['order','orderdetails','user']));
}

public function changeorderstatus(Request $request,$id){
    $order = Order::find($id);
    $order->status=$request['status'];
    $order->save();
    return redirect()->back();

}
public function orderdetailsdata($id){
       

    
    $orderdetails = OrderDetails::join('packages', 'order_details.pack', '=', 'packages.id')
          ->join('segmentations', 'order_details.cut_type', '=', 'segmentations.id')
           ->where('order_details.order_id',$id)
          ->get(['order_details.*', 'segmentations.name as segmentname', 'packages.name as packname']);
    
    
    $array=$orderdetails->toArray();
    $dataset = array(
"echo" => 1,
"totalrecords" => count($array),
"totaldisplayrecords" => count($array),
"data" => $array
);


return response()->json($dataset);

}

public function dilver($id){
    $orderid=$id;
    $orderdetails = Order::where('id',$orderid)->first();

     return view('admin.orders.dilver',compact(['orderid','orderdetails']));
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
}
