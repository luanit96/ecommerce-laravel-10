<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductImageController;

//Product Image List
Route::middleware(['auth', 'can:list-product-image'])->group(function () {
    Route::controller(ProductImageController::class)->group(function () {
        Route::prefix('admin/product-image')->group(function () {
            Route::get('/', 'index')->name('list-product-image');
        });
    });
});
