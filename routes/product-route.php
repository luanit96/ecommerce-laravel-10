<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

//Product CRUD
Route::controller(ProductController::class)->group(function () {
    Route::prefix('admin/products')->group(function () {
        Route::get('/', 'index')->middleware(['auth'])->name('list-products');
        Route::get('/create', 'create')->middleware(['auth'])->name('create-products');
        Route::post('/create', 'store')->middleware(['auth'])->name('post-products');
        Route::get('/edit/{id}', 'edit')->middleware(['auth'])->name('edit-products');
        Route::post('/update/{id}', 'update')->middleware(['auth'])->name('update-products');
        Route::get('/delete/{id}', 'delete')->middleware(['auth'])->name('delete-products');
    });
});