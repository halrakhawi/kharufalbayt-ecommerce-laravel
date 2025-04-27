<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Order;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $completorderscount=Order::where('status',2)->count();
        $neworderscount=Order::where('status',0)->count();
        $confirmorderscount=Order::where('status',1)->count();
        $rejectorderscount=Order::where('status',3)->count();
        $totalpay= DB::table('orders')->where('status',2)->sum('total_price');
        $userscount=User::count();
       return view('admin.dashboard',compact(['userscount','completorderscount','neworderscount','confirmorderscount','rejectorderscount','totalpay']));
    }

    public function getlogin(){
        return view('admin.login');
    }
    public function advertis(){
        return view('admin.advertis.create');
    }
    public function advertisindex(){
        return view('admin.advertis.index');
    }
    public function advertisdelete($id){
        $ad=Advertisment::find($id);
        $ad->delete();
        return redirect()->back();
    }
    public function alladvertis(){
        $ads=Advertisment::all();
        $array=$ads->toArray();
        $dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
 );
 
 
    return response()->json($dataset);
    }
    public function advertisStore(Request $request){
        if ($request->has('picture')) {
            $fileext=$request->file('picture')->getClientOriginalExtension();
            $filename=time().'.'.$fileext;
            $path = $request->file('picture')->move('/hermes/walnacweb05/walnacweb05ab/b2508/moo.kharufalbaytcomsa/assets/advertisments/', $filename);
        }
        $ad=Advertisment::create([
            'picture' => $filename
        ]);
        return redirect()->route('admin.advertis.create')->with('errors');

    }

    public function login(Request $request){
        if (auth()->guard('admin')->attempt(['email' => $request->input("uname"), 'password' => $request->input("psw")])) {
            return redirect()->route('admin.dashboard');

        }


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
