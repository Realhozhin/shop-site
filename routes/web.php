<?php

use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\orderController;
use App\Http\Controllers\Frontend\cartController;
use App\Http\Controllers\Frontend\checkoutController;
use App\Http\Controllers\frontend\frontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/',[App\Http\Controllers\frontend\frontendController::class,'index'])->name('showSite');

Route::get('/categories',[App\Http\Controllers\frontend\frontendController::class,'categories'])->name('categories');
Route::get('/categories/{category_name}',[App\Http\Controllers\frontend\frontendController::class,'products']);
Route::get('/categories/{category_slug}/{product_slug}',[App\Http\Controllers\frontend\frontendController::class,'productView']);

Route::middleware(['auth'])->group(function () {
    Route::resource('/wishlist',App\Http\Controllers\frontend\wishlistController::class);
    Route::get('/cart',[App\Http\Controllers\Frontend\cartController::class,'index'])->name('CART');
    Route::get('/checkout',[App\Http\Controllers\Frontend\checkoutController::class,'index'])->name('checkout');
    Route::get('/order',[App\Http\Controllers\Frontend\OrderController::class,'index'])->name('Order');
    Route::get('/order/{order_id}',[App\Http\Controllers\Frontend\OrderController::class,'show'])->name('OrderDetails');
});
Route::get('/thank-you',[App\Http\Controllers\frontend\frontendController::class,'thankyou'])->name('thank-you');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[App\Http\Controllers\admin\dashboardController::class,'admin'])->name('dashboard');
    // categories/brands/products Routes
    Route::resource('/category',\App\Http\Controllers\admin\CategoryController::class)->parameters(['category' =>'id']);
    Route::resource('/Brands',\App\Http\Controllers\admin\BrandsController::class)->parameters(['Brands' =>'id']);
    Route::resource('/Products',\App\Http\Controllers\admin\productController::class)->parameters(['Products' =>'id']);
    Route::resource('/Sliders',\App\Http\Controllers\admin\SliderController::class)->parameters(['Sliders' =>'id']);
    Route::resource('/order',\App\Http\Controllers\admin\OrderController::class)->parameters(['order' => 'id']);
    Route::resource('/setting',\App\Http\Controllers\admin\SettingController::class)->parameters(['setting' => 'id']);
    Route::resource('/users',\App\Http\Controllers\admin\usersController::class)->parameters(['users' => 'id']);
    Route::resource('/colors',\App\Http\Controllers\admin\ColorController::class)->parameters(['colors' => 'id']);
    Route::resource('/storage',\App\Http\Controllers\admin\StorageController::class)->parameters(['storage' => 'id']);

});

Route::get('paying/callback',[App\Http\Controllers\Frontend\checkoutController::class,'callback'])->name('callback');
Route::get('paying/{order}', [checkoutController::class, 'paying'])->name('paying');
