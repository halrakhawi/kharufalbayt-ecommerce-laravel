<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Cart\Cart;
use Cart\Storage\SessionStore;
use Cart\CartItem;
use DB;

class CategoryController extends Controller
{
    public $cart;
    public $errorLog = array();
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.category');
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
        $cat=Category::where('id',$id)->first();
        $products=Product::where('cat_id',$id)->where('status',1)->get();
        return view('front.category',compact(['cat','products']));
    }
    public function showcategorybyid($id)
    {
        $catss=Category::where('type',$id)->get();
        $products=Product::where('cat_id',$catss->id)->where('status',1)->get();
        return view('front.category',compact(['catss','products']));
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

    public function cart(Request $request)
    {
        $product=Product::where('id',session('pid'))->first();
        $category=Category::where('id',$product->cat_id)->first();
        session(['withstamp' => $request->withstamp,'notes' => $request->notes,'pack'=>$request->pack]);
        $cart=\Cart::session(auth('user')->user()->mobile)->add(array(
            'id' => rand(2,50),
            'name' => $category->name." : ".$product->name,
            'price' => $product->price,
            'quantity' => (int)session('quantity'),
            'attributes' => array('pid'=>session('pid'),'withstamp'=>session('withstamp'),'notes'=>session('notes'),'pack'=>session('pack'),'with'=>session('with'),'withhead'=>session('withhead'),'segm'=>session('segm'),'picture' => $category->picture),
            'associatedModel' => $product
        ));
        
        return redirect()->route('getcart');
    }

 public function getCartView(){
     //dd(\Cart::session(auth('user')->user()->mobile));
    $product=Product::where('id',session('pid'))->first();
    $items = \Cart::session(auth('user')->user()->mobile)->getContent();
    $cartItems=$items->toArray();
    $total=\Cart::session(auth('user')->user()->mobile)->getTotal();
        
        return view('front.cart',compact(['cartItems','product','total']));
  
}
public function deletecartItem($id){
    \Cart::session(auth('user')->user()->mobile)->remove($id);
    return redirect()->back();
}


public function allcategories(){
    $types=[1=>'غنم',2=>'حاشي'];
    $sheeps=Category::all()->groupBy(function($data) {
        return $data->type;
    });
   $sheepss=$sheeps->toArray();
    return view('front.allcategories',compact(['sheepss','types']));
}

public function share($type){
    
}

}
