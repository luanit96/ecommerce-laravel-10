<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCartController;

//Orders

Route::middleware(['auth'])->group(function () {
    Route::controller(AdminCartController::class)->group(function () {
        Route::prefix('admin/orders')->group(function () {
            Route::get('/', 'index')->name('list-orders')->middleware('can:list-cart');
            Route::get('/show/{id}', 'show')->name('show-orders')->middleware('can:show-cart');
            Route::post('/update/{id}', 'update')->name('update-orders');
            Route::get('/delete/{id}', 'delete')->name('delete-orders')->middleware('can:delete-cart');
        });
    });
});