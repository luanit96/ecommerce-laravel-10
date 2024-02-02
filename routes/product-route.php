<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

//Product CRUD
Route::middleware(['auth'])->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::prefix('admin/products')->group(function () {
            Route::get('/', 'index')->name('list-products')->middleware('can:list-product');
            Route::get('/create', 'create')->name('create-products')->middleware('can:add-product');
            Route::post('/create', 'store')->name('post-products');
            Route::get('/edit/{id}', 'edit')->name('edit-products')->middleware('can:edit-product');
            Route::post('/update/{id}', 'update')->name('update-products');
            Route::get('/delete/{id}', 'delete')->name('delete-products')->middleware('can:delete-product');
        });
    });
});
