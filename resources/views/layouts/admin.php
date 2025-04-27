<?php

use Illuminate\Support\Facades\Route;
use Cart\Cart;
use Cart\Storage\SessionStore;
use Cart\CartItem;
use App\Models\Admin;
use App\Models\Category;




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


Route::group(['middleware'=>'guest:admin'], function () {
    Route::get('/admin/login',[App\Http\Controllers\admin\AdminController::class,'getlogin'])->name('admin.login');
    Route::post('/admin/login',[App\Http\Controllers\admin\AdminController::class,'login'])->name('admin.postlogin');
});
Route::group(['prefix' => 'admin','middleware'=>'auth:admin'], function () {
Route::get('/',[App\Http\Controllers\admin\AdminController::class,'index'])->name('admin.dashboard');
Route::get('/categories',[App\Http\Controllers\admin\CategoriesController::class,'index'])->name('admin.categories.index');
Route::get('/categories/all',[App\Http\Controllers\admin\CategoriesController::class,'allCategories'])->name('admin.categories.allCategories');
Route::post('/category/active/{id}',[App\Http\Controllers\admin\CategoriesController::class,'active'])->name('admin.categories.active');
Route::get('/category/edit/{id}',[App\Http\Controllers\admin\CategoriesController::class,'edit'])->name('admin.categories.edit');
Route::post('/category/update/{id}',[App\Http\Controllers\admin\CategoriesController::class,'update'])->name('admin.categories.update');
Route::get('/category/create',[App\Http\Controllers\admin\CategoriesController::class,'create'])->name('admin.categories.create');
Route::post('/category/store',[App\Http\Controllers\admin\CategoriesController::class,'store'])->name('admin.categories.store');

Route::get('/topcategories/all',[App\Http\Controllers\admin\CategoriesController::class,'topallCategories'])->name('admin.topcategories.allCategories');
Route::get('/topcategories',[App\Http\Controllers\admin\CategoriesController::class,'topindex'])->name('admin.topcategories.index');
Route::get('/topcategory/create',[App\Http\Controllers\admin\CategoriesController::class,'topcreate'])->name('admin.topcategories.create');
Route::post('/topcategory/store',[App\Http\Controllers\admin\CategoriesController::class,'topstore'])->name('admin.topcategories.store');
Route::post('/topcategory/active/{id}',[App\Http\Controllers\admin\CategoriesController::class,'topactive'])->name('admin.topcategories.active');
Route::get('/topcategory/edit/{id}',[App\Http\Controllers\admin\CategoriesController::class,'topedit'])->name('admin.topcategories.edit');
Route::post('/topcategory/update/{id}',[App\Http\Controllers\admin\CategoriesController::class,'topupdate'])->name('admin.topcategories.update');


Route::get('/subcategories',[App\Http\Controllers\admin\CategoriesController::class,'indexsub'])->name('admin.subcategories.index');
Route::get('/subcategories/all',[App\Http\Controllers\admin\CategoriesController::class,'allsubCategories'])->name('admin.subcategories.allsubCategories');
Route::post('/subcategory/active/{id}',[App\Http\Controllers\admin\CategoriesController::class,'activesub'])->name('admin.subcategories.active');

Route::get('/subcategory/create',[App\Http\Controllers\admin\CategoriesController::class,'createsub'])->name('admin.subcategories.create');
Route::post('/subcategory/store',[App\Http\Controllers\admin\CategoriesController::class,'storesub'])->name('admin.subcategories.store');

Route::get('product/getcategory/{id}',[App\Http\Controllers\admin\CategoriesController::class,'getcategory'])->name('admin.categories.getcategories');




Route::get('/internal',[App\Http\Controllers\admin\SegmentaionController::class,'internalindex'])->name('admin.internals.index');
Route::get('/internal/all',[App\Http\Controllers\admin\SegmentaionController::class,'allinternals'])->name('admin.internals.allinternals');
Route::post('/internal/active/{id}',[App\Http\Controllers\admin\SegmentaionController::class,'activeinternal'])->name('admin.internals.active');
Route::get('/internal/edit/{id}',[App\Http\Controllers\admin\SegmentaionController::class,'editinternal'])->name('admin.internals.edit');
Route::post('/internal/update/{id}',[App\Http\Controllers\admin\SegmentaionController::class,'updateinternal'])->name('admin.internals.update');
Route::get('/internal/create',[App\Http\Controllers\admin\SegmentaionController::class,'createinternal'])->name('admin.internals.create');
Route::post('/internal/store',[App\Http\Controllers\admin\SegmentaionController::class,'storeinternal'])->name('admin.internals.store');

Route::get('/headoptions',[App\Http\Controllers\admin\SegmentaionController::class,'headoptionsindex'])->name('admin.headoptions.index');
Route::get('/headoptions/all',[App\Http\Controllers\admin\SegmentaionController::class,'allheadoptions'])->name('admin.headoptions.allheadoptions');
Route::post('/headoptions/active/{id}',[App\Http\Controllers\admin\SegmentaionController::class,'activeheadoptions'])->name('admin.headoptions.active');
Route::get('/headoptions/edit/{id}',[App\Http\Controllers\admin\SegmentaionController::class,'editheadoptions'])->name('admin.headoptions.edit');
Route::post('/headoptions/update/{id}',[App\Http\Controllers\admin\SegmentaionController::class,'updateheadoptions'])->name('admin.headoptions.update');
Route::get('/headoptions/create',[App\Http\Controllers\admin\SegmentaionController::class,'createheadoptions'])->name('admin.headoptions.create');
Route::post('/headoptions/store',[App\Http\Controllers\admin\SegmentaionController::class,'storeheadoptions'])->name('admin.headoptions.store');


Route::get('/products',[App\Http\Controllers\admin\ProductController::class,'index'])->name('admin.products.index');
Route::get('/products/all',[App\Http\Controllers\admin\ProductController::class,'allProducts'])->name('admin.products.allProducts');
Route::post('/product/active/{id}',[App\Http\Controllers\admin\ProductController::class,'active'])->name('admin.products.active');
Route::get('/product/edit/{id}',[App\Http\Controllers\admin\ProductController::class,'edit'])->name('admin.products.edit');
Route::post('/product/update/{id}',[App\Http\Controllers\admin\ProductController::class,'update'])->name('admin.products.update');
Route::get('/product/create',[App\Http\Controllers\admin\ProductController::class,'create'])->name('admin.products.create');
Route::post('/product/store',[App\Http\Controllers\admin\ProductController::class,'store'])->name('admin.products.store');

Route::get('/segmentation',[App\Http\Controllers\admin\SegmentaionController::class,'index'])->name('admin.segmentations.index');
Route::get('/segmentation/all',[App\Http\Controllers\admin\SegmentaionController::class,'allSegmentations'])->name('admin.segmentations.allSegmentations');
Route::post('/segmentation/active/{id}',[App\Http\Controllers\admin\SegmentaionController::class,'active'])->name('admin.segmentations.active');
Route::get('/segmentation/edit/{id}',[App\Http\Controllers\admin\SegmentaionController::class,'edit'])->name('admin.segmentations.edit');
Route::post('/segmentation/update/{id}',[App\Http\Controllers\admin\SegmentaionController::class,'update'])->name('admin.segmentations.update');
Route::get('/segmentation/create',[App\Http\Controllers\admin\SegmentaionController::class,'create'])->name('admin.segmentations.create');
Route::post('/segmentation/store',[App\Http\Controllers\admin\SegmentaionController::class,'store'])->name('admin.segmentations.store');

Route::get('/package',[App\Http\Controllers\admin\PackageController::class,'index'])->name('admin.packages.index');
Route::get('/package/all',[App\Http\Controllers\admin\PackageController::class,'allPackages'])->name('admin.packages.allPackages');
Route::post('/package/active/{id}',[App\Http\Controllers\admin\PackageController::class,'active'])->name('admin.packages.active');
Route::get('/package/edit/{id}',[App\Http\Controllers\admin\PackageController::class,'edit'])->name('admin.packages.edit');
Route::post('/package/update/{id}',[App\Http\Controllers\admin\PackageController::class,'update'])->name('admin.packages.update');
Route::get('/package/create',[App\Http\Controllers\admin\PackageController::class,'create'])->name('admin.packages.create');
Route::post('/package/store',[App\Http\Controllers\admin\PackageController::class,'store'])->name('admin.packages.store');

Route::get('/users',[App\Http\Controllers\admin\UserController::class,'index'])->name('admin.users.index');
Route::get('/users/all',[App\Http\Controllers\admin\UserController::class,'allusers'])->name('admin.users.allusers');

Route::get('/orders',[App\Http\Controllers\admin\OrderController::class,'index'])->name('admin.orders.index');
Route::get('/orders/all',[App\Http\Controllers\admin\OrderController::class,'allOrders'])->name('admin.orders.allOrders');
Route::get('/orderdetails/{id}',[App\Http\Controllers\admin\OrderController::class,'orderdetails'])->name('admin.orders.orderdetails');
Route::get('/orderdetailsdata/{id}',[App\Http\Controllers\admin\OrderController::class,'orderdetailsdata'])->name('admin.orders.orderdetailsdata');
Route::get('/dilver/{id}',[App\Http\Controllers\admin\OrderController::class,'dilver'])->name('admin.orders.dilver');
Route::get('/report/{id}',[App\Http\Controllers\admin\OrderController::class,'report'])->name('report');

Route::get('/neworders',[App\Http\Controllers\admin\OrderController::class,'neworders'])->name('admin.orders.neworders');
Route::get('/neworders/all',[App\Http\Controllers\admin\OrderController::class,'allneworders'])->name('admin.orders.allneworders');

Route::get('/confirmorders',[App\Http\Controllers\admin\OrderController::class,'confirmorders'])->name('admin.orders.confirmorders');
Route::get('/confirmorders/all',[App\Http\Controllers\admin\OrderController::class,'allconfirmorders'])->name('admin.orders.allconfirmorders');

Route::get('/completeorders',[App\Http\Controllers\admin\OrderController::class,'completeorders'])->name('admin.orders.completeorders');
Route::get('/completeorders/all',[App\Http\Controllers\admin\OrderController::class,'allcompleteorders'])->name('admin.orders.allcompleteorders');

Route::get('/rejectorders',[App\Http\Controllers\admin\OrderController::class,'rejectorders'])->name('admin.orders.rejectorders');
Route::get('/rejectorders/all',[App\Http\Controllers\admin\OrderController::class,'allrejectorders'])->name('admin.orders.allrejectorders');

Route::get('/coupons',[App\Http\Controllers\admin\CouponController::class,'index'])->name('admin.coupons.index');
Route::get('/coupons/all',[App\Http\Controllers\admin\CouponController::class,'allcoupons'])->name('admin.coupons.allcoupons');
Route::get('/coupons/create',[App\Http\Controllers\admin\CouponController::class,'create'])->name('admin.coupons.create');
Route::post('/coupons/store',[App\Http\Controllers\admin\CouponController::class,'store'])->name('admin.coupons.store');
Route::get('/coupons/edit/{id}',[App\Http\Controllers\admin\CouponController::class,'edit'])->name('admin.coupons.edit');
Route::post('/coupons/update/{id}',[App\Http\Controllers\admin\CouponController::class,'update'])->name('admin.coupons.update');
Route::post('/coupons/active/{id}',[App\Http\Controllers\admin\CouponController::class,'active'])->name('admin.coupons.active');

Route::get('/advertis/index',[App\Http\Controllers\admin\AdminController::class,'advertisindex'])->name('admin.advertis.index');
Route::get('/advertis/create',[App\Http\Controllers\admin\AdminController::class,'advertis'])->name('admin.advertis.create');
Route::get('/alladvertis',[App\Http\Controllers\admin\AdminController::class,'alladvertis'])->name('admin.advertis.alladvertis');
Route::post('/advertis/store',[App\Http\Controllers\admin\AdminController::class,'advertisStore'])->name('admin.advertis.store');
Route::post('/advertis/delete/{id}',[App\Http\Controllers\admin\AdminController::class,'advertisdelete'])->name('admin.advertis.delete');


Route::post('/changeorderstatus/{id}',[App\Http\Controllers\admin\OrderController::class,'changeorderstatus'])->name('admin.orders.changeorderstatus');
Route::get('/logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/login");
})->name('admin.logout');
});


view()->composer(['*'], function ($view) {
    $cats=Category::all();
    $view->with('cats',$cats);
});