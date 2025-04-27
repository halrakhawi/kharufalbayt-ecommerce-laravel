<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;

class OrderController extends Controller
{

    public function report($id){
        $orderid=$id;
        $order = Order::where('id',$orderid)->first();
        //$orderdetails = OrderDetails::where('order_id',$order->id)->get();
        $orderdetails = OrderDetails::join('packages', 'order_details.pack', '=', 'packages.id')
              ->join('segmentations', 'order_details.cut_type', '=', 'segmentations.id')
               ->where('order_details.order_id',$order->id)
              ->get(['order_details.*', 'segmentations.name as segmentname', 'packages.name as packname']);
        $user=User::where('id',$order->user_id)->first();
    
         return view('front.report',compact(['order','orderdetails','user']));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
