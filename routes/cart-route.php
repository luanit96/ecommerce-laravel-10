<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCartController;

//Orders

Route::middleware(['auth'])->group(function () {
    Route::controller(AdminCartController::class)->group(function () {
        Route::prefix('admin/orders')->group(function () {
            Route::get('/', 'index')->name('list-orders');
            Route::get('/show/{id}', 'show')->name('show-orders');
            Route::post('/update/{id}', 'update')->name('update-orders');
            Route::get('/delete/{id}', 'delete')->name('delete-orders');
        });
    });
});