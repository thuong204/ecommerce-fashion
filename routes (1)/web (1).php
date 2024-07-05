<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::get("/", function () {
    return view("admin_login");
});

Route::get('/admin_login', [AdminController :: class,'index']);// 
Route::get('/dashboard', [AdminController :: class,'show_dashboard']);//
Route::post('/admin-dashboard', [AdminController :: class,'dashboard']);
Route::get('/logout',[AdminController :: class,'logout']);

//Category Product
 Route::get('/add-category-product',[CategoryProduct:: class,'add_category_product']);
 Route::get('/all-category-product',[CategoryProduct:: class,'all_category_product']);
 Route::post('/save-category-product',[CategoryProduct:: class,'save_category_product']);
 Route::post('/update-category-product/{category_product_id}',[CategoryProduct:: class,'update_category_product']);
 Route::get('/edit-category-product/{category_product_id}',[CategoryProduct:: class,'edit_category_product']);
 Route::get('/delete-category-product/{category_product_id}',[CategoryProduct:: class,'delete_category_product']);
 //BrandProduc6
 Route::get('/add-brand-product',[BrandProduct:: class,'add_brand_product']);
 Route::get('/all-brand-product',[BrandProduct:: class,'all_brand_product']);
 Route::post('/save-brand-product',[BrandProduct:: class,'save_brand_product']);
 Route::post('/update-brand-product/{brand_product_id}',[BrandProduct:: class,'update_brand_product']);
 Route::get('/edit-brand-product/{brand_product_id}',[BrandProduct:: class,'edit_brand_product']);
 Route::get('/delete-brand-product/{brand_product_id}',[BrandProduct:: class,'delete_brand_product']);

//Product
Route::get('/add-product',[ProductController:: class,'add_product']);
Route::get('/all-product',[ProductController:: class,'all_product']);
Route::post('/save-product',[ProductController:: class,'save_product']);
Route::post('/update-product/{product_id}',[ProductController:: class,'update_product']);
Route::get('/edit-product/{product_id}',[ProductController:: class,'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController:: class,'delete_product']);

//Trang chu
// Route::get('/index',function(){
//     return view('indexmain');
// });
// Route::get('/index2',function(){
//     return view('index2');
// });


//login_cus
Route::get('login_cus',function(){
    return view('customer_login');

});
Route::get('logout_cus', [UserController:: class,'logout_cus']);
Route::get('signup_cus',function(){
    return view('customer_signup');

});
Route::get('/product_type/{product_type_name}',[IndexController::class,'product_type']);

Route::post('/login-check',[UserController::class,'check_login_user']);

Route::get('/index',[IndexController:: class,'all_product']);
Route::get('/product/{product_id}',[IndexController:: class,'product']);

Route::get('/shopping_cart', function(){
    return view('trangchu/shopping_cart');
});
Route:: post('/save-cart',[CartController::class,'save_cart']);
Route:: get('/delete-cart/{rowId}',[CartController::class,'delete_cart']);

Route:: post('/check-out',[CartController::class,'save_check_out_cus']);
Route:: get('/payment',[CartController::class,'payment_cus']);

Route:: get('cart-product',[CheckoutController::class,'cart_product']);

Route:: get('view-order/{order_id}',[CheckoutController::class,'order_detail_product']);
Route:: get('delete_-order/{order_id}',[CheckoutController::class,'delete_order_product']);





 
 