<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\ApiSliderController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\ApiCategoryController;

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

Route::controller(ApiUserController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::get('/user', 'userInfo')->middleware('auth:api')->name('user');
    Route::post('/logout', 'logout')->middleware('auth:api')->name('logout');
});


//Slider CRUD 
Route::controller(ApiSliderController::class)->group(function () {
    Route::prefix('slider')->group(function () {
        Route::get('/', 'index')->name('listSlider');
        Route::post('/store', 'store')->name('addSlider');
        Route::get('/{id}', 'show')->name('showSlider');
        Route::get('/edit/{id}', 'edit')->name('editSlider');
        Route::put('/update/{id}', 'update')->name('updateSlider');
        Route::delete('/delete/{id}', 'delete')->name('deleteSlider');
    });
});

//Category CRUD
Route::controller(ApiCategoryController::class)->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', 'index')->name('listCategories');
        Route::post('/store', 'store')->name('addCategories');
        Route::get('/{id}', 'show')->name('showCategories');
        Route::get('/edit/{id}', 'edit')->name('editCategories');
        Route::put('/update/{id}', 'update')->name('updateCategories');
        Route::delete('/delete/{id}', 'delete')->name('deleteCategories');
    });
});

//Product CRUD 
Route::controller(ApiProductController::class)->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('/', 'index')->name('listProduct');
        Route::post('/store', 'store')->name('addProduct');
        Route::get('/{id}', 'show')->name('showProduct');
        Route::get('/edit/{id}', 'edit')->name('editProduct');
        Route::put('/update/{id}', 'update')->name('updateProduct');
        Route::delete('/delete/{id}', 'delete')->name('deleteProduct');
    });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
