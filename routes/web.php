<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CounponController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CheckoutController;
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
//Frontend

//auth
Route::get('user/auth',[IndexController::class,'userAuth'])->name('user.auth');
Route::post('user/login',[IndexController::class,'loginSubmit'])->name('login.submit');
Route::post('user/register',[IndexController::class,'registerSubmit'])->name('register.submit');
Route::get('user/logout',[IndexController::class,'userLogout'])->name('user.logout');


Route::get('/',[IndexController::class,'home'])->name('/');
//product
Route::get('product-category/{slug}/',[IndexController::class,'productCategory'])->name('product.category');
Route::get('product-details/{slug}/',[IndexController::class,'productDetails'])->name('product.details');
Route::get('shop',[IndexController::class,'shop'])->name('shop');
Route::get('about',[IndexController::class,'about'])->name('about');
Route::get('contact',[IndexController::class,'contact'])->name('contact');
Route::get('blog',[IndexController::class,'blog'])->name('blog');


//end frontend

Auth::routes(['register'=>false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
//cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('cart/store', [CartController::class, 'cartStore'])->name('cart.store');
Route::post('cart/delete', [CartController::class, 'cartDelete'])->name('cart.delete');
Route::post('cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');

//Coupon
Route::post('coupon/add',[CartController::class,'couponAdd'])->name('coupon.add');

//Wishlist
Route::get('wishlist',[WishlistController::class,'wishlist'])->name('wishlist');
Route::post('wishlist/store',[WishlistController::class,'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart',[WishlistController::class,'movetocart'])->name('wishlist.move.cart');
Route::post('wishlist/delete',[WishlistController::class,'wishlishDelete'])->name('wishlist.delete');

//Checkout
Route::get('checkout1',[CheckoutController::class,'checkout1'])->name('checkout1')->middleware('user');
Route::post('checkout-first',[CheckoutController::class,'checkout1Store'])->name('checkout1.store');
Route::post('checkout-two',[CheckoutController::class,'checkout2Store'])->name('checkout2.store');
Route::post('checkout-three',[CheckoutController::class,'checkout3Store'])->name('checkout3.store');
Route::get('checkout',[CheckoutController::class,'checkoutStore'])->name('checkout.store');
Route::get('complete/{order}',[CheckoutController::class,'complete'])->name('complete');

//admin dashboard
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){
    Route::get('/',[AdminController::class,'admin'])->name('admin');

//Banner
    Route::resource('/banner', BannerController::class);
    Route::post('banner_status',[BannerController::class,'bannerStatus'])->name('banner.status');
//Category
    Route::resource('/category', CategoryController::class);
    Route::post('category_status',[CategoryController::class,'categoryStatus'])->name('category.status');

    Route::post('category/{id}/child',[CategoryController::class,'getChildByParentID']);
//Brand
    Route::resource('/brand', BrandController::class);
    Route::post('brand_status',[BrandController::class,'brandStatus'])->name('brand.status');
//Product
    Route::resource('/product', ProductController::class);
    Route::post('product_status',[ProductController::class,'productStatus'])->name('product.status');
//User
    Route::resource('/user', UserController::class);
    Route::post('user_status',[UserController::class,'userStatus'])->name('user.status');
//Counpon
    Route::resource('/coupon', CounponController::class);
    Route::post('coupon_status',[CounponController::class,'couponStatus'])->name('coupon.status');
//Shipping
    Route::resource('/shipping', ShippingController::class);
    Route::post('shipping_status',[ShippingController::class,'shippingStatus'])->name('shipping.status');
//Order Manager
    Route::resource('/order', OrderController::class);
    Route::post('order-status',[OrderController::class,'orderStatus'])->name('order.status');
//Settings Manager
    Route::get('/settings',[SettingsController::class,'settings'])->name('settings');
    Route::put('/settings',[SettingsController::class,'settingsUpdate'])->name('setting.update');

});

Route::group(['prefix'=>'seller','middleware'=>['auth','seller']], function(){
    Route::get('/',[AdminController::class,'seller'])->name('seller');
});

//user dashboard
Route::group(['prefix'=>'user'], function(){
    Route::get('/dashboard',[IndexController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/order',[IndexController::class,'userOrder'])->name('user.order');
    Route::get('/address',[IndexController::class,'userAddress'])->name('user.address');
    Route::get('/account-detail',[IndexController::class,'userAccount'])->name('user.account');
    Route::post('/billing/address/{id}',[IndexController::class,'billingAddress'])->name('billing.address');
    Route::post('/shipping/address/{id}',[IndexController::class,'shippingAddress'])->name('shipping.address');
    Route::post('/update/account/{id}',[IndexController::class,'updateAccount'])->name('account.update');
});