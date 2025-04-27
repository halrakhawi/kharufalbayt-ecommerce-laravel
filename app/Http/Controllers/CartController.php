<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart\Cart;
use Cart\Storage\SessionStore;
use Cart\CartItem;
use App\Models\Product;


class CartController extends Controller
{
    public $cart;
    public $errorLog = array();
    
    public function __construct(Request $request){
        dd(session('pid'));
    session(['withstamp' => $request->withstamp,'notes' => $request->notes,'pack'=>$request->pack]);
        $cartSessionStore = new SessionStore();
        $this->cart= new Cart(session('pid'), $cartSessionStore);
        $this->restore();   
    }

    
	
	 public function clear(){
		 $this->cart->clear();
		 $this->save();
	 }
	 
	 public function remove($item_id){
		 $this->cart->remove($item_id);
		 $this->save();
	 }
	 
	 public function updateQuantity($itemId, $quantity){
		 
		  $this->cart->update($itemId,'quantity',$quantity);
		 $this->save();
	 }
	
	public function addToCart(){
        $product=Product::where('id',session('pid'))->first();
		$item = new CartItem;
		$item->name=$product->name;
		$item->price =$product->price;
		$item->picture =$product->category->picture;
         $item->sku = $product->id;
		 $item->quantity = session('quantity');
         $item->tax = 0.15*$product->price;
		 $item->options = array(
            'cuttype' => session('segm'),
            'pack' => session('pack'),
			'comment' => session('notes'),
			'internal' => session('with'),
			'ahead' => session('withhead'),
			'stamp' => session('withstamp')
        );
        $this->cart->add($item);
        $this->save();
        return view('front.cart',compact('item'));
		
	}

    public function get($id){
        $item = $this->cart->get($id);
        if ($item) {
            return $item;
        }
    }
	
	public function getTotal(){
        $total=$this->cart->total();
        return $total;
       
   }
   public function getTotalPriceExcludingTax(){
       $total=$this->cart->totalExcludingTax();
       return $total;

   }

   public function getTax(){

    $tax = $this->cart->tax();
    return $tax;
    
 }

    // public function contents(){
    //     $cartItems = $this->cart->all();
    //     $d = '';
    //     if (count($cartItems) > 0) {
    //         foreach ($cartItems as $item) {
    //             $itemArr = $item->toArray();
    //             $id = $item->getId();
    //             $d .= "<li>{$id}: {$item->name} -> {$item->quantity}x{$item->price}</li>";
    //         }
    //     }
    //     return "<ul>$d</ul>";
    // }
	public function getCartView(){
		
		  $cartItems = $this->cart->all();
		  return view('front.cart',compact('cartItems'));
		
	}

    private function save(){
        $this->cart->save();
    }

    private function restore(){
        try {
            $this->cart->restore();
        } catch (Exception $e) {
            $this->errorLog[] = 'Caught exception: '.  $e->getMessage();
        }   
    }
}
