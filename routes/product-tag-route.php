<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTagController;

//Product Tag List
Route::middleware(['auth', 'can:list-product-tag'])->group(function () {
    Route::controller(ProductTagController::class)->group(function () {
        Route::prefix('admin/product-tag')->group(function () {
            Route::get('/', 'index')->name('list-product-tag');
        });
    });
});
