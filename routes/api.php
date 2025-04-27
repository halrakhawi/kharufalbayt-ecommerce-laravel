<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login',[App\Http\Controllers\ApiUserController::class,'login'])->name('login');
Route::post('/postlogin',[App\Http\Controllers\ApiUserController::class,'postlogin'])->name('postlogin');
Route::post('/postlogin1',[App\Http\Controllers\ApiUserController::class,'postlogin1'])->name('postlogin1');
Route::post('/loginapi',[App\Http\Controllers\ApiUserController::class,'loginapi'])->name('loginapi');
Route::post('/register',[App\Http\Controllers\ApiUserController::class,'store'])->name('signup');
Route::post('/quicksign',[App\Http\Controllers\ApiUserController::class,'quickpost'])->name('quickpost');
Route::get('/allproducts',[App\Http\Controllers\ApiProductController::class,'allproducts'])->name('allproducts');
Route::get('/allcategories',[App\Http\Controllers\ApiProductController::class,'allcategories'])->name('allcategories');
Route::get('/product/{id}',[App\Http\Controllers\ApiProductController::class,'show'])->name('showproduct');
Route::post('/activationcode',[App\Http\Controllers\ApiUserController::class,'sendactivation'])->name('sendactivation');
Route::get('/segList',[App\Http\Controllers\ApiProductController::class,'segmentList'])->name('segmentList');
Route::get('/pacList',[App\Http\Controllers\ApiProductController::class,'packageList'])->name('packageList');
Route::post('/order',[App\Http\Controllers\ApiProductController::class,'getmorder'])->name('order');
Route::post('/orderdetails',[App\Http\Controllers\ApiProductController::class,'getmorderdetails'])->name('orderdetails');
Route::get('/onlineorder/{id}',[App\Http\Controllers\ApiProductController::class,'onlineorder'])->name('onlineorder');
Route::get('/myorders/{mobile}',[App\Http\Controllers\ApiProductController::class,'myorders'])->name('myorders');
Route::get('/categoryproducts/{cat_id}',[App\Http\Controllers\ApiProductController::class,'categoryproducts'])->name('categoryproducts');
Route::get('/categoryname/{cat_id}',[App\Http\Controllers\ApiProductController::class,'categoryname'])->name('categoryname');
Route::get('/headoptions',[App\Http\Controllers\ApiProductController::class,'headoptions'])->name('headoptions');
Route::get('/contactinfo',[App\Http\Controllers\ApiProductController::class,'contactinfo'])->name('contactinfo');
Route::get('/advert',[App\Http\Controllers\ApiProductController::class,'advert'])->name('advert');
Route::get('/monlinesuccess',[App\Http\Controllers\ApiProductController::class,'monlinesuccess'])->name('monlinesuccess');
Route::get('/monlineerror',[App\Http\Controllers\ApiProductController::class,'monlineerror'])->name('monlineerror');
Route::get('/mpaymentcallback',[App\Http\Controllers\ApiFatoorahController::class,'mpaymentcallback'])->name('apifatoorah.callback');
Route::get('/mpaymenterror',[App\Http\Controllers\ApiFatoorahController::class,'merror']);
Route::post('/discountcode',[App\Http\Controllers\ApiProductController::class,'discountcode'])->name('discountcode');
Route::get('/searchproduct/{cat_name}',[App\Http\Controllers\ApiProductController::class,'search'])->name('search');
Route::get('/categoriessubcategories/{cat_id}',[App\Http\Controllers\ApiProductController::class,'categoriessubcategories'])->name('categoriessubcategories');
Route::get('/getproducts/{cat_id}',[App\Http\Controllers\ApiProductController::class,'getproducts'])->name('getproducts');
Route::get('/getsubcat/{cat_id}',[App\Http\Controllers\ApiProductController::class,'getsubcat'])->name('getsubcat');
Route::get('/minsegList',[App\Http\Controllers\ApiProductController::class,'minsegList'])->name('minsegList');
Route::get('/internaloptions',[App\Http\Controllers\ApiProductController::class,'internaloptions'])->name('internaloptions');
Route::get('/gettopcategories',[App\Http\Controllers\ApiProductController::class,'gettopcategories'])->name('gettopcategories');
Route::get('/gettopcategoriesbyid/{id}',[App\Http\Controllers\ApiProductController::class,'gettopcategoriesbyid'])->name('gettopcategoriesbyid');
Route::get('/getcategoriesbytype/{type}',[App\Http\Controllers\ApiProductController::class,'getcategoriesbytype'])->name('getcategoriesbytype');

Route::get('/paymentmethods',[App\Http\Controllers\ApiProductController::class,'paymentsList'])->name('paymentsList');
Route::get('/deliveryperiods',[App\Http\Controllers\ApiProductController::class,'periodsList'])->name('periodsList');

Route::post('/forgetpass',[App\Http\Controllers\ApiUserController::class,'postforgotpassword'])->name('postforgotpassword');
Route::post('/resetpass',[App\Http\Controllers\ApiUserController::class,'resetpass'])->name('resetpass');


