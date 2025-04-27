<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Topcategories;
use Cart\Cart;
use Cart\Storage\SessionStore;
use Cart\CartItem;
use DB;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public $cart;
    public $errorLog = array();
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
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
    public function store(Request $request):View
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id):View
    {
        $cat=subCategory::where('id',$id)->first();
        $subcat=DB::table('subCategory')
        ->where('subCategory.id',$id)
		->join('categories','categories.id','subCategory.cat_id')
        ->select('subCategory.*','categories.name as cat','categories.description')
        ->first();
        $products=Product::where('cat_id',$id)->where('status',1)->get();
        //session(['prodid' => $products[0]->id]);
        return view('front.category',compact(['subcat','products','cat']));
    }
    public function showcategorybyid($id)
    {
        $catss=Category::where('type',$id)->where('status',1)->get();
        // $products=Product::where('cat_id',$catss->id)->where('status',1)->get();
        return view('front.getcategories',compact(['catss']));
    }

    public function showProduct($id)
    {
        $product = Product::find($id);
        $subcat=SubCategory::where('id',$product->cat_id)->first();
        $cat=Category::where('id',$subcat->cat_id)->first();
        //session(['prodid' => $products[0]->id]);
        return view('front.product',compact(['subcat','product','cat']));
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
        $subcategory=SubCategory::where('id',$product->cat_id)->first();
        $category=Category::where('id',$subcategory->cat_id)->first();
        session(['withstamp' => $request->withstamp,'notes' => $request->notes,'pack'=>$request->pack]);
        $cart=\Cart::session(auth('user')->user()->mobile)->add(array(
            'id' => rand(2,50),
            'name' => $category->name." - ".$subcategory->name." - ".$product->name,
            'price' => $product->price,
            'quantity' => (int)session('quantity'),
            'attributes' => array('pid'=>session('pid'),'withstamp'=>session('withstamp'),'notes'=>session('notes'),'pack'=>session('pack'),'with'=>session('with'),'withhead'=>session('withhead'),'segm'=>session('segm'),'picture' => $subcategory->picture),
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
        $top=Topcategories::where('status',1)->get();
        $sheeps=Category::where('status',1)->get()->groupBy(function($data) {
            return $data->type;
        });
        $types=$top->pluck('name', 'id')->all();
        $sheepss=$sheeps->toArray();
        return view('front.allcategories',compact(['sheepss','types','top']));
    }
    
    public function showsub($id)
    {
        $subcat=SubCategory::where('cat_id',$id)->where('flag',1)->get();
        $cat=Category::where('id',$id)->first();
        return view('front.subcategory',compact(['subcat','cat']));
    }

public function share($type){
    
}

}
