<?php

use Illuminate\Support\Facades\Route;
use Cart\Cart;
use Cart\Storage\SessionStore;
use Cart\CartItem;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/login',[App\Http\Controllers\UserController::class,'login'])->name('login');
Route::post('/postlogin',[App\Http\Controllers\UserController::class,'postlogin'])->name('postlogin');
Route::post('/postlogin1',[App\Http\Controllers\UserController::class,'postlogin1'])->name('postlogin1');
Route::post('/login',[App\Http\Controllers\UserController::class,'store'])->name('signup');
Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/");
})->name('logout');
Route::get('/category',[App\Http\Controllers\CategoryController::class,'index'])->name('category')->middleware('auth:user');
Route::get('/category/{id}',[App\Http\Controllers\CategoryController::class,'show'])->name('showcategory')->middleware('auth:user');
Route::get('/product/{id}',[App\Http\Controllers\CategoryController::class,'showProduct'])->name('showproductweb')->middleware('auth:user');
Route::post('/product/calculate',[App\Http\Controllers\ProductController::class,'calculate'])->name('calculate')->middleware('auth:user');
Route::post('/segmentation/showpic',[App\Http\Controllers\SegmentaionController::class,'showpic'])->name('showpic')->middleware('auth:user');
Route::post('/package/showpacpic',[App\Http\Controllers\PackageController::class,'showpacpic'])->name('showpacpic')->middleware('auth:user');
Route::post('/package',[App\Http\Controllers\PackageController::class,'index'])->name('package')->middleware('auth:user');
Route::get('/segmentation',[App\Http\Controllers\SegmentaionController::class,'index'])->name('segmentaion')->middleware('auth:user');
Route::post('/cart',[App\Http\Controllers\CategoryController::class,'cart'])->name('cart')->middleware('auth:user');
Route::get('/getcart',[App\Http\Controllers\CategoryController::class,'getCartView'])->name('getcart')->middleware('auth:user');
Route::get('/cart/deleteItem/{id}',[App\Http\Controllers\CategoryController::class,'deletecartItem'])->name('deletecartItem')->middleware('auth:user');
Route::get('/share/{type}',[App\Http\Controllers\CategoryController::class,'share'])->name('share')->middleware('auth:user');
Route::get('/allcategories',[App\Http\Controllers\CategoryController::class,'allcategories'])->name('allcategories');
Route::get('/allproducts',[App\Http\Controllers\ProductController::class,'allproducts'])->name('allproducts');
Route::get('/checkout',[App\Http\Controllers\ProductController::class,'checkout'])->name('checkout')->middleware('auth:user');
Route::post('/completepayment',[App\Http\Controllers\ProductController::class,'completepayment'])->name('completepayment')->middleware('auth:user');
Route::get('/myorders',[App\Http\Controllers\UserController::class,'myorders'])->name('myorders')->middleware('auth:user');
Route::get('/myordersdata',[App\Http\Controllers\UserController::class,'myordersdata'])->name('myordersdata')->middleware('auth:user');
Route::get('/orderdetails/{id}',[App\Http\Controllers\UserController::class,'orderdetails'])->name('orderdetails')->middleware('auth:user');
Route::get('/orderdetailsdata/{id}',[App\Http\Controllers\UserController::class,'orderdetailsdata'])->name('orderdetailsdata')->middleware('auth:user');
Route::post('/activationcode',[App\Http\Controllers\UserController::class,'sendactivation'])->name('sendactivation');
Route::get('/activate',[App\Http\Controllers\UserController::class,'activate'])->name('activate');


Route::get('/showcategory/{id}',[App\Http\Controllers\CategoryController::class,'showcategorybyid'])->name('showcategorybyid');
Route::get('/subcategory/{id}',[App\Http\Controllers\CategoryController::class,'showsub'])->name('showsubcategory');

Route::get('/quicksign',[App\Http\Controllers\UserController::class,'quick'])->name('quick');
Route::post('/quicksign',[App\Http\Controllers\UserController::class,'quickpost'])->name('quickpost');

Route::get('/forgotpassword',[App\Http\Controllers\UserController::class,'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword',[App\Http\Controllers\UserController::class,'postforgotpassword'])->name('postforgotpassword');
Route::post('/verifypassword',[App\Http\Controllers\UserController::class,'verifypassword'])->name('verifypassword');

Route::post('/pay',[App\Http\Controllers\FatoorahController::class,'pay'])->name('fatoorah.pay');
Route::get('/paymentcallback',[App\Http\Controllers\FatoorahController::class,'paymentcallback'])->name('fatoorah.callback');
Route::get('/paymenterror',[App\Http\Controllers\FatoorahController::class,'error']);
Route::get('/onlinesuccess',[App\Http\Controllers\ProductController::class,'onlinesuccess'])->name('onlinesuccess')->middleware('auth:user');
Route::get('/onlineerror',[App\Http\Controllers\ProductController::class,'onlineerror'])->name('onlineerror')->middleware('auth:user');

Route::post('/discountcode',[App\Http\Controllers\ProductController::class,'discountcode'])->name('discountcode')->middleware('auth:user');

Route::get('/report/{id}',[App\Http\Controllers\OrderController::class,'report'])->name('report');



// Route::get('/cart1', function () {
//     $id = 'cart-01';
// $cartSessionStore = new SessionStore();

// $cart = new Cart($id, $cartSessionStore);
// $item = new CartItem;
// $item->name = 'Macbook Pro';
// $item->sku = 'MBP8GB';
// $item->price = 1200;
// $item->tax = 200;

// $cart->add($item);
// dd($cart);
// })->name('cart1');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
