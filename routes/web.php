<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/gioi-thieu', [ HomeController::class, 'getAbout' ])->name('page-about');
Route::get('/lien-he', [ HomeController::class, 'getContact' ])->name('page-contact');
Route::get('/tin-tuc', [ HomeController::class, 'getNews' ])->name('page-news');
Route::get('/category/{slug}/{id}', [ CategoryFeController::class, 'getProductByCategory' ])->name('category-product');
Route::get('/product-detail/{id}', [ ProductFeController::class, 'getProductDetail' ])->name('product-detail');


require __DIR__.'/auth.php';
