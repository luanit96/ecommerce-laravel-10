<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

//Product CRUD
Route::controller(ProductController::class)->group(function () {
    Route::prefix('admin/products')->group(function () {
        Route::get('/', 'index')->name('list-products');
        Route::get('/create', 'create')->name('create-products');
        Route::post('/create', 'store')->name('post-products');
        Route::get('/edit/{id}', 'edit')->name('edit-products');
        Route::post('/update/{id}', 'update')->name('update-products');
        Route::get('/delete/{id}', 'delete')->name('delete-products');
    });
});