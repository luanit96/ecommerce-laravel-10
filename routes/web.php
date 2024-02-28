<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductFeController;
use App\Http\Controllers\CategoryFeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */

Route::get('/', [ HomeController::class, 'index' ])->name('home');
Route::get('/san-pham', [ HomeController::class, 'getAllProduct' ])->name('all-product');
Route::get('/san-pham/name={name}', [ HomeController::class, 'getProductOrderby' ])->name('product-orderby');
Route::get('/gioi-thieu', [ HomeController::class, 'getAbout' ])->name('page-about');
Route::get('/lien-he', [ HomeController::class, 'getContact' ])->name('page-contact');
Route::get('/tin-tuc', [ HomeController::class, 'getNews' ])->name('page-news');
Route::get('/loai-san-pham/{slug}', [ CategoryFeController::class, 'getProductByCategory' ])->name('category-product');
Route::get('/loai-san-pham/{slug}/name={name}', [ CategoryFeController::class, 'getProductByCategoryOrderBy' ])->name('category-product-orderby');
Route::get('/chi-tiet-san-pham/{slug}', [ ProductFeController::class, 'getProductDetail' ])->name('product-detail');
Route::post('/tim-kiem', [ HomeController::class, 'search' ])->name('search-product');
Route::get('/product-list-ajax', [ HomeController::class, 'productListAjax' ])->name('product-list-ajax');

//Route contact
Route::post('/add-contact', [ HomeController::class, 'addContact' ])->name('add-contact');

//Route cart
Route::post('/add-cart', [ CartController::class, 'index' ])->name('add-cart');
Route::get('/carts', [ CartController::class, 'show' ])->name('carts');
Route::post('/update-cart', [ CartController::class, 'update' ])->name('update-cart');
Route::get('/cart-delete/{id}', [ CartController::class, 'delete' ])->name('cart-delete');
Route::post('/orders', [ CartController::class, 'orders' ])->name('orders');


require __DIR__.'/auth.php';
